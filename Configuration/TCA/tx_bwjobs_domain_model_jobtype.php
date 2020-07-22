<?php

return [
    'ctrl' => [
        'title'                    => 'LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_jobtype',
        'label'                    => 'title',
        'tstamp'                   => 'tstamp',
        'crdate'                   => 'crdate',
        'cruser_id'                => 'cruser_id',
        'sortby'                   => 'sorting',
        'versioningWS'             => true,
        'languageField'            => 'sys_language_uid',
        'transOrigPointerField'    => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete'                   => 'deleted',
        'enablecolumns'            => [
            'disabled'  => 'hidden',
            'starttime' => 'starttime',
            'endtime'   => 'endtime',
        ],
        'searchFields' => 'title,description',
        'iconfile'     => 'EXT:core/Resources/Public/Icons/T3Icons/content/content-clock.svg',
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, description, employment_type',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, description, employment_type, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label'   => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config'  => [
                'type'       => 'select',
                'renderType' => 'selectSingle',
                'special'    => 'languages',
                'items'      => [
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple',
                    ],
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude'     => true,
            'label'       => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config'      => [
                'type'       => 'select',
                'renderType' => 'selectSingle',
                'default'    => 0,
                'items'      => [
                    ['', 0],
                ],
                'foreign_table'       => 'tx_bwjobs_domain_model_jobtype',
                'foreign_table_where' => 'AND {#tx_bwjobs_domain_model_jobtype}.{#pid}=###CURRENT_PID### AND {#tx_bwjobs_domain_model_jobtype}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label'  => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max'  => 255,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label'   => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config'  => [
                'type'       => 'check',
                'renderType' => 'checkboxToggle',
                'items'      => [
                    [
                        0                    => '',
                        1                    => '',
                        'invertStateDisplay' => true,
                    ],
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label'   => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config'  => [
                'type'       => 'input',
                'renderType' => 'inputDateTime',
                'eval'       => 'datetime,int',
                'default'    => 0,
                'behaviour'  => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label'   => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config'  => [
                'type'       => 'input',
                'renderType' => 'inputDateTime',
                'eval'       => 'datetime,int',
                'default'    => 0,
                'range'      => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038),
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],

        'title' => [
            'exclude' => false,
            'label'   => 'LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_jobtype.title',
            'config'  => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
            ],
        ],
        'description' => [
            'exclude' => false,
            'label'   => 'LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_jobtype.description',
            'config'  => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'employment_type' => [
            'exclude' => false,
            'label'   => 'LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_jobtype.employment_type',
            'config'  => [
                'type'       => 'select',
                'renderType' => 'selectSingle',
                'items'      => [
                    ['LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_jobtype.fulltime', 'FULL_TIME'],
                    ['LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_jobtype.parttime', 'PART_TIME'],
                    ['LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_jobtype.contractor', 'CONTRACTOR'],
                    ['LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_jobtype.intern', 'INTERN'],
                    ['LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_jobtype.volunteer', 'VOLUNTEER'],
                    ['LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_jobtype.prediem', 'PER_DIEM'],
                    ['LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_jobtype.temporary', 'TEMPORARY'],
                    ['LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_jobtype.other', 'OTHER'],
                ],
                'size'     => 1,
                'maxitems' => 1,
                'eval'     => 'trim',
            ],
        ],

        'job' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
    ],
];
