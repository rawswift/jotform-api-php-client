<?php

namespace JotForm\Resource;

/**
 * Folder resources
 */
class Folder
{
    /**
     * @var \JotForm\JotFormClient $client
     */
    private $client;

    /**
     * Constructor
     *
     * @param \JotForm\JotFormClient $client
     */
    public function __construct(\JotForm\JotFormClient $client)
    {
        $this->client = $client;
    }

    /**
     * Get folder details
     * http://api.jotform.com/docs/#folder-id
     *
     * @param String $folderId
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function getFolderDetails($folderId = null)
    {
        if (!isset($folderId)) {
            throw new \JotForm\Exception\ClientException('Exception: Required parameter missing');
        }

        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('GET');
        $request->setEndpoint('/folder/' . $folderId);

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }
}
