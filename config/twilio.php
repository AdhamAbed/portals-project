<?php

return [
    'twilio' => [
        'default' => 'twilio',
        'connections' => [
            'twilio' => [
         
                'sid' => env('TWILIO_SID', 'ACfca0532cef428d81f977384e908572e5'),
                'token' => env('TWILIO_TOKEN', '6af66d01e34bd1b07d3667e986be388b'),
                'from' => env('TWILIO_FROM', 'alraad'),
            ],
        ],
    ],
];
