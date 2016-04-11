<?php
/**
 * Get user information
 *
 * http://api.jotform.com/docs/#user
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$user = new JotForm\Resource\User($client);

try {
    $info = $user->getUser();
    print_r($info);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
