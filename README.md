# JotForm API Client Library for PHP

## Description

A simple [JotForm API](http://api.jotform.com/docs/) library for PHP.

## Requirements

- [PHP >= 5.4](http://php.net/)
- [Guzzle 6](https://github.com/guzzle/guzzle)

## Installation

The recommended way to install jotform-api-php-client is through [Composer](https://getcomposer.org/).

    curl -sS https://getcomposer.org/installer | php

Next, run the Composer command to install jotform-api-php-client library:

    php composer.phar require rawswift/jotform-api-php-client:dev-master

After installing, you can now use the library by including Composer's autoloader inside your script:

    require 'vendor/autoload.php';

## Examples

A simple example to get user's information:

    require 'vendor/autoload.php';

    $key = 'your-api-key-from-jotform';
    $client = new JotForm\JotFormClient();
    $client->setAPIKey($key);
    $user = new JotForm\Resource\User($client);

    try {
        $info = $user->getUser();
        print_r($info);
    } catch (\JotForm\Exception\ClientException $e) {
        echo $e->getMessage() . "\n";
    }

Here's another example for creating a form:

    require 'vendor/autoload.php';

    $key = 'your-api-key-from-jotform';
    $client = new JotForm\JotFormClient();
    $client->setAPIKey($key);
    $form = new JotForm\Resource\Form($client);

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
        $response = $form->create($myForm);
        print_r($response);
    } catch (\JotForm\Exception\ClientException $e) {
        echo $e->getMessage() . "\n";
    }

## License

Licensed under the [MIT license](http://www.opensource.org/licenses/mit-license.php)
