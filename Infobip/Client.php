<?php

namespace Infobip;
use GuzzleHttp\Psr7\Request;

final class Client
{
    public function __construct(private Configuration $configuration)
    {
    }

    public function send(string $method, string $path, $body = null): Request
    {
        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ];
        $headers[$this->configuration->getApiKeyHeader()] = $this->configuration->getApiKey();
        return new Request($method, $this->configuration->getHost().$path, $headers, $body);
    }

    public function post(string $path, $body): Request
    {
        return $this->send('POST', $path, $body);
    }
    public function put(string $path, $body): Request
    {
        return $this->send('PUT', $path, $body);
    }
    public function get(string $path): Request
    {
        return $this->send('PUT', $path);
    }

    // public function sendRequest()
    // {
    //     $allData = [
    //          'smsAdvancedTextualRequest' => $smsAdvancedTextualRequest,
    //     ];
    
    //     $validationConstraints = [];
    
    //     $this
    //         ->addParamConstraints(
    //             [
    //                 'smsAdvancedTextualRequest' => [
    //                     new Assert\NotNull(),
    //                 ],
    //             ],
    //             $validationConstraints
    //         );
    
    //     $this->validateParams($allData, $validationConstraints);
    
    //     $resourcePath = '/sms/2/text/advanced';
    //     $formParams = [];
    //     $queryParams = [];
    //     $headerParams = [];
    //     $httpBody = '';
    
    //     $headers = [
    //         'Accept' => 'application/json',
    //         'Content-Type' => 'application/json',
    //     ];
    
    //     // for model (json/xml)
    //     if (isset($smsAdvancedTextualRequest)) {
    //         $httpBody = ($headers['Content-Type'] === 'application/json')
    //             ? $this->objectSerializer->serialize($smsAdvancedTextualRequest)
    //             : $smsAdvancedTextualRequest;
    //     } elseif (count($formParams) > 0) {
    //         $formParams = \json_decode($this->objectSerializer->serialize($formParams), true);
    
    //         if ($headers['Content-Type'] === 'multipart/form-data') {
    //             $boundary = '----' . hash('sha256', uniqid('', true));
    //             $headers['Content-Type'] .= '; boundary=' . $boundary;
    //             $multipartContents = [];
    
    //             foreach ($formParams as $formParamName => $formParamValue) {
    //                 $formParamValueItems = (\is_array($formParamValue)) ? $formParamValue : [$formParamValue];
    
    //                 foreach ($formParamValueItems as $formParamValueItem) {
    //                     $multipartContents[] = [
    //                         'name' => $formParamName,
    //                         'contents' => $formParamValueItem
    //                     ];
    //                 }
    //             }
    
    //             // for HTTP post (form)
    //             $httpBody = new MultipartStream($multipartContents, $boundary);
    //         } elseif ($headers['Content-Type'] === 'application/json') {
    //             $httpBody = $this->objectSerializer->serialize($formParams);
    //         } else {
    //             // for HTTP post (form)
    //             $httpBody = Query::build($formParams);
    //         }
    //     }
    
    //     $apiKey = $this->config->getApiKey();
    
    //     if ($apiKey !== null) {
    //         $headers[$this->config->getApiKeyHeader()] = $apiKey;
    //     }
    
    //     $defaultHeaders = [];
    
    //     if ($this->config->getUserAgent()) {
    //         $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
    //     }
    
    //     $headers = \array_merge(
    //         $defaultHeaders,
    //         $headerParams,
    //         $headers
    //     );
    
    //     foreach ($queryParams as $key => $value) {
    //         if (\is_array($value)) {
    //             continue;
    //         }
    
    //         $queryParams[$key] = $this->objectSerializer->toString($value);
    //     }
    
    //     $query = Query::build($queryParams);
    
    //     return new Request(
    //         'POST',
    //         $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
    //         $headers,
    //         $httpBody
    //     );
    // }
}