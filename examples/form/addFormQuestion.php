<?php
/**
 * Add new question to specified form
 *
 * http://api.jotform.com/docs/#post-form-id-questions
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$form = new JotForm\Resource\Form($client);

try {
    $formId = 'form-ID-here';
    $newQuestion = [
        'question' => [
                'type' => 'control_textbox',
                'text' => 'Sample Text Box Title',
                'order' => 3,
                'name' => 'SampleTextBox',
                'validation' => 'None',
                'required' => 'No',
                'readonly' => 'No',
                'size' => 20,
                'labelAlign' => 'Auto',
                'hint' => 'Hint: Sample text box hint'
        ],
    ];
    $response = $form->addFormQuestion($formId, $newQuestion);
    print_r($response);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
