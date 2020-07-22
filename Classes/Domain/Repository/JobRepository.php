<?php

namespace Browserwerk\BwJobs\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;

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
class JobRepository extends AbstractRepository
{
    /**
     * @var array
     */
    protected $defaultOrderings = [
        'sorting' => QueryInterface::ORDER_ASCENDING,
    ];

    /**
     * @param $location
     * @param $jobType
     * @param mixed $category
     *
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
     *
     * @return array|QueryResultInterface
     */
    public function findBySettings($location, $jobType, $category)
    {
        if ('' == $_POST['tx_bwjobs_frontend']['location']) {
            $locationArray = explode(',', $location);
        } else {
            $locationArray = $_POST['tx_bwjobs_frontend']['location'];
        }

        if ('' == $_POST['tx_bwjobs_frontend']['category']) {
            $categoryArray = explode(',', $category);
        } else {
            $categoryArray = $_POST['tx_bwjobs_frontend']['category'];
        }
        if ('' == $_POST['tx_bwjobs_frontend']['jobType']) {
            $jobTypeArray = explode(',', $jobType);
        } else {
            $jobType = $_POST['tx_bwjobs_frontend']['jobType'];
        }

        $query = $this->createQuery();

        $boolLocation = '' == $location;
        $boolJobType = '' == $jobType;
        $boolCategory = '' == $category;

        if (!$boolLocation && $boolJobType && $boolCategory) {
            $query->matching(
                $query->in('location.uid', $locationArray)
            );

            return $query->execute();
        }
        if ($boolLocation && !$boolJobType && $boolCategory) {
            $query->matching(
                $query->in('jobType.uid', $jobTypeArray)
            );

            return $query->execute();
        }
        if ($boolLocation && $boolJobType && !$boolCategory) {
            $query->matching(
                $query->in('categories.uid', $categoryArray)
            );

            return $query->execute();
        }
        if (!$boolLocation && !$boolJobType && $boolCategory) {
            $query->matching(
                $query->logicalAnd(
                    $query->in('jobType.uid', $jobTypeArray),
                    $query->in('location.uid', $locationArray)
                )
            );

            return $query->execute();
        }
        if (!$boolLocation && $boolJobType && !$boolCategory) {
            $query->matching(
                $query->logicalAnd(
                    $query->in('location.uid', $locationArray),
                    $query->in('categories.uid', $categoryArray)
                )
            );

            return $query->execute();
        }

        if ($boolLocation && !$boolJobType && !$boolCategory) {
            $query->matching(
                $query->logicalAnd(
                    $query->in('jobType.uid', $jobTypeArray),
                    $query->in('categories.uid', $categoryArray)
                )
            );

            return $query->execute();
        }
        if (!$boolLocation && !$boolJobType && !$boolCategory) {
            $query->matching(
                $query->logicalAnd(
                    $query->in('jobType.uid', $jobTypeArray),
                    $query->in('location.uid', $locationArray),
                    $query->in('categories.uid', $categoryArray)
                )
            );

            return $query->execute();
        }

        return $query->execute();
    }
}
