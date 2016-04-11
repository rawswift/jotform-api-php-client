<?php
/**
 * Delete form question
 *
 * http://api.jotform.com/docs/#delete-form-id-question-id
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$form = new JotForm\Resource\Form($client);

try {
    $formId = 'form-ID-here';
    $questionId = '1';
    $response = $form->deleteFormQuestion($formId, $questionId);
    print_r($response);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
