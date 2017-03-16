<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Set base_url
$allowed_domains = array('localhost', 'demos.sumodevelopment.co.za', 'uploads.baubaplatinum.co.za');
$default_domain = 'localhost';

if (in_array($_SERVER['HTTP_HOST'], $allowed_domains, TRUE)) {
    $domain = $_SERVER['HTTP_HOST'];

    if ($domain == 'demos.sumodevelopment.co.za') {
        $domain .= '/bauba-uploader';
    }

} else {
    $domain = $default_domain;
}
if (!empty($_SERVER['HTTPS'])) {
    $config['base_url'] = 'https://' . $domain;
} else {
    $config['base_url'] = 'http://' . $domain;
}
