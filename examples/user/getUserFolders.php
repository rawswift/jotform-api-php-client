<?php
/**
 * Get user folders
 *
 * http://api.jotform.com/docs/#user-folders
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$user = new JotForm\Resource\User($client);

try {
    $folders = $user->getUserFolders();
    print_r($folders);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
