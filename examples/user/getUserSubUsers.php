<?php
/**
 * Get sub-user account list
 *
 * http://api.jotform.com/docs/#user-subusers
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$user = new JotForm\Resource\User($client);

try {
    $subusers = $user->getUserSubUsers();
    print_r($subusers);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
