<?php
/**
 * Register user
 *
 * http://api.jotform.com/docs/#user-register
 */

require '../../vendor/autoload.php';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$user = new JotForm\Resource\User($client);

try {
    $response = $user->register([
            'username' => 'foobar',
            'password' => 'myp@ssw0rd',
            'email' => 'foobar@mywebsite.com'
        ]);
    print_r($response);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
