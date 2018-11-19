<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';
$config = include __DIR__ . '/../app/config/settings.php';
$app =  Core\Site::getInstance($config);



require_once __DIR__ . '/dependencies.php';
require_once __DIR__ . '/routes.php';
