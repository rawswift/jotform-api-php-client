<?php
/**
 * Get plan details
 *
 * http://api.jotform.com/docs/#system-plan-planName
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$system = new JotForm\Resource\System($client);

try {
    $planName = 'FREE';
    $details = $system->getPlanDetails($planName);
    print_r($details);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
