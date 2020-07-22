<?php

namespace Browserwerk\BwJobs\Controller;

use Browserwerk\BwJobs\Domain\Model\JobType;
use Browserwerk\BwJobs\Domain\Repository\JobTypeRepository;
use TYPO3\CMS\Core\Messaging\AbstractMessage;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

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
class JobTypeController extends ActionController
{
    /**
     * jobTypeRepository.
     *
     * @var \Browserwerk\BwJobs\Domain\Repository\JobTypeRepository
     */
    protected $jobTypeRepository = null;

    public function __construct( JobTypeRepository $jobTypeRepository)
    {
        $this->jobTypeRepository= $jobTypeRepository;
    }

    /**
     * action list.
     */
    public function listAction()
    {
        $jobTypes = $this->jobTypeRepository->findAll();
        $this->view->assign('jobTypes', $jobTypes);
    }

    /**
     * action show.
     *
     * @param JobType $jobType
     */
    public function showAction(JobType $jobType)
    {
        $this->view->assign('jobType', $jobType);
    }

    /**
     * action delete.
     *
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\StopActionException
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\UnsupportedRequestTypeException
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\IllegalObjectTypeException
     */
    public function deleteAction(JobType $jobType)
    {
        $this->addFlashMessage('The object was deleted.', '', AbstractMessage::WARNING);
        $this->jobTypeRepository->remove($jobType);
        $this->redirect('list');
    }
}
