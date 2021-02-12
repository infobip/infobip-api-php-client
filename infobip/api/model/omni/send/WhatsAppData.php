<?php

namespace infobip\api\model\omni\send;

/**
 * This is a generated class and is not intended for modification!
 */
class WhatsAppData implements \JsonSerializable
{
    private $templateName;
    private $templateNamespace;
    private $templateData;
    private $language;


    public function setTemplateName($templateName)
    {
        $this->templateName = $templateName;
    }

    public function getTemplateName()
    {
        return $this->templateName;
    }

    public function setTemplateNamespace($templateNamespace)
    {
        $this->templateNamespace = $templateNamespace;
    }

    public function getTemplateNamespace()
    {
        return $this->templateNamespace;
    }

    public function setTemplateData($templateData)
    {
        $this->templateData = $templateData;
    }

    public function getTemplateData()
    {
        return $this->templateData;
    }

    public function setLanguage($language)
    {
        $this->language = $language;
    }

    public function getLanguage()
    {
        return $this->language;
    }


    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     *
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     */
    function jsonSerialize()
    {
        return get_object_vars($this);
    }
}