<?php

defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function () {
        if (TYPO3_MODE === 'BE') {
            TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
                'Browserwerk.BwJobs',
                'web', // Make module a submodule of 'web'
                'bwjobs', // Submodule key
                '', // Position
                [
                    'Job'       => 'list, show, delete',
                    'Location'  => 'list, show, delete',
                    'JobType'   => 'list, show, delete',
                    'Contact'   => 'list, show, delete',
                ],
                [
                    'access'    => 'user,group',
                    'icon'      => 'EXT:bw_jobs/ext_icon.svg',
                    'labels'    => 'LLL:EXT:bw_jobs/Resources/Private/Language/locallang_bwjobs.xlf',
                ]
            );
        }
        // add static includes
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('bw_jobs', 'Configuration/TypoScript', 'Bw_Jobs');

        // job language config
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
            'tx_bwjobs_domain_model_job',
            'EXT:bw_jobs/Resources/Private/Language/locallang_csh_tx_bwjobs_domain_model_job.xlf'
        );
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bwjobs_domain_model_job');

        // contact language config
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
            'tx_bwjobs_domain_model_contact',
            'EXT:bw_jobs/Resources/Private/Language/locallang_csh_tx_bwjobs_domain_model_contact.xlf'
        );
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bwjobs_domain_model_contact');

        // job language config
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
            'tx_bwjobs_domain_model_location',
            'EXT:bw_jobs/Resources/Private/Language/locallang_csh_tx_bwjobs_domain_model_location.xlf'
        );
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bwjobs_domain_model_location');

        // jobType language config
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
            'tx_bwjobs_domain_model_jobtype',
            'EXT:bw_jobs/Resources/Private/Language/locallang_csh_tx_bwjobs_domain_model_jobtype.xlf'
        );
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bwjobs_domain_model_jobtype');

        TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Browserwerk.BwJobs',
            'Frontend',
            'Frontend'
        );
    }
);
