<?php

return [
    'side_bar' => [
        'header' => 'Hello Visitor',
        'sub_header' => 'Please enter your name before enter the building.'
    ],
    'entry_form' => [
        'step_1' => [
            'full_name' => [
                'label' => 'Full Name (as NRIC/ Work Pass)',
                'tooltip' => 'Full Name (as NRIC/ Work Pass)'
            ],
            'phone_number' => [
                'label' => 'Contact Number',
                'tooltip' => 'E.g: 72891827'
            ],
        ],
        'step_2' => [
            'header' => 'Hello :full_name',
            'checkin_date' => 'You are checked in:',
            'check_temperature' => 'Click Start to take your temperature',
            'errors' => [
                'first_step' => 'Please complete step 1 before proceed',
            ]
        ],
        'step_3' => [
            'info_message' => 'Please click the button below to checkin',
            'success' => 'Your are good to go',
            'warning' => 'Oh no, :full_name seem like you are not allowed to enter the building.',
            'errors' => [
                'second_step' => 'Please complete step 2 before proceed',
            ]
        ]
    ]
];
