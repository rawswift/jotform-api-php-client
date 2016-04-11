<?php
/**
 * Get form webhooks
 *
 * http://api.jotform.com/docs/#form-id-webhooks
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$form = new JotForm\Resource\Form($client);

try {
    $formId = 'form-ID-here';
    $webhooks = $form->getFormWebhooks($formId);
    print_r($webhooks);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
