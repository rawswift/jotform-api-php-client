<?php
/**
 * Update user settings
 *
 * http://api.jotform.com/docs/#post-user-settings
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$user = new JotForm\Resource\User($client);

try {
    $options = [
        'name' => 'Foo Bar',
        // 'email' => 'update-my-email@mywebsite.com',
        // 'website' => 'http://my.otherwebsite.com/',
        // 'time_zone' => 'UTC',
        'company' => 'MyCompany Inc.',
        // 'securityQuestion' => 'What?',
        // 'securityAnswer' => 'foobar',
        // 'industry' => 'Web Development', // Refer to https://www.jotform.com/myaccount/ ("Industry" field)
    ];
    $response = $user->updateUserSettings($options);
    print_r($response);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
