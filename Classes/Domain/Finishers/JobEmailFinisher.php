<?php

namespace Browserwerk\BwJobs\Domain\Finishers;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Mail\MailMessage;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Form\Domain\Finishers\Exception\FinisherException;
use TYPO3\CMS\Form\Domain\Model\FormElements\FileUpload;

class JobEmailFinisher extends \TYPO3\CMS\Form\Domain\Finishers\EmailFinisher
{
    /**
     * Executes this finisher.
     *
     * @throws FinisherException
     *
     * @see AbstractFinisher::execute()
     */
    protected function executeInternal()
    {
        $this->uploadFiles = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $form = $this->finisherContext->getControllerContext()->getRequest()->getArguments();

        $formRuntime = $this->finisherContext->getFormRuntime();
        $standaloneView = $this->initializeStandaloneView($formRuntime, 'html');
        $message = $standaloneView->render();

        $elements = $formRuntime->getFormDefinition()->getRenderablesRecursively();

        $sendermail = $GLOBALS['TYPO3_CONF_VARS']['MAIL']['defaultMailFromAddress'];

        $mail = $this->objectManager->get(MailMessage::class);
        if ('EmailtoContact' == $this->parseOption('email')) {
            $sendto = $this->getContactEmail($form['sendtomail']);
            foreach ($elements as $element) {
                if (!$element instanceof FileUpload) {
                    continue;
                }

                $file = $formRuntime[$element->getIdentifier()];
                if (!isset($file)) {
                    continue;
                }

                if ($file) {
                    if ($file instanceof FileReference) {
                        $file = $file->getOriginalResource();
                    }
                }

                // if file is not instance of FileReference
                if (is_array($file)) {
                    $content = file_get_contents($file['tmp_name']);
                    $name = $file['name'];
                    $mimeType = $file['type'];
                } else {
                    $content = $file->getContents();
                    $name = $file->getName();
                    $mimeType = $file->getMimeType();
                }

                $mail->attach($content, $name, $mimeType);

                $resourceFactory = \TYPO3\CMS\Core\Resource\ResourceFactory::getInstance();

                //Remove File form save point
                if (!$this->parseOption('saveFiles')) {
                    $file = $resourceFactory->getFileObjectFromCombinedIdentifier('1:/' . $file->getOriginalFile()->getIdentifier());
                    $file->delete(true);
                }
            }
        } else {
            $sendto = $form['email'];
        }

        $mail->setFrom([$sendermail => ''])
            ->setTo([$sendto => ''])
            ->setSubject($this->parseOption('subject') . ' - ' . $form['job-title']);

        $mail->html($message);
        $mail->send();
    }

    private function getContactEmail($uid)
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_bwjobs_domain_model_contact');
        $affectedRows = $queryBuilder->select('email')->from('tx_bwjobs_domain_model_contact')->where(
            $queryBuilder->expr()->eq('uid', intval($uid))
        )->execute()->fetch();

        return $affectedRows['email'];
    }
}
