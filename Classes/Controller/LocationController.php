<?php

namespace Browserwerk\BwJobs\Controller;

use Browserwerk\BwJobs\Domain\Model\Location;
use Browserwerk\BwJobs\Domain\Repository\LocationRepository;
use TYPO3\CMS\Core\Messaging\AbstractMessage;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/***
 *
 * This file is part of the "BwJobs" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2019 Vincent Bärtsch , Browserwerk GmbH
 *
 ***/
class LocationController extends ActionController
{
    /**
     * locationRepository.
     *
     * @var \Browserwerk\BwJobs\Domain\Repository\LocationRepository
     */
    protected $locationRepository = null;

    public function __construct(LocationRepository $locationRepository)
    {
        $this->locationRepository= $locationRepository;
    }
    /**
     * action list.
     */
    public function listAction()
    {
        $locations = $this->locationRepository->findAll();
        $this->view->assign('locations', $locations);
    }

    /**
     * action show.
     *
     * @param Location $location
     */
    public function showAction(Location $location)
    {
        $this->view->assign('location', $location);
    }

    /**
     * action delete.
     *
     * @param Location $location
     *
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\StopActionException
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\UnsupportedRequestTypeException
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\IllegalObjectTypeException
     */
    public function deleteAction(Location $location)
    {
        $this->addFlashMessage('The object was deleted.', '', AbstractMessage::WARNING);
        $this->locationRepository->remove($location);
        $this->redirect('list');
    }
}
