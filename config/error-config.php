<?php

// Error reporting configuration

error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('log_errors', true);
ini_set('display_errors', true);
ini_set('error_log', __DIR__ . '/logs/error.log');