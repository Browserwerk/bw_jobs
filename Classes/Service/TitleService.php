<?php
namespace Browserwerk\BwJobs\Service;

use TYPO3\CMS\Core\PageTitle\AbstractPageTitleProvider;

class TitleService extends AbstractPageTitleProvider
{
    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }
}