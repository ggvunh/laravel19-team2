<?php
return [

    'twilio' => [

        'default' => 'twilio',

        'connections' => [

            'twilio' => [

                /*
                |--------------------------------------------------------------------------
                | SID
                |--------------------------------------------------------------------------
                |
                | Your Twilio Account SID #
                |
                */

                // 'sid' => getenv('TWILIO_SID') ?: 'AC80f52ecdb88d3f6472b340b205d78dc2',
                'sid' => getenv('TWILIO_SID') ?: 'ACa57d660b1156b3210b047d41d1948d0e',
                // ACa57d660b1156b3210b047d41d1948d0e
                /*
                |--------------------------------------------------------------------------
                | Access Token
                |--------------------------------------------------------------------------
                |
                | Access token that can be found in your Twilio dashboard
                |
                */

                // 'token' => getenv('TWILIO_TOKEN') ?: 'dd617508fa4d29ba9e7aaa78b7d72f81',
                'token' => getenv('TWILIO_TOKEN') ?: '00ac296e3eaa36ba738578c40f0e94f7',
                // 00ac296e3eaa36ba738578c40f0e94f7
                /*
                |--------------------------------------------------------------------------
                | From Number
                |--------------------------------------------------------------------------
                |
                | The Phone number registered with Twilio that your SMS & Calls will come from
                |
                */

                // 'from' => getenv('TWILIO_FROM') ?: '+19786274090',
                'from' => getenv('TWILIO_FROM') ?: '+12568297306',

                /*
                |--------------------------------------------------------------------------
                | Verify Twilio's SSL Certificates
                |--------------------------------------------------------------------------
                |
                | Allows the client to bypass verifying Twilio's SSL certificates.
                | It is STRONGLY advised to leave this set to true for production environments.
                |
                */

                'ssl_verify' => true,
            ],
        ],
    ],
];
