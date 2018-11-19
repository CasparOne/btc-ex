<?php
defined('DS') ?: define('DS', DIRECTORY_SEPARATOR);
defined('ROOT') ?: define('ROOT', realpath(__DIR__ . DS . '..' . DS . '..') . DS);


if (file_exists(ROOT . '.env')) {
    $dotenv = new \Dotenv\Dotenv(ROOT);
    $dotenv->load();
}

return [
    'settings' => [
        'displayErrorDetails' => getenv('APP_DEBUG') === 'true' ? true : false, //set false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header
        'app' => [],

        // Renderer options
        'renderer' => [
            'template_path' => ROOT . getenv('RENDER_PATH') . DS . 'views' . DS,
        ],

        // Put here logger options
        'logger' => [],

        // Database settings
        'database' => include __DIR__ . '/db.confg.php',
    ],
];
