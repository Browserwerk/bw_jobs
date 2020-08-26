<?php

namespace Browserwerk\BwJobs\ViewHelper;

class InArrayViewHelper extends TYPO3\CMS\Fluid\Core\ViewHelper\AbstractConditionViewHelper
{
    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument('haystack', 'mixed', 'View helper haystack ', true);
        $this->registerArgument('needle', 'string', 'View helper needle', true);
    }

    // php in_array viewhelper
    public function render()
    {
        $needle = $this->arguments['needle'];
        $haystack = $this->arguments['haystack'];

        if (!is_array($haystack)) {
            return $this->renderElseChild();
        }

        if (in_array($needle, $haystack)) {
            return $this->renderThenChild();
        } else {
            return $this->renderElseChild();
        }
    }
}
