<?php
/**
 * Get user submissions
 *
 * http://api.jotform.com/docs/#user-submissions
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$user = new JotForm\Resource\User($client);

try {
    $options = [
        'offset' => 0,
        'limit' => 10,
        'filter' => json_encode([
                'fullText' => 'John Brown'
            ]),
        'orderby' => 'created_at'
    ];
    $submissions = $user->getUserSubmissions($options);
    print_r($submissions);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
