<?php
/**
 * Get user forms
 *
 * http://api.jotform.com/docs/#user-forms
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$user = new JotForm\Resource\User($client);

try {
    $options = [
        'offset' => 0,
        'limit' => 30,
        'filter' => json_encode([
                'new' => '1'
            ]),
        'orderby' => 'created_at'
    ];
    $forms = $user->getUserForms($options);
    print_r($forms);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
