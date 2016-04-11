<?php
/**
 * Get form submissions
 *
 * http://api.jotform.com/docs/#form-id-submissions
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$form = new JotForm\Resource\Form($client);

try {
    $formId = 'form-ID-here';
    $options = [
        'offset' => 0,
        'limit' => 10,
        'filter' => json_encode([
                'created_at:gt' => '2013-01-01 00:00:00'
            ]),
        'orderby' => 'created_at'
    ];
    $response = $form->getFormSubmissions($formId, $options); // With options
    // $response = $form->getFormSubmissions($formId); // Without options
    print_r($response);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
