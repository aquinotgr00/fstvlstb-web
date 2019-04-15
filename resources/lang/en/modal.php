<?php

return [
    'register' => [
        'heading' => 'REGISTRATION',
        'have_account' => 'Already have NIF, please <a href="#" data-toggle="modal" data-target="#modal-masuk" data-dismiss="modal">Sign In</a>',
        'columns' => [
            'name' => 'Full Name',
            'photo' => 'Potrait',
            'email' => 'Email',
            'phone' => 'Mobile Number',
            'address' => 'Address',
            'gender' => 'Sex',
            'born_date' => 'Born Date',
            'month' => 'Month',
            'year' => 'Year',
            'password' => 'Password',
            're_password' => 'Re-Type Password',
            'gas' => 'GAS!'
        ],
    ],
    'login' => [
        'heading' => 'LOGIN',
        'need_account' => 'Don’t have NIF, go to <a href="#" data-toggle="modal" data-target="#modal-daftar" data-dismiss="modal">Sign Up</a>',
        'columns' => [
            'email' => 'NIF/E-mail',
            'password' => 'Password',
            'forgot_password' => '<a href="#" data-toggle="modal" data-target="#modal-reset" data-dismiss="modal">Forgot</a> Password',
            'gas' => 'GAS!'
        ],
    ],
    'reset' => [
        'heading' => 'RESET',
        'columns' => [
            'email' => 'Email',
            'gas' => 'GAS!',
        ],
    ],
    'succeed' => [
        'heading' => 'CONGRATS',
        'top_detail' => 'You are registered in FSTVLST, your <br /> NIF (Festivalist Identification Number ) is:',
        'bot_detail' => 'This is your number for all corncerning FSTVLST.',
        'dont_forget' => 'Save it, and don’t forget.',
        'share' => 'Share and tell responsibly.',
        'success' => 'SUCCESS',
        'check_email' => 'Please check your email to reset password.',
    ],
    'error' => [
        'hold_on' => 'WAIT A SECOND',
        'too_many_attempt' => '3 failed login attemps. Wrong NIF or Password.',
        'button' => 'OK',
    ],
];