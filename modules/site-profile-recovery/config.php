<?php

return [
    '__name' => 'site-profile-recovery',
    '__version' => '0.0.1',
    '__git' => 'git@github.com:getmim/site-profile-recovery.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'https://iqbalfn.com/'
    ],
    '__files' => [
        'modules/site-profile-recovery' => ['install','update','remove'],
        'theme/site/profile/recovery' => ['install','remove'],
        'app/site-profile-recovery' => ['install','remove']
    ],
    '__dependencies' => [
        'required' => [
            [
                'profile' => NULL
            ],
            [
                'profile-auth' => NULL
            ],
            [
                'lib-model' => NULL
            ],
            [
                'lib-form' => NULL 
            ]
        ],
        'optional' => []
    ],
    'autoload' => [
        'classes' => [
            'SiteProfileRecovery\\Controller' => [
                'type' => 'file',
                'base' => 'app/site-profile-recovery/controller'
            ],
            'SiteProfileRecovery\\Library' => [
                'type' => 'file',
                'base' => 'modules/site-profile-recovery/library'
            ],
            'SiteProfileRecovery\\Model' => [
                'type' => 'file',
                'base' => 'modules/site-profile-recovery/model'
            ]
        ],
        'files' => []
    ],
    'routes' => [
        'site' => [
            'siteProfileRecovery' => [
                'path' => [
                    'value' => '/pme/recovery'
                ],
                'handler' => 'SiteProfileRecovery\\Controller\\Recovery::recovery',
                'method' => 'GET|POST'
            ],
            'siteProfileRecoveryReset' => [
                'path' => [
                    'value' => '/pme/recovery/reset/(:hash)',
                    'params'=> [
                        'hash' => 'any'
                    ]
                ],
                'handler' => 'SiteProfileRecovery\\Controller\\Recovery::reset',
                'method' => 'GET|POST'
            ],
            'siteProfileRecoveryResetResent' => [
                'path' => [
                    'value' => '/pme/recovery/resent/(:profile)/(:recover)',
                    'params'=> [
                        'profile' => 'number',
                        'recover' => 'number'
                    ]
                ],
                'handler' => 'SiteProfileRecovery\\Controller\\Recovery::resent',
                'method' => 'GET|POST'
            ]
        ]
    ],
    'libForm' => [
        'forms' => [
            'site.profile.recovery' => [
                'identity' => [
                    'label' => 'Identity',
                    'type' => 'text',
                    'rules' => [
                        'required' => TRUE,
                        'empty' => FALSE
                    ]
                ]
            ],
            'site.profile.reset' => [
                'password' => [
                    'label' => 'New Password',
                    'type' => 'password',
                    'rules' => [
                        'required' => true,
                        'empty' => false,
                        'length' => ['min' => 6]
                    ]
                ],
                're-password' => [
                    'label' => 'Retype Password',
                    'type' => 'password',
                    'rules' => [
                        'required' => true,
                        'empty' => false,
                        'equals_to' => 'password'
                    ]
                ]
            ]
        ]
    ]
];