<?php
/**
 * Delete submission data
 *
 * http://api.jotform.com/docs/#delete-submission-id
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$submission = new JotForm\Resource\Submission($client);

try {
    $submissionId = 'submission-ID-here';
    $data = $submission->deleteSubmissionData($submissionId);
    print_r($data);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
