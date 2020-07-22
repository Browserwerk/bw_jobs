<?php

defined('TYPO3_MODE') || die('Access denied.');

// register viewHelper namespace
$TYPO3_CONF_VARS['SYS']['fluid']['namespaces']['bwj'][] = 'Browserwerk\\BwJobs\\ViewHelper';

call_user_func(
    function () {
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Browserwerk.BwJobs',
            'Frontend',
            [
                'Job'      => 'list, show, render, perform',
                'JobType'  => 'list, show',
                'Contact'  => 'list, show',
                'Location' => 'list, show',
            ],
            // non-cacheable actions
            [
                'Job'      => 'list, show, perform',
                'JobType'  => 'list, show',
                'Contact'  => 'list, show',
                'Location' => 'list, show',
            ]
        );

        // wizards
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            'mod {
                wizards.newContentElement.wizardItems.plugins {
                    elements {
                        frontend {
                            iconIdentifier = bw_jobs-plugin-fontend
                            title = LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs.plugin
                            description = LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs.description
                            tt_content_defValues {
                                CType = list
                                list_type = bwjobs_frontend
                            }
                        }
                    }
                    show = *
                }
           }'
        );

        $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
        $iconRegistry->registerIcon(
            'bw_jobs-plugin-frontend',
            \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            ['source' => 'EXT:bw_jobs/ext_icon.svg']
        );

        // Register for hook to show preview of tt_content element of CType="bwjobs_newcontentelement" in page module
        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem']['bwjobs_frontend'] =
            \Browserwerk\BwJobs\Hooks\PreviewRenderer::class;
    }
);
