<?php

namespace Browserwerk\BwJobs\Domain\Repository;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Persistence\Generic\QuerySettingsInterface;
use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * Class AbstractRepository.
 *
 * this class contains helper classes for TYPO3 repositories.
 */
abstract class AbstractRepository extends Repository
{

    public function getStoragePid() : int
    {
        $this->configurationManager = GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManager');
        return
            (int)$this->configurationManager->
            getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT)
            ['plugin.']['tx_bwjobs.']['persistence.']['storagePid'];
    }
    /**
     * initializeObject.
     */
    public function initializeObject(): void
    {
        $sys_language_uid = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Context\Context::class)->getAspect('language')->getId();
        $pidList = $this->getStoragePid();
        if (!is_array($pidList)) {
            $pidList = explode(',', $pidList);
        }
        $this->injectQuerySettings(
            $this
                ->getQuerySettings()
                ->setStoragePageIds($pidList)
                ->setRespectStoragePage(true)
                ->setIgnoreEnableFields(false)
                ->setLanguageUid($sys_language_uid)
        );
    }

    /**
     * Persist all.
     */
    public function _persistAll(): void
    {
        $this->persistenceManager->persistAll();
    }

    /**
     * Blank default query settings.
     */
    public function getQuerySettings(): QuerySettingsInterface
    {
        return GeneralUtility::makeInstance(Typo3QuerySettings::class);
    }

    /**
     * Injects additional query settings.
     *
     * @param QuerySettingsInterface $querySettings
     */
    public function injectQuerySettings(QuerySettingsInterface $querySettings): void
    {
        $this->setDefaultQuerySettings($querySettings);
    }

    /**
     * Returns a new instance of doctrine query builder.
     *
     * @param string $table
     *
     * @return QueryBuilder
     */
    public function getDoctrine(string $table): QueryBuilder
    {
        return GeneralUtility::makeInstance(ConnectionPool::class)
            ->getConnectionForTable($table)
            ->createQueryBuilder();
    }

    /**
     * Returns all objects of this repository.
     *
     * @return QueryResultInterface|array
     */
    public function findAll()
    {
        $this->initializeObject();
        return $this->createQuery()->execute();

    }

}
