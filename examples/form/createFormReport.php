<?php
/**
 * Create report
 *
 * http://api.jotform.com/docs/#post-form-id-reports
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$form = new JotForm\Resource\Form($client);

try {
    $formId = 'form-ID-here';
    $report = [
            'title' => 'Report Title',
            'list_type' => 'grid',
            'fields' => 'ip,dt,2'
    ];
    $response = $form->createFormReport($formId, $report);
    print_r($response);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
