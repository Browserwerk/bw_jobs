<?php

namespace Browserwerk\BwJobs\ViewHelper;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class CurrentPidViewHelper extends AbstractViewHelper
{
    /**
     * static render method, returns current pid.
     *
     * @return int
     */
    public static function renderStatic(
        array $arguments,
        \Closure $renderChildrenClosure,
        RenderingContextInterface $renderingContext
    ) {
        $pid = GeneralUtility::_GP('id');
        if (null === $pid) {
            $pid = 0;
        }

        return (int) $pid;
    }
}
