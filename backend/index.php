<?php
/**
 * CodeIgniter front controller placeholder.
 * Copy from official CodeIgniter 3 distribution for production use.
 */
define('ENVIRONMENT', 'development');
$system_path = 'system';
$application_folder = 'application';
if (!is_dir($application_folder)) {
    exit('application folder missing');
}
require_once $application_folder . '/config/config.php';
echo 'Staff Management backend scaffold created. Replace index.php with standard CodeIgniter 3 index bootstrap.';
