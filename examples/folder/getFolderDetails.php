<?php
/**
 * Get folder details
 *
 * http://api.jotform.com/docs/#folder-id
 */

require '../../vendor/autoload.php';

$key = 'your-api-key-from-jotform';

$client = new JotForm\JotFormClient();
$client->setAPIKey($key);

$folder = new JotForm\Resource\Folder($client);

try {
    $folderId = 'folder-ID-here';
    $details = $folder->getFolderDetails($folderId);
    print_r($details);
} catch (\JotForm\Exception\ClientException $e) {
    echo $e->getMessage() . "\n";
}
