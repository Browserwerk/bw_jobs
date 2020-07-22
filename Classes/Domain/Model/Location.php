<?php

namespace Browserwerk\BwJobs\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

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
class Location extends AbstractEntity
{
    /**
     * title.
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("StringLength", options={"minimum": 3, "maximum": 50})
     */
    protected $title = '';

    /**
     * description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * street.
     *
     * @var string
     */
    protected $street = '';

    /**
     * city.
     *
     * @var string
     */
    protected $city = '';

    /**
     * zip.
     *
     * @var string
     */
    protected $zip = '';

    /**
     * country.
     *
     * @var string
     */
    protected $country = '';
    /**
     * country.
     *
     * @var string
     */
    protected $countryzone = '';

    /**
     * longitude.
     *
     * @var float
     */
    protected $longitude = 0.0;

    /**
     * latitude.e
     *
     * @var float
     */
    protected $latitude = 0.0;

    /**
     * image.
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $image = null;
    /**
     * __construct
     */
    public function __construct()
    {
        $this->initStorageObjects();
    }

    /**
     * contact.
     *
     * @var \Browserwerk\BwJobs\Domain\Model\Contact
     */
    protected $contact = null;

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
     * Returns the street.
     *
     * @return string $street
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Sets the street.
     *
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * Returns the city.
     *
     * @return string $city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Sets the city.
     *
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * Returns the zip.
     *
     * @return string $zip
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Sets the zip.
     *
     * @param string $zip
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     * Returns the country.
     *
     * @return string $country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Sets the country.
     *
     * @param string $country
     */
    public function setCountry(string $country)
    {
        $this->country = $country;
    }

    /**
     * Returns the countryzone.
     *
     * @return string
     */
    public function getCountryzone()
    {
        return $this->countryzone;
    }

    /**
     * Sets the countryzone.
     *
     * @param string $countryzone
     */
    public function setCountryzone(string $countryzone)
    {
        $this->countryzone = $countryzone;
    }

    /**
     * Returns the longitude.
     *
     * @return float $longitude
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Sets the longitude.
     *
     * @param float $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * Returns the latitude.
     *
     * @return float $latitude
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Sets the latitude.
     *
     * @param float $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * Returns the contact.
     *
     * @return \Browserwerk\BwJobs\Domain\Model\Contact $contact
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Sets the contact.
     *
     * @param \Browserwerk\BwJobs\Domain\Model\Contact $contact
     */
    public function setContact(\Browserwerk\BwJobs\Domain\Model\Contact $contact)
    {
        $this->contact = $contact;
    }

    private function initStorageObjects()
    {
        $this->image = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $image)
    {
        $this->image = $image;
    }
}
