<?php
/**
 * Add a submission to a form
 *
 * http://api.jotform.com/docs/#post-form-id-submissions
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$form = new JotForm\Resource\Form($client);

try {
    $formId = 'form-ID-here';
    $submission = [
        'submission' => [
            // '1' is probably a header
            '2' => 'Lorem ipsum',
            '3' => 'foobar@mywebsite.com',
            '4' => [
                'Foo',
                'Bar'
            ]
        ]
    ];
    $response = $form->addFormSubmission($formId, $submission);
    print_r($response);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
