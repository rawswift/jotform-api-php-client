<?php

namespace JotForm\Resource;

/**
 * Submission resources
 */
class Submission
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
     * Get submission data
     * http://api.jotform.com/docs/#submission-id
     *
     * @param String $submissionId
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function getSubmissionData($submissionId = null)
    {
        if (!isset($submissionId)) {
            throw new \JotForm\Exception\ClientException('Exception: Required parameter missing');
        }

        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('GET');
        $request->setEndpoint('/submission/' . $submissionId);

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Update submission data
     * http://api.jotform.com/docs/#post-submission-id
     *
     * @param String $submissionId
     * @param Array $submission
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function updateSubmissionData($submissionId = null, $submission = [])
    {
        if (!isset($submissionId) || !isset($submission)) {
            throw new \JotForm\Exception\ClientException('Exception: Required parameters missing');
        }

        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('POST');
        $request->setEndpoint('/submission/' . $submissionId);
        $request->setData($submission);

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Delete submission data
     * http://api.jotform.com/docs/#delete-submission-id
     *
     * @param String $submissionId
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function deleteSubmissionData($submissionId = null)
    {
        if (!isset($submissionId)) {
            throw new \JotForm\Exception\ClientException('Exception: Required parameter missing');
        }

        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('DELETE');
        $request->setEndpoint('/submission/' . $submissionId);

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }
}
