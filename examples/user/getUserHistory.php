<?php
/**
 * Get user history
 *
 * http://api.jotform.com/docs/#user-history
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$user = new JotForm\Resource\User($client);

try {
    $options = [
        'action' => 'all',
        'date' => 'lastWeek',
        'sortBy' => 'ASC',
        'startDate' => '01/31/2013',
        'endDate' => '12/31/2013'
    ];
    $history = $user->getUserHistory($options);
    print_r($history);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
