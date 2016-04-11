<?php
/**
 * Get report details
 *
 * http://api.jotform.com/docs/#report-id
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$report = new JotForm\Resource\Report($client);

try {
    $reportId = 'report-ID-here';
    $details = $report->getReportDetails($reportId);
    print_r($details);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
