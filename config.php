<?php

// Always provide a TRAILING SLASH (/) AFTER A PATH
define('URL', 'http://localhost:8888/pageler/');
define('LIBS', 'libs/');

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'Pageler');
define('DB_USER', 'root');
define('DB_PASS', 'root');

// The sitewide hashkey, do not change this because its used for passwords!
// This is for other hash keys... Not sure yet
define('HASH_GENERAL_KEY', 'MixitUp200');

// This is for database passwords only
define('HASH_PASSWORD_KEY', 'catsFLYhigh2000miles');

/**
 * Define the Universal Messages
 */

define('USER_INSERT_FAILED', 'Failed to insert the User');
define('PAGE_ADDED_SUCCESFULLY', 'Page was created.');
define('USER_NOT_ENTERED', 'Cannot add user. Please try again');