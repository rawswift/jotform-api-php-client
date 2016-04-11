<?php
/**
 * Delete report
 *
 * http://api.jotform.com/docs/#delete-report-id
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$report = new JotForm\Resource\Report($client);

try {
    $reportId = 'report-ID-here';
    $response = $report->deleteReport($reportId);
    print_r($response);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
