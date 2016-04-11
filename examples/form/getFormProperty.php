<?php
/**
 * Get a form property
 *
 * http://api.jotform.com/docs/#form-id-properties-key
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$form = new JotForm\Resource\Form($client);

try {
    $formId = 'form-ID-here';
    $key = 'thankurl';
    $property = $form->getFormProperty($formId, $key);
    print_r($property);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
