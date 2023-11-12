<?php

return [

    'username' => env('VERIMOR_USERNAME'),

    'password' => env('VERIMOR_PASSWORD'),

    /*
    |  If this value is empty, your first title registered in the system is used.
    */
    'from' => env('VERIMOR_FROM'),

    /*
    | You must send this data as a string.
    | Format: 'HH:mm'
    | Available range: '00:01', '48:00'
    */
    'valid_for' => env('VERIMOR_VALID_FOR', '24:00'),

    /*
    | You must set it to '1' for special characters.
    */
    'data_coding' => env('VERIMOR_DATA_CODING', '0'),

    /*
    | For commercial you need to specify this as 'true'.
    | Available values: 'BIREYSEL', 'TACIR'
    */
    'is_commercial' => env('VERIMOR_IS_COMMERCIAL', '0'),

    /*
    | For commercial you need to specify this as 'TACIR'.
    | Available values: 'BIREYSEL', 'TACIR'
    */
    'iys_recipient_type' => env('VERIMOR_IYS_RECIPIENT_TYPE', 'BIREYSEL')
];