<?php

namespace Browserwerk\BwJobs\Service;

use Browserwerk\BwJobs\Domain\Model\Job;
use Browserwerk\BwJobs\Domain\Model\Location;
use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/***
 *
 * This file is part of the 'Bw_Jobs' Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2019 Vincent Bärtsch, Browserwerk GmbH
 *
 ***/
class StructuredDataService implements SingletonInterface
{
    /**
     * build structured data array for jobs.
     *
     * @return string
     */
    public static function structuredDataForJob(Job $job)
    {
        /* @var \Browserwerk\BwJobs\Domain\Model\Location $location */
        $location = $job->getLocation()->toArray()[0];
        $logo= $location->getImage()[0];
        if (is_a($logo, '\\TYPO3\\CMS\\Extbase\\Domain\\Model\\FileReference')) {
            $logo = GeneralUtility::getIndpEnv('TYPO3_SITE_URL')."".$logo->getOriginalResource()->getPublicUrl();
        }
        $locationOutput = [
            'identifier' => [
                '@type' => 'PropertyValue',
                'name'  => $location->getTitle(),
            ],
            'jobLocation' => [
                '@type'   => 'Place',
                'address' => [
                    '@type' => 'PostalAddress',
                ],
            ],
            'hiringOrganization' => [
                '@type'  => 'Organization',
                'name'   => $location->getTitle(),
                'sameAs' => GeneralUtility::getIndpEnv('TYPO3_SITE_URL'),
                'logo'   => $logo

            ],
        ];
        if ('' != $location->getStreet()) {
            $locationOutput['jobLocation']['address'] += ['streetAddress' => $location->getStreet()];
        }
        if ('' != $location->getCity()) {
            $locationOutput['jobLocation']['address'] += ['addressLocality' => $location->getCity()];
        }
        if ('' != $location->getZip()) {
            $locationOutput['jobLocation']['address'] += ['postalCode' => $location->getZip()];
        }
        if ('' !== $location->getCountry()) {
            $locationOutput['jobLocation']['address'] += ['addressCountry' => $location->getCountry()];
        }
        
        if ('' !== $location->getCountryzone()) {
            $locationOutput['jobLocation']['address'] += ['addressRegion' => $location->getCountryzone()];
        }

        /** @var \Browserwerk\BwJobs\Domain\Model\JobType $firstJobType */
        $firstJobType = $job->getJobType()->toArray()[0];

        $datePosted = date('Y-m-d');
        $validThrough = date('Y-m-d');
        if (null !== $job->getDataPosted()) {
            $datePosted = date('Y-m-d ', $job->getDataPosted()->getTimestamp());
        }
        if (null !== $job->getValidThrough()) {
            $validThrough = date('Y-m-d ', $job->getValidThrough()->getTimestamp());
        }

        $result = [
            '@context'     => 'https://schema.org/',
            '@type'        => 'JobPosting',
            'title'        => $job->getTitle(),
            'datePosted'   => $datePosted,
            'validThrough' => $validThrough,
        ];

        //Add locations Data to array
        $result += $locationOutput;

        //Recommended properties
        if ('' != $job->getDescription()) {
            $result += ['description' => $job->getDescription()];
        } else {
            $result += ['description' => $job->getTeaser()];
        }
        if ('' != $firstJobType->getEmploymentType()) {
            $result += ['employmentType' => $firstJobType->getEmploymentType()];
        }
        if ('' != $job->getDescription()) {
            $result += ['workHours' => $job->getWorkHours()];
        }
        if ('' != $job->getResponsibilities()) {
            $result += ['responsibilities' => $job->getResponsibilities()];
        }
        if ('' != $job->getSkills()) {
            $result += ['skills' => $job->getSkills()];
        }
        if ('' != $job->getQualifications()) {
            $result += ['qualifications' => $job->getQualifications()];
        }
        if ('' != $job->getEducationRequirements()) {
            $result += ['educationRequirements' => $job->getEducationRequirements()];
        }
        if ('' != $job->getExperienceRequirements()) {
            $result += ['experienceRequirements' => $job->getExperienceRequirements()];
        }
        if ($job->getShowSalary()) {
            $result += [
                'baseSalary' => [
                    '@type'    => 'MonetaryAmount',
                    'currency' => $job->getCurrency(),
                    'value'    => [
                        '@type'    => 'QuantitativeValue',
                        'value'    => $job->getSalary(),
                        'unitText' => $job->getCycle(),
                    ],
                ], ];
        }

        return sprintf('<script type="application/ld+json">%s</script>', json_encode($result, JSON_UNESCAPED_SLASHES));
    }


}