<?php

return [

    /**
     * shippping eta information
     */
    'eat_shipping_access' => env('SHIPPING_ETA_ACCESSCODE'),
    'eat_shipping_userid' => env('SHIPPING_ETA_USERID'),
    'eat_shipping_password' => env('SHIPPING_ETA_PASSWORD'),

    /**
     * email for reporting media
     */
    'reporting_email' => 'reportedusers@kpodj.com',

    'help_kpodj' => 'kiran.reddy@clariontechnologies.co.in',
    'admin_email' => 'kiran.reddy@clariontechnologies.co.in', // To be replaced by chris@kpodj.com
    // 'help_kpodj' => 'help@kpodj.com',

    'support_kpodj' => 'kiran.reddy@clariontechnologies.co.in',
    'rma_docs' => '/var/www/REPO/kpodj/public/rma_docs/',

    'reports_kpodj' => 'report@kpodj.com',

    'system' => [
        'users' => 'Manage users',
        'groups' => 'Manage groups',
        'languages' => 'Manage languages',
        'interests' => 'Manage interests',
        'hotels' => 'Manage hotels',
        'neighborhoods' => 'Manage neighborhoods',
        'field_helpers' => 'Manage field helpers',
        'email_templates' => 'Manage email templates',
        'settings' => 'Syatem Settings',
    ],

    'user_status' => [
        'Active' => 'Active',
        'Disabled' => 'Disabled',
        'Unverified' => 'Unverified',
    ],

];
