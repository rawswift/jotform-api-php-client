<?php

namespace JotForm\Resource;

/**
 * Report resources
 */
class Report
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
     * Get report details
     * http://api.jotform.com/docs/#report-id
     *
     * @param String $reportId
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function getReportDetails($reportId = null)
    {
        if (!isset($reportId)) {
            throw new \JotForm\Exception\ClientException('Exception: Required parameter missing');
        }

        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('GET');
        $request->setEndpoint('/report/' . $reportId);

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Delete report
     * http://api.jotform.com/docs/#delete-report-id
     *
     * @param String $reportId
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function deleteReport($reportId = null)
    {
        if (!isset($reportId)) {
            throw new \JotForm\Exception\ClientException('Exception: Required parameter missing');
        }

        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('DELETE');
        $request->setEndpoint('/report/' . $reportId);

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }
}
