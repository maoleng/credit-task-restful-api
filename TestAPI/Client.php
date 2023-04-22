<?php

class Client
{

    protected CurlHandle $curl;
    protected string $method;
    protected string $url;
    protected array $headers;
    protected string $body;
    protected mixed $response;

    public function __construct()
    {
        $this->curl = curl_init();
    }

    private function setMethod($method): void
    {
        $this->method = $method;
        curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, $method);
    }

    public function setUrl($url): void
    {
        $this->url = $url;
        curl_setopt($this->curl, CURLOPT_URL, $url);
    }

    public function setHeader($headers): void
    {
        $this->headers = $headers;
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, $headers);
    }

    public function setBody($body): void
    {
        $this->body = $body;
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, $body);
    }

    public function request($method, $url, $optionals = []): string
    {
        $this->setMethod($method);
        $this->setUrl($url);
        if (! empty($optionals['headers'])) {
            $this->setHeader($optionals['headers']);
        }
        if (! empty($optionals['json'])) {
            $this->setBody(json_encode($optionals['json']));
        }
        if (! empty($optionals['form'])) {
            $this->setBody($optionals['form']);
        }

        return $this->sendAndGetContent();
    }

    public function get($url, $optionals = []): static
    {
        $this->response = $this->request('GET', $url, $optionals);

        return $this;
    }

    public function post($url, $optionals = []): static
    {
        $this->response = $this->request('POST', $url, $optionals);

        return $this;
    }

    public function put($url, $optionals = []): static
    {
        $this->response = $this->request('PUT', $url, $optionals);

        return $this;
    }

    public function delete($url, $optionals = []): static
    {
        $this->response = $this->request('DELETE', $url, $optionals);

        return $this;
    }

    public function toArray(): ?array
    {
        return json_decode($this->response, true);
    }

    private function sendAndGetContent(): string
    {
        ob_start();
        curl_exec($this->curl);
        curl_close($this->curl);

        return ob_get_clean();
    }

}
