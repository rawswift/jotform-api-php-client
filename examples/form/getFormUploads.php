<?php
/**
 * Get form uploads
 *
 * http://api.jotform.com/docs/#form-id-files
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$form = new JotForm\Resource\Form($client);

try {
    $formId = 'form-ID-here';
    $uploads = $form->getFormUploads($formId);
    print_r($uploads);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
