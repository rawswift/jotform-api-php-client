<?php
/**
 * Create new webhook
 *
 * http://api.jotform.com/docs/#post-form-id-webhooks
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$form = new JotForm\Resource\Form($client);

try {
    $formId = 'form-ID-here';
    $webhook = [
            'webhookURL' => 'http://www.mywebsite.com/jotform/webhook'
    ];
    $response = $form->createFormWebhook($formId, $webhook);
    print_r($response);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
