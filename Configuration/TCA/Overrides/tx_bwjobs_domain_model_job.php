<?php

defined('TYPO3_MODE') || die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    'bw_jobs',
    'tx_bwjobs_domain_model_job'
);
