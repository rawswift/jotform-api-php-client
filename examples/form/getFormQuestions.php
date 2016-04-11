<?php
/**
 * Get form questions
 *
 * http://api.jotform.com/docs/#form-id-questions
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$form = new JotForm\Resource\Form($client);

try {
    $formId = 'form-ID-here';
    $questions = $form->getFormQuestions($formId);
    print_r($questions);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
