<?php
/**
 * Update a single question properties
 *
 * http://api.jotform.com/docs/#post-form-id-question-id
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$form = new JotForm\Resource\Form($client);

try {
    $formId = 'form-ID-here';
    $questionId = '1';
    $questionUpdate = [
        'question' => [
            'name' => 'Header',
            'order' => 1,
            'text' => 'Updated Form Title',
            'type' => 'control_head'
        ]
    ];
    $questionDetails = $form->updateFormQuestion($formId, $questionId, $questionUpdate);
    print_r($questionDetails);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
