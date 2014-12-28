<?php

define('SITE_TITLE', 'Pageler');
// Always provide a TRAILING SLASH (/) AFTER A PATH
define('URL', 'http://localhost:8888/pageler/');
define('LIBS', 'libs/');

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'Pageler');
define('DB_USER', 'root');
define('DB_PASS', 'root');


define('GOOGLE_CLIENT_ID', '662672656244-t4n12p66fdnapm2aqos4ota4vtdsgud2.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', 'PHUQ1Crxvik6lb3D5P0Um3KS');

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
define('WRONG_API_MESSAGE', 'Wrong or Missing API Key');
define('FORBIDDEN_ERROR', 'Forbidden access - A valid key is required');
define('INITIAL_PAGE','[{"col":1,"row":1,"size_x":3,"size_y":3,"type":"text","htmlData":"<textarea style=\"font-weight: bold; resize: none; width: 95%; height: 38px;\" spellcheck=\"false\">Start Page</textarea> <textarea style=\"resize: none; width: 95%; height: 36px;\" spellcheck=\"false\">Regular Models</textarea>"},{"col":10,"row":1,"size_x":3,"size_y":3,"type":"text","htmlData":"<textarea style=\"font-weight: bold; resize: none; width: 95%; height: 38px;\" spellcheck=\"false\">Heading here</textarea> <textarea style=\"resize: none; width: 95%; height: 36px;\" spellcheck=\"false\">Add Text here </textarea>"},{"id":"new","col":4,"row":1,"size_x":6,"size_y":3,"type":"image","htmlData":"<p><img src=\" http://pageler.co/public/images/image.png\" class=\"initImage\"></p><a href=\"javascript:void(0);\" class=\"upload_link\" onclick=\"init_link(this);\">Upload Image  </a>"}]');
