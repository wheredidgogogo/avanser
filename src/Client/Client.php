<?php
declare(strict_types=1);

namespace Wheredidgogogo\Avanser\Client;

/**
 * Class Client
 *
 * @package Wheredidgogogo\Avanser\Client
 */
class Client
{
    /**
     * @var \GuzzleHttp\Client
     */
    private $client;

    /**
     * @var string
     */
    private $credentials;

    /**
     * Client constructor.
     */
    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => 'https://tapi-sandbox.avanser.com/v1',
        ]);
    }

    /**
     * @param $credentials
     *
     * @return $this
     */
    public function setCredentials($credentials)
    {
        $this->credentials = $credentials;

        return $this;
    }

    /**
     * @param $method
     * @param $url
     * @param $body
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function request($method, $url, $body)
    {
        $response = $this->client->request($method, $url, $this->buildParameters($method, $body));

        return $response;
    }

    /**
     * @param $method
     * @param $params
     *
     * @return array
     */
    private function buildParameters($method, $params)
    {
        $options = [
            'headers' => [
                'Authorization' => "Basic {$this->credentials}",
            ],
        ];
        if (strtoupper($method) === 'GET') {
            $options['query'] = $params;
        } else {
            $options['json'] = $params;
        }

        return $options;
    }
}
