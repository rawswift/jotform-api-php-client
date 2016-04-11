<?php
/**
 * Login user using username/password credentials
 *
 * http://api.jotform.com/docs/#user-login
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$user = new JotForm\Resource\User($client);

try {
    $options = [
        // 'appName' => 'Test Application',
        // 'access' => 'readOnly', // or 'full'
    ];
    $response = $user->login('foobar', 'myp@ssw0rd', $options);
    print_r($response);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
