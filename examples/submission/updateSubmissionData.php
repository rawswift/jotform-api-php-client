<?php
/**
 * Update submission data
 *
 * http://api.jotform.com/docs/#post-submission-id
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$submission = new JotForm\Resource\Submission($client);

try {
    $submissionId = 'submission-ID-here';
    $submissionUpdate = [
        'submission' => [
            '2' => 'Update submission entry',
            '3' => 'foobar@mywebsite.com',
            '4' => [
                'Foo-update',
                'Bar-update'
            ]
        ]
    ];
    $response = $submission->updateSubmissionData($submissionId, $submissionUpdate);
    print_r($response);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
