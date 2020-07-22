<?php

namespace Browserwerk\BwJobs\Hooks;

use TYPO3\CMS\Backend\View\PageLayoutView;
use TYPO3\CMS\Backend\View\PageLayoutViewDrawItemHookInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Hook to render preview widget of custom content elements in page module.
 *
 * @see \TYPO3\CMS\Backend\View\PageLayoutView::tt_content_drawItem()
 */
class PreviewRenderer implements PageLayoutViewDrawItemHookInterface
{
    /**
     * Rendering for custom content elements.
     *
     * @param bool   $drawItem
     * @param string $headerContent
     * @param string $itemContent
     */
    public function preProcess(PageLayoutView &$parentObject, &$drawItem, &$headerContent, &$itemContent, array &$row)
    {
        if ('bwjobs_frontend' === $row['list_type']) {
            $drawItem = false;
            $xmldata = str_replace('settings.', '', $row['pi_flexform']);
            // Sammelt die Flexform-Einstellungen und entfernt bestimmte Array-Keys ("data", "sDEF", "lDEF", "vDEF") zur besseren Nutzung in Fluid
            $flexform = $this->cleanUpArray(GeneralUtility::xml2array($xmldata), ['data', 'sDEF', 'lDEF', 'vDEF']);

            // Festlegen der Template-Datei
            /** @var \TYPO3\CMS\Fluid\View\StandaloneView $fluidTemplate */
            $fluidTmplFilePath = GeneralUtility::getFileAbsFileName('EXT:bw_jobs/Resources/Private/Backend/Templates/Template.html');
            $fluidTmpl = GeneralUtility::makeInstance('TYPO3\CMS\Fluid\View\StandaloneView');
            $fluidTmpl->setTemplatePathAndFilename($fluidTmplFilePath);
            $fluidTmpl->assign('flex', $flexform);

            // Rendern
            $itemContent = $parentObject->linkEditContent($fluidTmpl->render(), $row);
        }
    }

    /**
     * @return array|mixed
     */
    public function cleanUpArray(array $cleanUpArray, array $notAllowed)
    {
        $cleanArray = [];
        foreach ($cleanUpArray as $key => $value) {
            if (in_array($key, $notAllowed)) {
                return is_array($value) ? $this->cleanUpArray($value, $notAllowed) : $value;
            } elseif (is_array($value)) {
                $cleanArray[$key] = $this->cleanUpArray($value, $notAllowed);
            }
        }

        return $cleanArray;
    }
}
