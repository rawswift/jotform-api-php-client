<?php
/**
 * Get details about a question
 *
 * http://api.jotform.com/docs/#form-id-question-id
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$form = new JotForm\Resource\Form($client);

try {
    $formId = 'form-ID-here';
    $questionId = '1';
    $questionDetails = $form->getFormQuestionDetails($formId, $questionId);
    print_r($questionDetails);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
