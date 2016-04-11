<?php

namespace JotForm;

/**
 * \JotForm\Request
 */
class Request
{
    /**
     * @var Array $request
     */
    private $request = [
            'method' => 'GET'
        ];

    /**
     * @var Array $data
     */
    private $data = [];

    /**
     * @var Array $queryOptions
     */
    private $queryOptions = [];

    /**
     * Constructor
     */
    public function __construct()
    {
    }

    /**
     * Set method to use for the request
     *
     * @param String $method
     */
    public function setMethod($method = 'GET')
    {
        $this->request['method'] = $method;
    }

    /**
     * Get the stored method (HTTP)
     *
     * @return Mixed Boolean or String
     */
    public function getMethod()
    {
        if (isset($this->request['method'])) {
            return $this->request['method'];
        }
        return false;
    }

    /**
     * Set endpoint path
     *
     * @param String $endpoint
     */
    public function setEndpoint($endpoint = null)
    {
        $this->request['endpoint'] = $endpoint;
    }

    /**
     * Get endpoint path
     *
     * @return String
     */
    public function getEndpoint()
    {
        return $this->request['endpoint'];   
    }

    /**
     * Set data to be attached on request (e.g. POST data)
     *
     * @param Array $data
     */
    public function setData($data = [])
    {
        if (isset($data)) {
            foreach ($data as $k => $v) {
                $this->data[$k] = $v;
            }
        }
    }

    /**
     * Get stored data (e.g. POST data)
     *
     * @return Array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Check if there is data to be attached on request (e.g. POST data)
     *
     * @return Boolean
     */
    public function hasData()
    {
        if (isset($this->data)) {
            return true;
        }
        return false;
    }

    /**
     * Set query parameter to be attached on request (e.g. ?foo=bar)
     *
     * @param Array $options
     */
    public function setQueryOptions($options)
    {
        $this->queryOptions = $options;
    }

    /**
     * Get query parameter(s)
     *
     * @return Mixed Boolean or Array
     */
    public function getQueryOptions()
    {
        if (isset($this->queryOptions)) {
            return $this->queryOptions;
        }
        return false;
    }
}
