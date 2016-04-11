<?php
/**
 * Create a new form
 *
 * http://api.jotform.com/docs/#post-user-forms
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$user = new JotForm\Resource\User($client);

try {
    $myForm = [
        'questions' => [
            [
                'type' => 'control_head',
                'text' => 'Form Title',
                'order' => 1,
                'name' => 'Header'
            ],
            [
                'type' => 'control_textbox',
                'text' => 'Text Box Title',
                'order' => 2,
                'name' => 'TextBox',
                'validation' => 'None',
                'required' => 'No',
                'readonly' => 'No',
                'size' => 30,
                'labelAlign' => 'Auto',
                'hint' => 'Hint: Lorem Ipsum'
            ],
        ],
        'properties' => [
            'title' => 'My Form',
            'height' => 600
        ],
        'emails' => [
            'type' => 'notification',
            'name' => 'notification',
            'from' => 'default',
            'to' => 'noreply@mywebsite.com',
            'subject' => 'New Submission',
            'html' => 'false'
        ]
    ];
    $response = $user->createUserForm($myForm);
    print_r($response);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
