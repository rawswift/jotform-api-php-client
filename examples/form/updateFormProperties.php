<?php
/**
 * Add/edit properties of a specific form
 *
 * http://api.jotform.com/docs/#post-form-id-properties
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$form = new JotForm\Resource\Form($client);

try {
    $formId = 'form-ID-here';
    $properties = [
        'properties' => [
            'thankurl' => 'http://www.mywebsite.com/thank-you-page.html'
        ]
    ];
    $response = $form->updateFormProperties($formId, $properties);
    print_r($response);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
