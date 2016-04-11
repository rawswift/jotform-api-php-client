<?php
/**
 * Get user settings
 *
 * http://api.jotform.com/docs/#user-settings
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$user = new JotForm\Resource\User($client);

try {
    $settings = $user->getUserSettings();
    print_r($settings);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
