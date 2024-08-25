<?php

namespace App\Services;

use GuzzleHttp\Client;

class WhoisService
{
    /**
     * The Guzzle HTTP client instance.
     *
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * The API key for WhoisXMLAPI.
     *
     * @var string
     */
    protected $apiKey;

    /**
     * The desired output format for the API response.
     *
     * @var string
     */
    protected $outputFormat;

    /**
     * The base URL for the WhoisXMLAPI service.
     *
     * @var string
     */
    protected $url;

    /**
     * Create a new WhoisService instance.
     *
     * @param \GuzzleHttp\Client $client
     * @return void
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->apiKey = config('whois.api_key');
        $this->outputFormat = 'json';
        $this->url = config('whois.url');
    }

    /**
     * Get WHOIS data for a given domain name.
     *
     * @param string $domainName
     * @return array|null
     */
    public function getWhoisData(string $domainName): ?array
    {
        $response = $this->client->get($this->url, [
            'query' => [
                'apiKey' => $this->apiKey,
                'outputFormat' => $this->outputFormat,
                'domainName' => $domainName,
            ],
        ]);

        // Get the response body content
        $body = $response->getBody();
        $content = $body->getContents();

        return json_decode($content, true);
    }
}
