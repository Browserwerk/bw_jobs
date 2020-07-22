<?php

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['bwjobs_frontend'] = 'layout,select_key,pages,recursive';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['bwjobs_frontend'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('bwjobs_frontend', 'FILE:EXT:jobs/Configuration/FlexForms/JobPlugin.xml', '*');
