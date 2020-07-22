<?php

namespace Browserwerk\BwJobs\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryInterface;

/***
 *
 * This file is part of the "Bw_Jobs" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2019 Vincent Bärtsch , Browserwerk GmbH
 *
 ***/
class JobTypeRepository extends AbstractRepository
{
    /**
     * @var array
     */
    protected $defaultOrderings = [
        'sorting' => QueryInterface::ORDER_ASCENDING,
    ];
}
