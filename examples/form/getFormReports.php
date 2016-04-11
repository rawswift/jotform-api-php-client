<?php
/**
 * Get form reports
 *
 * http://api.jotform.com/docs/#form-id-reports
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$form = new JotForm\Resource\Form($client);

try {
    $formId = 'form-ID-here';
    $reports = $form->getFormReports($formId);
    print_r($reports);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
