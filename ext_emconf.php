<?php

$EM_CONF[$_EXTKEY] = [
    'title'            => 'Bw_Jobs',
    'description'      => 'The BW_Jobs extension is an easy to install TYPO3 Extension for creating a powerful job list. It also is structured to the "Schema.org" standard which will push jobs automatically to job portals.',
    'category'         => 'plugin',
    'author'           => 'Vincent Bärtsch',
    'author_company'   => 'Browserwerk GmbH // www.browserwerk.de',
    'state'            => 'stable',
    'uploadfolder'     => 0,
    'createDirs'       => '',
    'clearCacheOnLoad' => 0,
    'version'          => '1.2.1',
    'constraints'      => [
        'depends' => [
            'typo3'              => '9.5.0-10.4.99',
        ],
        'conflicts' => [],
        'suggests'  => [],
    ],
];
