<?php
/**
 * Logout user
 *
 * http://api.jotform.com/docs/#user-logout
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$user = new JotForm\Resource\User($client);

try {
    $response = $user->logout();
    print_r($response);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
