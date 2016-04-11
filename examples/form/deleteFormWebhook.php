<?php
/**
 * Delete a webhook of a specific form
 *
 * http://api.jotform.com/docs/#delete-form-id-webhooks
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$form = new JotForm\Resource\Form($client);

try {
    $formId = 'form-ID-here';
    $webhookId = 0;
    $response = $form->deleteFormWebhook($formId, $webhookId);
    print_r($response);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
