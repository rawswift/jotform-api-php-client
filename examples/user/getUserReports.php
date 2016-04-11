<?php
/**
 * Get user reports
 *
 * http://api.jotform.com/docs/#user-reports
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$user = new JotForm\Resource\User($client);

try {
    $reports = $user->getUserReports();
    print_r($reports);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
