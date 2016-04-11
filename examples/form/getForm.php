<?php
/**
 * Get form details
 *
 * http://api.jotform.com/docs/#form-id
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$form = new JotForm\Resource\Form($client);

try {
    $formId = 'form-ID-here';
    $formDetails = $form->getForm($formId);
    print_r($formDetails);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
