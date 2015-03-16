<?php

$random_pass = trim(`apg -m 16 | head -n 1`);
echo "test user password: $random_pass\n";


return [
    'sites' => [
        'wordpress4point1-test.pagely.com' => 'setup1',
    ],
    'configs' => [
        'setup1' => [
            // copy files from source to site
            'copy' => [
                '~/theme1' => 'wp-content/themes',
            ],

            // remove, install, activate plugins
            'plugins' => [
                'w3-total-cache' => 'remove', // remove will deactivate and remove
            ],

            // activate theme
            'theme' => 'twentyfourteen',

            // options to set in wp_config
            // actions are add|delete|update
            'options' => [
                'foobar' => ['action' => 'add', 'value' => 'baz', 'autoload' => true],
                'foobar2' => ['action' => 'add', 'value' => ['i' => 'can', 'be' => 'an array']],
            ],

            // posts to delete (this is setup to be super safe, so really only designed for clearing out initial sample posts
            'posts_to_delete' => [
                ['title' => 'Hello World!', 'id' => 1],
                ['title' => 'Sample Page', 'id' => 2],
            ],

            // posts to import from xml
            'import' => [
                '~/import.xml'
            ],

            // users to create
            'users' => [
                'test' => ['email' => 'test@test.com', 'role' => 'administrator', 'password' => $random_pass, 'display_name' => 'test user'],
            ]
        ]
    ],
];
