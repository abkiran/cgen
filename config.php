<?php

// $MODE = isset($argv[1])?$argv[1]:'local';
$MODE = 'local';
if ($MODE == 'local') {
    define('LOGFILE', '/var/log/apps/sidp.log');
    define('BASEDIR', '/var/www/REPO/chi/');
    define('SRC_DIR', '/home/kiran/sidp_sftp/');
    define('DEST_DIR', '/home/kiran/sidp_dest/');
    define('BASE_DIR', '/var/www/REPO/cgen/');
    define('OUTPUT_DIR', '/var/www/REPO/OUTPUTS/');
    define('OUTPUT_URL', 'http://localhost/REPO/OUTPUTS/');

    // DB Credentials
    define('DB_SERVER', 'localhost');
    define('DB_USER', 'sidp');
    define('DB_PASSWORD', 'sidp@test123');
    define('DB_NAME', '');
    define('DB_PREFIX', 'test_');
    define('DB_POSTFIX', '');

    define('IS_LOCAL', 1);

} else {

    define('LOGFILE', '/var/log/sidp.log');
    define('BASEDIR', '/home/clariondev/sidp/');
    define('SRC_DIR', '/sftp/');
    define('DEST_DIR', '/home/clariondev/sidp_dest/');
    define('OUTPUT_DIR', '/var/www/REPO/OUTPUTS/');
    define('OUTPUT_URL', 'http://localhost/REPO/OUTPUTS/');

    // DB Credentials
    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'x23g.91k');
    define('DB_NAME', '');
    define('DB_PREFIX', '');
    define('DB_POSTFIX', '_db');

    define('IS_LOCAL', 0);
}

define('MAIL_TO', 'abkiranreddy@gmail.com');

// Create a seperate log for parsers
define('PARSER_LOG', 1);
