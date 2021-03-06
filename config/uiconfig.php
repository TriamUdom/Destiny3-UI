<?php

/*
|
| DestinyUI 3.0
| (C) 2016 TUDT
|
| UI-Specific configurations
|
*/


return [

    /*
    |--------------------------------------------------------------------------
    | DestinyCore API key
    |--------------------------------------------------------------------------
    |
    | Here you can set the API key that we'll use when we need to call in to
    | DestinyCore. This is a ##secret-data!##
    |
    */

    'core_api_key' => 'debug',

    /*
    |--------------------------------------------------------------------------
    | DestinyCore Base API URL
    |--------------------------------------------------------------------------
    |
    | This option specifies the base API URL of the core server.
    | Be it IP addresses or DNS names, this accepts it all. Just make sure
    | that this URL is accessible from the server itself!
    |
    */

    'core_base_api_url' => 'https://core3.destiny.triamudom.ac.th',

    /*
    |--------------------------------------------------------------------------
    | Destiny Operation Mode
    |--------------------------------------------------------------------------
    |
    | Operation mode for destinyui
    |
    | province_quota => for province quota
    | normal => for normal operation
    | print_only => for print only period in normal operation
    | close => close
    |
    */

    'mode' => ENV('DESTINY_OPERATION_MODE'),

    /*
    |--------------------------------------------------------------------------
    | Operation year
    |--------------------------------------------------------------------------
    |
    | Education year which students were expected to start their (short) 3 years
    |
    */
    'operation_year' => ENV('OPERATION_YEAR'),

    /*
    |--------------------------------------------------------------------------
    | Public Test Run?
    |--------------------------------------------------------------------------
    |
    | Indicates whether the system will display a notice saying that
    | this is a test/beta run and not the final version.
    |
    | true/false
    |
    */

    'isPTR' => ENV('IS_PTR'),

    /*
     * Andromeda Token Key
     *
     * The key used to sign user identity token sent to Andromeda.
     */
    'andromeda_key' => 'songkiatthepprasaneza555',
    'andromeda_url' => 'http://help.apply.triamudom.ac.th',

    /*

    */
    'valkyrie_base_api_url' => ENV('VALKYRIE_BASE_API_URL', 'valkyrie.triamudom.ac.th'),
    'valkyrie_api_key' => ENV('VALKYRIE_API_KEY'),

    /*

    */
    'move_in_deadline' => '16/05/2558',
];
