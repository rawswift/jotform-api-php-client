<?php

namespace JotForm\Resource;

/**
 * Form resources
 */
class Form
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
     * Create form
     * http://api.jotform.com/docs/#post-forms
     *
     * @param Array $formProperties
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function create($formProperties = [])
    {
        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('POST');
        $request->setEndpoint('/form');
        $request->setData($formProperties);

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Get form details
     * http://api.jotform.com/docs/#form-id
     *
     * @param String $formId
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function getForm($formId = null)
    {
        if (!isset($formId)) {
            throw new \JotForm\Exception\ClientException('Exception: Required parameter missing');
        }

        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('GET');
        $request->setEndpoint('/form/' . $formId);

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Delete a form
     * http://api.jotform.com/docs/#delete-form-id
     *
     * @param String $formId
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function deleteForm($formId = null)
    {
        if (!isset($formId)) {
            throw new \JotForm\Exception\ClientException('Exception: Required parameter missing');
        }

        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('DELETE');
        $request->setEndpoint('/form/' . $formId);

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Clone form
     * http://api.jotform.com/docs/#post-form-id-clone
     *
     * @param String $formId
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function cloneForm($formId = null)
    {
        if (!isset($formId)) {
            throw new \JotForm\Exception\ClientException('Exception: Required parameter missing');
        }

        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('POST');
        $request->setEndpoint('/form/' . $formId . '/clone');

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Get form questions
     * http://api.jotform.com/docs/#form-id-questions
     *
     * @param String $formId
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function getFormQuestions($formId = null)
    {
        if (!isset($formId)) {
            throw new \JotForm\Exception\ClientException('Exception: Required parameter missing');
        }

        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('GET');
        $request->setEndpoint('/form/' . $formId . '/questions');

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Add new question to specified form
     * http://api.jotform.com/docs/#post-form-id-questions
     *
     * @param String $formId
     * @param Array $question
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function addFormQuestion($formId = null, $question = [])
    {
        if (!isset($formId) || !isset($question)) {
            throw new \JotForm\Exception\ClientException('Exception: Required parameters missing');
        }

        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('POST');
        $request->setEndpoint('/form/' . $formId . '/questions');
        $request->setData($question);

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Get details about a question
     * http://api.jotform.com/docs/#form-id-question-id
     *
     * @param String $formId
     * @param String $questionId
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function getFormQuestionDetails($formId = null, $questionId = null)
    {
        if (!isset($formId) || !isset($questionId)) {
            throw new \JotForm\Exception\ClientException('Exception: Required parameters missing');
        }

        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('GET');
        $request->setEndpoint('/form/' . $formId . '/question/' . $questionId);

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Update a single question properties
     * http://api.jotform.com/docs/#post-form-id-question-id
     *
     * @param String $formId
     * @param String $questionId
     * @param Array $question
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function updateFormQuestion($formId = null, $questionId = null, $question = [])
    {
        if (!isset($formId) || !isset($questionId) || !isset($question)) {
            throw new \JotForm\Exception\ClientException('Exception: Required parameters missing');
        }

        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('POST');
        $request->setEndpoint('/form/' . $formId . '/question/' . $questionId);
        $request->setData($question);

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Delete form question
     * http://api.jotform.com/docs/#delete-form-id-question-id
     *
     * @param String $formId
     * @param String $questionId
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function deleteFormQuestion($formId = null, $questionId = null)
    {
        if (!isset($formId) || !isset($questionId)) {
            throw new \JotForm\Exception\ClientException('Exception: Required parameters missing');
        }

        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('DELETE');
        $request->setEndpoint('/form/' . $formId . '/question/' . $questionId);

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Get form properties
     * http://api.jotform.com/docs/#form-id-properties
     *
     * @param String $formId
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function getFormProperties($formId = null)
    {
        if (!isset($formId)) {
            throw new \JotForm\Exception\ClientException('Exception: Required parameter missing');
        }

        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('GET');
        $request->setEndpoint('/form/' . $formId . '/properties');

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Add/edit properties of a specific form
     * http://api.jotform.com/docs/#post-form-id-properties
     *
     * @param String $formId
     * @param Array $properties
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function updateFormProperties($formId = null, $properties = [])
    {
        if (!isset($formId) || !isset($properties)) {
            throw new \JotForm\Exception\ClientException('Exception: Required parameters missing');
        }

        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('POST');
        $request->setEndpoint('/form/' . $formId . '/properties');
        $request->setData($properties);

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Get a form property
     * http://api.jotform.com/docs/#form-id-properties-key
     *
     * @param String $formId
     * @param String $key
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function getFormProperty($formId = null, $key = null)
    {
        if (!isset($formId) || !isset($key)) {
            throw new \JotForm\Exception\ClientException('Exception: Required parameters missing');
        }

        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('GET');
        $request->setEndpoint('/form/' . $formId . '/properties/' . $key);

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Get form reports
     * http://api.jotform.com/docs/#form-id-reports
     *
     * @param String $formId
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function getFormReports($formId = null)
    {
        if (!isset($formId)) {
            throw new \JotForm\Exception\ClientException('Exception: Required parameter missing');
        }

        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('GET');
        $request->setEndpoint('/form/' . $formId . '/reports');

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Create report
     * http://api.jotform.com/docs/#post-form-id-reports
     *
     * @param String $formId
     * @param Array $reports
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function createFormReport($formId = null, $reports = [])
    {
        if (!isset($formId) || !isset($reports)) {
            throw new \JotForm\Exception\ClientException('Exception: Required parameters missing');
        }

        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('POST');
        $request->setEndpoint('/form/' . $formId . '/reports');
        $request->setData($reports);

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Get form uploads
     * http://api.jotform.com/docs/#form-id-files
     *
     * @param String $formId
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function getFormUploads($formId = null)
    {
        if (!isset($formId)) {
            throw new \JotForm\Exception\ClientException('Exception: Required parameter missing');
        }

        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('GET');
        $request->setEndpoint('/form/' . $formId . '/files');

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Get form webhooks
     * http://api.jotform.com/docs/#form-id-webhooks
     *
     * @param String $formId
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function getFormWebhooks($formId = null)
    {
        if (!isset($formId)) {
            throw new \JotForm\Exception\ClientException('Exception: Required parameter missing');
        }

        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('GET');
        $request->setEndpoint('/form/' . $formId . '/webhooks');

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Create new webhook
     * http://api.jotform.com/docs/#post-form-id-webhooks
     *
     * @param String $formId
     * @param Array $webhook
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function createFormWebhook($formId = null, $webhook = [])
    {
        if (!isset($formId) || !isset($webhook)) {
            throw new \JotForm\Exception\ClientException('Exception: Required parameters missing');
        }

        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('POST');
        $request->setEndpoint('/form/' . $formId . '/webhooks');
        $request->setData($webhook);

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Delete a webhook of a specific form
     * http://api.jotform.com/docs/#delete-form-id-webhooks
     *
     * @param String $formId
     * @param String $webhookId
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function deleteFormWebhook($formId = null, $webhookId = null)
    {
        if (!isset($formId) || !isset($webhookId)) {
            throw new \JotForm\Exception\ClientException('Exception: Required parameters missing');
        }

        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('DELETE');
        $request->setEndpoint('/form/' . $formId . '/webhooks/' . $webhookId);

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Get form submissions
     * http://api.jotform.com/docs/#form-id-submissions
     *
     * @param String $formId
     * @param Array $options
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function getFormSubmissions($formId = null, $options = [])
    {
        if (!isset($formId)) {
            throw new \JotForm\Exception\ClientException('Exception: Required parameter missing');
        }

        $data = [];
        foreach ($options as $k => $v) {
            $data[$k] = $v;
        }

        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('GET');
        $request->setEndpoint('/form/' . $formId . '/submissions');
        $request->setData($data);

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Add a submission to a form
     * http://api.jotform.com/docs/#post-form-id-submissions
     *
     * @param String $formId
     * @param Array $submission
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function addFormSubmission($formId = null, $submission = [])
    {
        if (!isset($formId) || !isset($submission)) {
            throw new \JotForm\Exception\ClientException('Exception: Required parameters missing');
        }

        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('POST');
        $request->setEndpoint('/form/' . $formId . '/submissions');
        $request->setData($submission);

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }
}
