<?php
set_error_handler(function ($severity, $message, $file, $line) {
    error_log(((string) new ErrorException($message, 0, $severity, $file, $line)) . PHP_EOL);
});
include 'vendor/autoload.php';

