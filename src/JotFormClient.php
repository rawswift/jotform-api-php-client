<?php

namespace JotForm;

/**
 * JotForm API client PHP library
 */
class JotFormClient
{
    /**
     * JotForm API base URL
     */
    const API_BASE_PATH = 'http://api.jotform.com';

    /**
     * @var String $key
     */
    private $key = null;

    /**
     * @var Array $credentials
     */
    private $credentials = [];

    /**
     * @var \GuzzleHttp\Client $httpClient
     */
    private $httpClient;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->httpClient = new \GuzzleHttp\Client([
                'base_uri' => self::API_BASE_PATH,
            ]);
    }

    /**
     * Set JotForm API key
     *
     * @param String $key
     */
    public function setAPIKey($key)
    {
        $this->key = trim($key);
        $this->credentials = [
                    'query' => [
                        'apiKey' => $this->key
                    ]
                ];
    }

    /**
     * Get stored API key
     */
    public function getAPIKey()
    {
        if (isset($this->key) && $this->key !== null) {
            return $this->key;
        }
        return false;
    }

    /**
     * Make the API request
     *
     * @param \JotForm\Request $request
     * @param Boolean $useQueryAuthCredential
     * @return Object
     * @throws Exception
     */
    public function executeRequest(\JotForm\Request $request, $useQueryAuthCredential = true)
    {
        $body = [];

        switch (strtolower($request->getMethod())) {
            case 'post':
            case 'put':
                $body['form_params'] = $request->getData();
                break;
            default:
                break;
        }

        if ($useQueryAuthCredential) {
            $body = array_merge(
                        $this->credentials,
                        $body
                    );
        }

        // Check/get additional query options/parameters
        if ($options = $request->getQueryOptions()) {
            foreach ($options as $k => $v) {
                $body['query'][$k] = $v;
            }
        }

        try {
            $response = $this->httpClient->request(
                            $request->getMethod(),
                            $request->getEndpoint(),
                            $body
                        );
            $body = $response->getBody();
            $object = json_decode($body);
            return $object;
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            throw new \Exception('GuzzleHttp\Exception\ClientException: ' . $e->getMessage());
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            throw new \Exception('GuzzleHttp\Exception\RequestException: ' . $e->getMessage());
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            throw new \Exception('GuzzleHttp\Exception\ConnectException: ' . $e->getMessage());
        } catch (\GuzzleHttp\Exception\ServerException $e) {
            throw new \Exception('GuzzleHttp\Exception\ServerException: ' . $e->getMessage());
        } catch (\Exception $e) {
            throw new \Exception('Exception: ' . $e->getMessage());
        }
    }
}
