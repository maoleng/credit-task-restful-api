<?php

namespace Libraries\Client;

class Client
{
    protected $url;
    protected $curl;
    protected $headers = [];
    protected $body = '';
    protected $response;

    public function __construct()
    {
        $this->curl = curl_init();

    }

    private function setMethod($method): void
    {
        curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, $method);
    }

    public function setUrl($url): void
    {
        curl_setopt($this->curl, CURLOPT_URL, $url);
    }

    public function setHeader($headers): void
    {
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, $headers);
    }

    public function setBody($body): void
    {
        curl_setopt($this->url, CURLOPT_POSTFIELDS, $body);
    }

    public function request($method, $url, $optionals = [])
    {
        $this->setMethod($method);
        $this->setUrl($url);
        if (! empty($optionals['headers'])) {
            $this->setHeader($optionals['headers']);
        }
        if (! empty($optionals['body'])) {
            $this->setBody($optionals['body']);
        }

        return $this->sendAndGetContent();
    }

    public function get($url, $optionals = [])
    {
       return $this->request('GET', $url, $optionals);
    }

    private function sendAndGetContent()
    {
        ob_start();
        curl_exec($this->curl);
        curl_close($this->curl);

        return ob_get_clean();

        curl_setopt($curl, CURLOPT_POSTFIELDS, $this->body);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    }

}
