<?php

namespace JotForm\Resource;

/**
 * User resources
 */
class User
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
     * Authenticate/check if credentials is valid
     * http://api.jotform.com/docs/#user
     *
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function authenticate()
    {
        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('GET');
        $request->setEndpoint('/user');

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Get user information
     * http://api.jotform.com/docs/#user
     *
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function getUser()
    {
        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('GET');
        $request->setEndpoint('/user');

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Get monthly user usage
     * http://api.jotform.com/docs/#user-usage
     *
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function getUserUsage()
    {
        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('GET');
        $request->setEndpoint('/user/usage');

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Get user submissions
     * http://api.jotform.com/docs/#user-submissions
     *
     * @param Array $options
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function getUserSubmissions($options = [])
    {
        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('GET');
        $request->setEndpoint('/user/submissions');
        $request->setQueryOptions($options);

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Get sub-user account list
     * http://api.jotform.com/docs/#user-subusers
     *
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function getUserSubUsers()
    {
        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('GET');
        $request->setEndpoint('/user/subusers');

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Get user folders
     * http://api.jotform.com/docs/#user-folders
     *
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function getUserFolders()
    {
        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('GET');
        $request->setEndpoint('/user/folders');

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Get user reports
     * http://api.jotform.com/docs/#user-reports
     *
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function getUserReports()
    {
        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('GET');
        $request->setEndpoint('/user/reports');

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Register user
     * http://api.jotform.com/docs/#user-register
     *
     * @param Array $data
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function register($data = [])
    {
        if (!isset($data['username']) || !isset($data['password']) || !isset($data['email'])) {
            throw new \JotForm\Exception\ClientException('Exception: Required parameters missing');
        }

        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('POST');
        $request->setEndpoint('/user/register');
        $request->setData($data);

        try {
            $response = $this->client->executeRequest($request, false);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Login user using username/password credentials
     * http://api.jotform.com/docs/#user-login
     *
     * @param String $username
     * @param String $password
     * @param Array $options
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function login($username, $password, $options = [])
    {
        if (!isset($username) || !isset($password)) {
            throw new \JotForm\Exception\ClientException('Exception: Required parameters missing');
        }

        $data = [
            'username' => trim($username),
            'password' => trim($password)
        ];

        // Additional options
        foreach ($options as $k => $v) {
            $data[$k] = $v;
        }

        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('POST');
        $request->setEndpoint('/user/login');
        $request->setData($data);

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Logout user
     * http://api.jotform.com/docs/#user-logout
     *
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function logout()
    {
        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('GET');
        $request->setEndpoint('/v1/user/logout');

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Get user settings
     * http://api.jotform.com/docs/#user-settings
     *
     * @param Array $options
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function getUserSettings()
    {
        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('GET');
        $request->setEndpoint('/user/settings');

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Update user settings
     * http://api.jotform.com/docs/#post-user-settings
     *
     * @param Array $options
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function updateUserSettings($options = [])
    {
        $data = [];
        foreach ($options as $k => $v) {
            $data[$k] = $v;
        }

        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('POST');
        $request->setEndpoint('/user/settings');
        $request->setData($data);

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Get user history
     * http://api.jotform.com/docs/#user-history
     *
     * @param Array $options
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function getUserHistory($options = [])
    {
        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('GET');
        $request->setEndpoint('/user/history');
        $request->setQueryOptions($options);

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Get user forms
     * http://api.jotform.com/docs/#user-forms
     *
     * @param Array $options
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function getUserForms($options = [])
    {
        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('GET');
        $request->setEndpoint('/user/forms');
        $request->setQueryOptions($options);

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }

    /**
     * Create a new form
     * http://api.jotform.com/docs/#post-user-forms
     *
     * @param Array $formProperties
     * @return Object
     * @throws Exception \JotForm\Exception\ClientException
     */
    public function createUserForm($formProperties = [])
    {
        // Construct request
        $request = new \JotForm\Request();
        $request->setMethod('POST');
        $request->setEndpoint('/user/forms');
        $request->setData($formProperties);

        try {
            $response = $this->client->executeRequest($request);
            return $response;
        } catch (\Exception $e) {
            throw new \JotForm\Exception\ClientException($e->getMessage());
        }
    }
}
