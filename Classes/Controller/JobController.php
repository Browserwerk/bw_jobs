<?php

namespace Browserwerk\BwJobs\Controller;

use Browserwerk\BwJobs\Domain\Model\Job;
use Browserwerk\BwJobs\Domain\Repository\JobCategoryRepository;
use Browserwerk\BwJobs\Domain\Repository\JobRepository;
use Browserwerk\BwJobs\Domain\Repository\JobTypeRepository;
use Browserwerk\BwJobs\Domain\Repository\LocationRepository;
use Browserwerk\BwJobs\Service\JobTitle;
use Browserwerk\BwJobs\Service\PageTitleService;
use Browserwerk\BwJobs\Service\StructuredDataService;
use Browserwerk\BwJobs\Service\TitleGetter;
use Browserwerk\BwJobs\Service\TitleService;
use TYPO3\CMS\Core\Messaging\AbstractMessage;
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/***
 *
 * This file is part of the 'BwJobs' Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2019 Vincent Bärtsch ,Browserwerk GmbH
 *
 ***/
class JobController extends ActionController
{
    /**
     * jobRepository.
     *
     * @var \Browserwerk\BwJobs\Domain\Repository\JobRepository
     */
    protected $jobRepository;
    /**
     * jobTypeRepository.
     *
     * @var \Browserwerk\BwJobs\Domain\Repository\JobTypeRepository
     */
    protected $jobTypeRepository = null;

    /**
     * locationRepository.
     *
     * @var \Browserwerk\BwJobs\Domain\Repository\LocationRepository
     */
    protected $locationRepository = null;
    /**
     * jobCategoryRepository.
     *
     * @var \Browserwerk\BwJobs\Domain\Repository\JobCategoryRepository
     */
    protected $jobCategoryRepository = null;


    public function __construct( JobRepository $jobRepository, JobTypeRepository $jobTypeRepository, LocationRepository $locationRepository, JobCategoryRepository $jobCategoryRepository)
    {
        $this->jobRepository = $jobRepository;
        $this->jobTypeRepository= $jobTypeRepository;
        $this->locationRepository= $locationRepository;
        $this->jobCategoryRepository= $jobCategoryRepository;
    }
    /**
     * action list.
     */
    public function listAction()
    {
        $jobs = $this->jobRepository->findAll();
        $this->view->assign('jobs', $jobs);
    }

    /**
     * action filter.
     */
    public function filterAction()
    {
        $jobs = $this->jobRepository->findAll();
        $categories=array();
        $levels=array();
        $locations=array();
        foreach ($jobs as $job){
            //Get all Categories
            foreach ($job->getCategories() as $category){
                if(!in_array($category->getTitle(), $categories)){
                    $categories[] = $category->getTitle();
                }
            }
            //Get all Location
            foreach ($job->getLocation() as $location){
                if(!in_array($location->getCity(), $locations)){
                    $locations[] = $location->getCity();
                }
            }
            //Get all Levels
            if(!in_array($job->getLevel(), $levels) && $job->getLevel() !== ''){
                $levels[] = $job->getLevel();
            }
        }
        $locations[] = "Homeoffice";

        if (count($categories)!== 1)
            $this->view->assign('categories', $categories);
        if (count($levels)!== 1)
                    $this->view->assign('levels', $levels);
        if (count($locations)!== 1)
                    $this->view->assign('locations', $locations);

    }


    /**
     * action show.
     */
    public function showAction()
    {
        $args = $this->request->getArguments();
        $job = $this->jobRepository->findByUid($args['job']);
        if (!empty($job)) {
            $this->view->assign('job', $job);
            $pageRenderer= GeneralUtility::makeInstance(PageRenderer::class);
            $pageRenderer->addHeaderData(StructuredDataService::structuredDataForJob($job));
            $titleProvider = GeneralUtility::makeInstance(TitleService::class);
            $titleProvider->setTitle($job->getTitle());
        }
    }

    /**
     * action delete.
     *
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\StopActionException
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\UnsupportedRequestTypeException
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\IllegalObjectTypeException
     */
    public function deleteAction(Job $job)
    {
        $this->addFlashMessage('The object was deleted.', '', AbstractMessage::WARNING);
        $this->jobRepository->remove($job);
        $this->redirect('list');
    }
}
