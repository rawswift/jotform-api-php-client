<?php
/**
 * Authenticate/check if credentials is valid
 *
 * http://api.jotform.com/docs/#user
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$user = new JotForm\Resource\User($client);

try {
    if ($response = $user->authenticate()) {
        echo "Authentication successful!\n";
        print_r($response);
    } else {
        echo "Authentication failed!\n";
    }
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
