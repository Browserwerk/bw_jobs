<?php

return [
    'ctrl' => [
        'title'                    => 'LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_job',
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
        'searchFields' => 'title,teaser,description,benefits,education_requirements,experience_requirements,qualifications,responsibilities,skills,special_commitment',
        'iconfile'     => 'EXT:core/Resources/Public/Icons/T3Icons/overlay/overlay-edit.svg',
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, slug, teaser, description, benefits, education_requirements, experience_requirements, qualifications, responsibilities, skills, special_commitment, work_hours, job_start, valid_through, location, job_type',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, slug, teaser, --palette--;;times, location, job_type, 
        --div--;LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_job.textlabel;;;1-1-1, description, benefits, education_requirements, experience_requirements, qualifications, responsibilities, skills, special_commitment, 
        --div--;LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_job.salarylabel;;;1-1-1, show_salary, currency, salary, cycle,
        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
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
                'foreign_table'       => 'tx_bwjobs_domain_model_job',
                'foreign_table_where' => 'AND {#tx_bwjobs_domain_model_job}.{#pid}=###CURRENT_PID### AND {#tx_bwjobs_domain_model_job}.{#sys_language_uid} IN (-1,0)',
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
            'label'   => 'LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_job.title',
            'config'  => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
            ],
        ],
        'slug' => [
            'exclude' => false,
            'label'   => 'LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_job.slug',
            'config'  => [
                'type'             => 'slug',
                'generatorOptions' => [
                    'fields'               => ['title'],
                    'fieldSeparator'       => '/',
                    'prefixParentPageSlug' => true,
                    'replacements'         => [
                        '/' => '',
                    ],
                ],
                'fallbackCharacter' => '-',
                'eval'              => 'uniqueInPid',
            ],
        ],
        'teaser' => [
            'exclude' => false,
            'label'   => 'LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_job.teaser',
            'config'  => [
                'type'                  => 'text',
                'enableRichtext'        => true,
                'richtextConfiguration' => 'default',
                'fieldControl'          => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
        ],
        'description' => [
            'exclude' => false,
            'label'   => 'LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_job.description',
            'config'  => [
                'type'                  => 'text',
                'enableRichtext'        => true,
                'richtextConfiguration' => 'default',
                'fieldControl'          => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
        ],
        'benefits' => [
            'exclude' => false,
            'label'   => 'LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_job.benefits',
            'config'  => [
                'type'                  => 'text',
                'enableRichtext'        => true,
                'richtextConfiguration' => 'default',
                'fieldControl'          => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
        ],
        'education_requirements' => [
            'exclude' => false,
            'label'   => 'LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_job.education_requirements',
            'config'  => [
                'type'                  => 'text',
                'enableRichtext'        => true,
                'richtextConfiguration' => 'default',
                'fieldControl'          => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
        ],
        'experience_requirements' => [
            'exclude' => false,
            'label'   => 'LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_job.experience_requirements',
            'config'  => [
                'type'                  => 'text',
                'enableRichtext'        => true,
                'richtextConfiguration' => 'default',
                'fieldControl'          => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
        ],
        'qualifications' => [
            'exclude' => false,
            'label'   => 'LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_job.qualifications',
            'config'  => [
                'type'                  => 'text',
                'enableRichtext'        => true,
                'richtextConfiguration' => 'default',
                'fieldControl'          => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
        ],
        'responsibilities' => [
            'exclude' => false,
            'label'   => 'LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_job.responsibilities',
            'config'  => [
                'type'                  => 'text',
                'enableRichtext'        => true,
                'richtextConfiguration' => 'default',
                'fieldControl'          => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
        ],
        'skills' => [
            'exclude' => false,
            'label'   => 'LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_job.skills',
            'config'  => [
                'type'                  => 'text',
                'enableRichtext'        => true,
                'richtextConfiguration' => 'default',
                'fieldControl'          => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
        ],
        'special_commitment' => [
            'exclude' => false,
            'label'   => 'LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_job.special_commitment',
            'config'  => [
                'type'                  => 'text',
                'enableRichtext'        => true,
                'richtextConfiguration' => 'default',
                'fieldControl'          => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
        ],
        'work_hours' => [
            'exclude' => false,
            'label'   => 'LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_job.work_hours',
            'config'  => [
                'type' => 'input',
                'size' => 10,
                'eval' => 'int',
            ],
        ],
        'job_start' => [
            'exclude' => false,
            'label'   => 'LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_job.job_start',
            'config'  => [
                'type'       => 'input',
                'renderType' => 'inputDateTime',
                'size'       => 16,
                'eval'       => 'datetime,int',
                'default'    => time(),
                'behaviour'  => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'valid_through' => [
            'exclude' => false,
            'label'   => 'LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_job.valid_through',
            'config'  => [
                'type'       => 'input',
                'renderType' => 'inputDateTime',
                'size'       => 16,
                'eval'       => 'datetime,int',
                'default'    => time(),
                'behaviour'  => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'data_posted' => [
            'label'  => 'Data Posted',
            'config' => [
                'type'       => 'input',
                'renderType' => 'inputDateTime',
                'size'       => 16,
                'eval'       => 'datetime,int',
                'default'    => time(),
                'behaviour'  => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'location' => [
            'exclude' => false,
            'label'   => 'LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_job.location',
            'config'  => [
                'type'                => 'select',
                'renderType'          => 'selectMultipleSideBySide',
                'foreign_table'       => 'tx_bwjobs_domain_model_location',
                'foreign_table_where' => ' AND tx_bwjobs_domain_model_location.sys_language_uid = ###REC_FIELD_sys_language_uid###',
                'MM'                  => 'tx_bwjobs_job_location_mm',
                'size'                => 10,
                'autoSizeMax'         => 30,
                'maxitems'            => 9999,
                'minitems'            => 1,
                'multiple'            => 0,
                'fieldControl'        => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],
        ],
        'job_type' => [
            'exclude' => false,
            'label'   => 'LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_job.job_type',
            'config'  => [
                'type'                => 'select',
                'renderType'          => 'selectMultipleSideBySide',
                'foreign_table'       => 'tx_bwjobs_domain_model_jobtype',
                'foreign_table_where' => ' AND tx_bwjobs_domain_model_jobtype.sys_language_uid = ###REC_FIELD_sys_language_uid###',
                'MM'                  => 'tx_bwjobs_job_jobtype_mm',
                'size'                => 10,
                'foreign_sortby'      => 'sorting',
                'autoSizeMax'         => 30,
                'maxitems'            => 9999,
                'minitems'            => 1,
                'multiple'            => 0,
                'fieldControl'        => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],
        ],
        'show_salary' => [
            'exclude' => 1,
            'label'   => '',
            'config'  => [
                'type'       => 'check',
                'renderType' => 'checkboxLabeledToggle',
                'items'      => [
                    [
                        0                => '',
                        1                => '',
                        'labelUnchecked' => 'Hidden',
                        'labelChecked'   => 'Show',
                    ],
                ],
            ],
        ],
        'currency' => [
            'exclude' => false,
            'label'   => 'LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_job.currency',
            'config'  => [
                'type' => 'input',
                'size' => 90,
            ],
        ],
        'salary' => [
            'exclude' => false,
            'label'   => 'LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_job.salary',
            'config'  => [
                'type' => 'input',
                'size' => 10,
                'eval' => 'int',
            ],
        ],
        'cycle' => [
            'exclude' => false,
            'label'   => 'LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_job.cycle',
            'config'  => [
                'type'       => 'select',
                'renderType' => 'selectSingle',
                'items'      => [
                    ['LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_job.cycle_hour', 'HOUR'],
                    ['LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_job.cycle_day', 'DAY'],
                    ['LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_job.cycle_month', 'MONTH'],
                    ['LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_job.cycle_year', 'YEAR'],
                ],
                'size'     => 1,
                'maxitems' => 1,
                'eval'     => 'trim',
            ],
        ],
    ],
    'palettes' => [
        'times' => [
            'showitem' => '
                work_hours;LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_job.work_hours,
                job_start;LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_job.job_start,
                valid_through;LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_job.valid_through,
                data_posted;LLL:EXT:bw_jobs/Resources/Private/Language/locallang_db.xlf:tx_bwjobs_domain_model_job.datePosted
            ',
        ],
    ],
];
