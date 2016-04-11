<?php
/**
 * Get monthly user usage
 *
 * http://api.jotform.com/docs/#user-usage
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$user = new JotForm\Resource\User($client);

try {
    $usage = $user->getUserUsage();
    print_r($usage);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
