<?php

namespace Browserwerk\BwJobs\Controller;

use Browserwerk\BwJobs\Domain\Model\Contact;
use Browserwerk\BwJobs\Domain\Repository\ContactRepository;
use TYPO3\CMS\Core\Messaging\AbstractMessage;
use TYPO3\CMS\Extensionmanager\Controller\ActionController;

/***
 *
 * This file is part of the "BwJobs" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2019 Vincent Bärtsch, Browserwerk GmbH
 *
 ***/

/**
 * ContactController.
 */
class ContactController extends ActionController
{
    /**
     * locationRepository.
     *
     * @var \Browserwerk\BwJobs\Domain\Repository\ContactRepository
     *
     */
    protected $contactRepository = null;

    public function __construct( ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }
    /**
     * action list.
     */
    public function listAction()
    {
        $contacts = $this->contactRepository->findAll();
        $this->view->assign('contacts', $contacts);
    }

    /**
     * action show.
     *
     * @param Contact $contact
     */
    public function showAction(Contact $contact)
    {
        $this->view->assign('contact', $contact);
    }

    /**
     * action delete.
     *
     * @param Contact $contact
     *
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\StopActionException
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\UnsupportedRequestTypeException
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\IllegalObjectTypeException
     */
    public function deleteAction(Contact $contact)
    {
        $this->addFlashMessage('The object was deleted.', '', AbstractMessage::WARNING);
        $this->contactRepository->remove($contact);
        $this->redirect('list');
    }
}
