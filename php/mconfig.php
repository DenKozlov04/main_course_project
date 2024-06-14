
<?php
require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(realpath(__DIR__.'/../php/'), 'mconfig.env');


$dotenv->load();

return [
    'smtp_host' => $_ENV['SMTP_HOST'],
    'smtp_port' => $_ENV['SMTP_PORT'],
    'smtp_ssl' => $_ENV['SMTP_SSL'],
    'smtp_username' => $_ENV['SMTP_USERNAME'],
    'smtp_password' => $_ENV['SMTP_PASSWORD'],
    'from_email' => $_ENV['FROM_EMAIL'],
];





