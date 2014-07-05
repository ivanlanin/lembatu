<?php
return array(
    'driver' => 'eloquent',
    'model' => 'Lembatu\Model\User',
    'table' => 'users',

    'reminder' => array(
        'email' => 'emails.auth.reminder',
        'table' => 'password_reminders',
        'expire' => 60,
    ),
);
