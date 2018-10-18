<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2018/10/5
 * Time: 下午3:21
 */

define('OWN', realpath(''));
define('CORE', OWN . '/core');
define('APP', OWN . '/app');

define('DEBUG', true);
if (DEBUG) {
    ini_set('display_errors', 'ON');
} else {
    ini_set('display_errors', 'OFF');
}

require_once CORE . '/own.php';
spl_autoload_register('Own::load');

\core\Own::run();