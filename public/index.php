<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is installed or .env is invalid...
$requestUri = $_SERVER['REQUEST_URI'] ?? '';
$envPath = __DIR__.'/../.env';
$envExists = file_exists($envPath);
$envValid = $envExists && str_contains(file_get_contents($envPath), 'APP_KEY=');

// In container deployments, configuration may be provided via runtime env vars
// instead of a physical .env file.
$runtimeEnvValid = ! empty(getenv('APP_KEY')) && (! empty(getenv('DB_CONNECTION')) || ! empty(getenv('DB_HOST')));
$envValid = $envValid || $runtimeEnvValid;
$installed = file_exists(__DIR__.'/../storage/installed');
$isInstallRoute = str_starts_with($requestUri, '/install');
$isDebugbar = stripos($_SERVER['REQUEST_URI'], '_debugbar') !== false;

if ((! $installed || ! $envValid) && ! $isInstallRoute && ! $isDebugbar) {
    header('Location: /install');
    exit;
}

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
(require_once __DIR__.'/../bootstrap/app.php')
    ->handleRequest(Request::capture());
