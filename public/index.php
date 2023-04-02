<?php declare(strict_types=1);

// check application speed (with large array)
$startTime = microtime(true);

use App\Services\HttpClients\CurlClient;
use App\Services\Storage\StorageStorage;
use App\Services\Template\Template;
use Symfony\Component\Dotenv\Dotenv;
use App\Config\Config;

/**
 * Register The Auto Loader
 */
require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = new Dotenv;
$dotenv->load(__DIR__ . '/../.env');

/**
 * Load app configs
 */
$configs = new Config($_ENV);

/**
 * Inject an http client like Curl, GuzzleHttp, ...
 */
$httpClient = new CurlClient($configs->get('API_ENDPOINT'));

// start session when set configuration SESSION_DRIVER=StorageStorage
$storageDriver = null;
if ($configs->get('SESSION_DRIVER') == 'Session') {
    session_start();
    $storageDriver = new StorageStorage;
}
