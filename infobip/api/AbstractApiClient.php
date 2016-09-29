<?php

namespace infobip\api;

use Exception;
use JsonMapper;

class AbstractApiClient
{

    const VERSION = '1.1.3';
    private $configuration;
    private $mapper;

    public function __construct($configuration)
    {
        $this->configuration = $configuration;
        $this->mapper = new JsonMapper();
    }

    protected function executeGET($restPath, $params)
    {
        return $this->executeRequest('GET', $restPath, $params);
    }

    protected function executePOST($restPath, $params, $body)
    {
        return $this->executeRequest('POST', $restPath, $params, null, $body);
    }

    protected function executePUT($restPath, $params, $body)
    {
        return $this->executeRequest('PUT', $restPath, $params, null, $body);
    }

    protected function executeDELETE($restPath, $params)
    {
        return $this->executeRequest('DELETE', $restPath, $params);
    }

    /**
     * Like http_build_query but works for {'a': ['b', 'c']} the result is
     * a=b&a=c
     */
    private function buildQuery($array)
    {
        $result = '';
        foreach ($array as $key => $value) {
            if (!$value)
                continue;
            if ($result)
                $result .= '&';
            if (is_array($value)) {
                foreach ($value as $subValue) {
                    if ($result)
                        $result .= '&';
                    $result .= urlencode($key) . '=' . urlencode($subValue);
                }
            } else {
                $result .= urlencode($key) . '=' . urlencode($value);
            }
        }
        return $result;
    }

    private function executeRequest(
        $httpMethod, $url, $queryParams = null, $requestHeaders = null, $body = null)
    {
        if ($queryParams == null)
            $queryParams = array();
        if (!is_array($queryParams)){
            $queryParams = $this->createFieldArray($queryParams);
        }
        if ($requestHeaders == null)
            $requestHeaders = array();

        $sendHeaders = array(
            'Content-Type: ' . "application/json"
        );
        foreach ($requestHeaders as $key => $value) {
            $sendHeaders[] = $key . ': ' . $value;
        }

        if (sizeof($queryParams) > 0) {
            $url .= '?' . $this->buildQuery($queryParams);
        }

        $opts = array(
            CURLOPT_FRESH_CONNECT => 1,
            CURLOPT_CONNECTTIMEOUT => 60,
            CURLOPT_TIMEOUT => 120,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS => 3,
            CURLOPT_USERAGENT => 'Php-Client-Library-' . self::VERSION,
            CURLOPT_CUSTOMREQUEST => $httpMethod,
            CURLOPT_URL => $url,
            CURLOPT_HTTPHEADER => $sendHeaders
        );

        if ($this->configuration) {
            $opts[CURLOPT_HTTPHEADER][] = 'Authorization: ' . $this->configuration->getAuthenticationHeader();
        }

        if ($body) {
            $opts[CURLOPT_POSTFIELDS] = json_encode($body);
        }

        $curlSession = curl_init();
        curl_setopt_array($curlSession, $opts);

        $result = curl_exec($curlSession);

        $code = curl_getinfo($curlSession, CURLINFO_HTTP_CODE);

        $curlError = curl_errno($curlSession);
        if ($curlError !== 0) {
            throw new \RuntimeException(curl_error($curlSession), $curlError);
        }

        $isSuccess = 200 <= $code && $code < 300;

        curl_close($curlSession);

        if (!$isSuccess) {
            throw new Exception($result, $code);
        }
        return $result;
    }

    protected function getRestUrl($restPath = null, $vars = null)
    {
        $rurl = $this->configuration->baseUrl;
        if ($restPath && $restPath !== '') {
            $rurl .= substr($restPath, 0, 1) === '/' ?
                substr($restPath, 1) : $restPath;
        }

        return $this->applyTemplate($rurl, $vars);
    }

    // escape string
    protected function strEscape($str)
    {
        $search = array("\\", "\0", "\n", "\r", "\x1a", "'", '"');
        $replace = array("\\\\", "\\0", "\\n", "\\r", "\Z", "\'", '\"');
        return str_replace($search, $replace, $str);
    }

    // apply bind variables to template
    protected function applyTemplate($str, $params = NULL, $escapeFields = FALSE)
    {
        if (!$params)
            return ($str);

        $rez = $str;

        foreach ($params as $nam => $val) {
            if ($val !== NULL) {
                $valn = $vals = $escapeFields ? $this->strEscape($val) : $val;
            } else {
                $vals = '';
                $valn = 'null';
            }

            $rez = str_replace("'{" . $nam . "}'", "'" . urlencode($vals) . "'", $rez);
            $rez = str_replace("{" . $nam . "}", urlencode($valn), $rez);
        }
        return ($rez);
    }

    public function map($content, $className){
        return $this->mapper->map($content, new $className());
    }

    /**
     * @param $queryParams
     * @return array
     */
    private function createFieldArray($queryParams)
    {
        $result = array();
        $reflectionClass = new \ReflectionClass($queryParams);
        $reflectionProperties = $reflectionClass->getProperties();
        foreach ($reflectionProperties as $property) {
            $property->setAccessible(true);
            $value = $property->getValue($queryParams);
            $result[$property->getName()] = $value;
        }
        return $result;
    }

}
