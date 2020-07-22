<?php

namespace Browserwerk\BwJobs\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/***
 *
 * This file is part of the "Bw_Jobs" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2019 Vincent Bärtsch, Browserwerk GmbH
 *
 ***/
class Job extends AbstractEntity
{
    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>
     */
    protected $categories;
    /**
     * title.
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("StringLength", options={"minimum": 3, "maximum": 50})
     */
    protected $title = '';

    /**
     * slug.
     *
     * @var string
     */
    protected $slug = '';

    /**
     * teaser.
     *
     * @var string
     */
    protected $teaser = '';

    /**
     * description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * benefits.
     *
     * @var string
     */
    protected $benefits = '';

    /**
     * educationRequirements.
     *
     * @var string
     */
    protected $educationRequirements = '';

    /**
     * experienceRequirements.
     *
     * @var string
     */
    protected $experienceRequirements = '';

    /**
     * qualifications.
     *
     * @var string
     */
    protected $qualifications = '';

    /**
     * responsibilities.
     *
     * @var string
     */
    protected $responsibilities = '';

    /**
     * skills.
     *
     * @var string
     */
    protected $skills = '';

    /**
     * specialCommitment.
     *
     * @var string
     */
    protected $specialCommitment = '';

    /**
     * workHours.
     *
     * @var int
     */
    protected $workHours = null;

    /**
     * jobStart.
     *
     * @var \DateTime
     */
    protected $jobStart = null;
    /**
     * dataPosted.
     *
     * @var \DateTime
     */
    protected $dataPosted = null;

    /**
     * showSalary.
     *
     * @var bool
     */
    protected $showSalary = '';
    /**
     * currency.
     *
     * @var string
     */
    protected $currency = null;

    /**
     * salary.
     *
     * @var int
     */
    protected $salary = null;

    /**
     * cycle.
     *
     * @var string
     */
    protected $cycle = null;

    /**
     * validThrough.
     *
     * @var \DateTime
     */
    protected $validThrough = null;

    /**
     * location.
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Browserwerk\BwJobs\Domain\Model\Location>
     */
    protected $location = null;

    /**
     * jobType.
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Browserwerk\BwJobs\Domain\Model\JobType>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $jobType = null;
    /**
     * jobCatefory.
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Browserwerk\BwJobs\Domain\Model\JobCategory>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $jobCategory = null;

    /**
     * __construct.
     */
    public function __construct()
    {
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead.
     */
    protected function initStorageObjects()
    {
        $this->jobCategory = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->location = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->jobType = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    public function getCategories(): ObjectStorage
    {
        return $this->categories;
    }

    public function setCategories(ObjectStorage $categories)
    {
        $this->categories = $categories;
    }

    /**
     * Returns the title.
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title.
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the slug.
     *
     * @return string $slug
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Sets the slug.
     *
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * Returns the teaser.
     *
     * @return string $teaser
     */
    public function getTeaser()
    {
        return $this->teaser;
    }

    /**
     * Sets the teaser.
     *
     * @param string $teaser
     */
    public function setTeaser($teaser)
    {
        $this->teaser = $teaser;
    }

    /**
     * Returns the description.
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description.
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Returns the benefits.
     *
     * @return string $benefits
     */
    public function getBenefits()
    {
        return $this->benefits;
    }

    /**
     * Sets the benefits.
     *
     * @param string $benefits
     */
    public function setBenefits($benefits)
    {
        $this->benefits = $benefits;
    }

    /**
     * Returns the educationRequirements.
     *
     * @return string $educationRequirements
     */
    public function getEducationRequirements()
    {
        return $this->educationRequirements;
    }

    /**
     * Sets the educationRequirements.
     *
     * @param string $educationRequirements
     */
    public function setEducationRequirements($educationRequirements)
    {
        $this->educationRequirements = $educationRequirements;
    }

    /**
     * Returns the experienceRequirements.
     *
     * @return string $experienceRequirements
     */
    public function getExperienceRequirements()
    {
        return $this->experienceRequirements;
    }

    /**
     * Sets the experienceRequirements.
     *
     * @param string $experienceRequirements
     */
    public function setExperienceRequirements($experienceRequirements)
    {
        $this->experienceRequirements = $experienceRequirements;
    }

    /**
     * Returns the qualifications.
     *
     * @return string $qualifications
     */
    public function getQualifications()
    {
        return $this->qualifications;
    }

    /**
     * Sets the qualifications.
     *
     * @param string $qualifications
     */
    public function setQualifications($qualifications)
    {
        $this->qualifications = $qualifications;
    }

    /**
     * Returns the responsibilities.
     *
     * @return string $responsibilities
     */
    public function getResponsibilities()
    {
        return $this->responsibilities;
    }

    /**
     * Sets the responsibilities.
     *
     * @param string $responsibilities
     */
    public function setResponsibilities($responsibilities)
    {
        $this->responsibilities = $responsibilities;
    }

    /**
     * Returns the skills.
     *
     * @return string $skills
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * Sets the skills.
     *
     * @param string $skills
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;
    }

    /**
     * Returns the specialCommitment.
     *
     * @return string $specialCommitment
     */
    public function getSpecialCommitment()
    {
        return $this->specialCommitment;
    }

    /**
     * Sets the specialCommitment.
     *
     * @param string $specialCommitment
     */
    public function setSpecialCommitment($specialCommitment)
    {
        $this->specialCommitment = $specialCommitment;
    }

    /**
     * Returns the workHours.
     *
     * @return int $workHours
     */
    public function getWorkHours()
    {
        return $this->workHours;
    }

    /**
     * Sets the workHours.
     */
    public function setWorkHours(int $workHours)
    {
        $this->workHours = $workHours;
    }

    /**
     * Returns the jobStart.
     *
     * @return \DateTime $jobStart
     */
    public function getJobStart()
    {
        return $this->jobStart;
    }

    /**
     * Sets the jobStart.
     */
    public function setJobStart(\DateTime $jobStart)
    {
        $this->jobStart = $jobStart;
    }

    /**
     * Returns the dataPosted.
     *
     * @return \DateTime $dataPosted
     */
    public function getDataPosted()
    {
        return $this->dataPosted;
    }

    /**
     * Sets the dataPosted.
     */
    public function setDataPosted(\DateTime $dataPosted)
    {
        $this->dataPosted = $dataPosted;
    }

    /**
     * Returns the validThrough.
     *
     * @return \DateTime $validThrough
     */
    public function getValidThrough()
    {
        return $this->validThrough;
    }

    /**
     * Sets the validThrough.
     */
    public function setValidThrough(\DateTime $validThrough)
    {
        $this->validThrough = $validThrough;
    }

    /**
     * Returns the showSalary.
     *
     * @return bool$showSalary
     */
    public function getShowSalary()
    {
        return (bool) $this->showSalary;
    }

    /**
     * Sets the showSalary.
     */
    public function setShowSalary(bool $showSalary)
    {
        $this->showSalary = $showSalary;
    }

    /**
     * Returns the currency.
     *
     * @return string $currency
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Sets the currency.
     */
    public function setCurrency(string $currency)
    {
        $this->currency = $currency;
    }

    /**
     * Returns the salary.
     *
     * @return int $salary
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * Sets the salary.
     *
     * @param int $salary
     */
    public function setSalary(string $salary)
    {
        $this->salary = $salary;
    }

    /**
     * Returns the cycle.
     *
     * @return string $cycle
     */
    public function getCycle()
    {
        return $this->cycle;
    }

    /**
     * Sets the cycle.
     */
    public function setCycle(string $cycle)
    {
        $this->cycle = $cycle;
    }

    /**
     * Adds a Location.
     */
    public function addLocation(Location $location)
    {
        $this->location->attach($location);
    }

    /**
     * Removes a Location.
     */
    public function removeLocation(Location $locationToRemove)
    {
        $this->location->detach($locationToRemove);
    }

    /**
     * Returns the location.
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Browserwerk\BwJobs\Domain\Model\Location> $location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Sets the location.
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Browserwerk\BwJobs\Domain\Model\Location> $location
     */
    public function setLocation(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $location)
    {
        $this->location = $location;
    }

    /**
     * Adds a JobType.
     */
    public function addJobType(JobType $jobType)
    {
        $this->jobType->attach($jobType);
    }

    /**
     * Removes a JobType.
     */
    public function removeJobType(JobType $jobTypeToRemove)
    {
        $this->jobType->detach($jobTypeToRemove);
    }

    /**
     * Returns the jobType.
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Browserwerk\BwJobs\Domain\Model\JobType> $jobType
     */
    public function getJobType()
    {
        return $this->jobType;
    }

    /**
     * Sets the jobType.
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Browserwerk\BwJobs\Domain\Model\JobType> $jobType
     */
    public function setJobType(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $jobType)
    {
        $this->jobType = $jobType;
    }

    /**
     * Returns the jobCategory.
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage $jobCategory
     */
    public function getJobCategory()
    {
        return $this->jobCategory;
    }

    /**
     * Sets the jobCategory.
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $jobCategory
     */
    public function setJobCategory(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $jobCategory)
    {
        $this->jobCategory = $jobCategory;
    }
}
