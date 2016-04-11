<?php

namespace JotForm\Resource;

/**
 * System resources
 */
class System
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
     * Get plan details
     * http://api.jotform.com/docs/#system-plan-planName
     *
     * @param String $planName
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function getPlanDetails($planName = null)
    {
        if (!isset($planName)) {
            throw new \JotForm\Exception\ClientException('Exception: Required parameter missing');
        }

        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('GET');
        $request->setEndpoint('/system/plan/' . $planName);

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }
}
