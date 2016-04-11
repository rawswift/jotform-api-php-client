<?php
/**
 * Get form properties
 *
 * http://api.jotform.com/docs/#form-id-properties
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$form = new JotForm\Resource\Form($client);

try {
    $formId = 'form-ID-here';
    $properties = $form->getFormProperties($formId);
    print_r($properties);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
