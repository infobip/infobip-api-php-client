<?php
namespace infobip\api\model\nc\query;

/**
 * This is a generated class and is not intended for modification!
 */
class NumberContextResponseDetails implements \JsonSerializable
{
    private $to;
    private $mccMnc;
    private $imsi;
    /**
     * @var \infobip\api\model\nc\Network
     */
    private $originalNetwork;
    private $ported;
    /**
     * @var \infobip\api\model\nc\Network
     */
    private $portedNetwork;
    private $roaming;
    /**
     * @var \infobip\api\model\nc\Network
     */
    private $roamingNetwork;
    private $servingMSC;
    /**
     * @var \infobip\api\model\Status
     */
    private $status;
    /**
     * @var \infobip\api\model\Error
     */
    private $error;


    public function setTo($to)
    {
        $this->to = $to;
    }
    public function getTo()
    {
        return $this->to;
    }

    public function setMccMnc($mccMnc)
    {
        $this->mccMnc = $mccMnc;
    }
    public function getMccMnc()
    {
        return $this->mccMnc;
    }

    public function setImsi($imsi)
    {
        $this->imsi = $imsi;
    }
    public function getImsi()
    {
        return $this->imsi;
    }

    /**
     * @param \infobip\api\model\nc\Network $originalNetwork
     */
    public function setOriginalNetwork($originalNetwork)
    {
        $this->originalNetwork = $originalNetwork;
    }

    /**
     * @return \infobip\api\model\nc\Network
     */
    public function getOriginalNetwork()
    {
        return $this->originalNetwork;
    }

    public function setPorted($ported)
    {
        $this->ported = $ported;
    }
    public function isPorted()
    {
        return $this->ported;
    }

    /**
     * @param \infobip\api\model\nc\Network $portedNetwork
     */
    public function setPortedNetwork($portedNetwork)
    {
        $this->portedNetwork = $portedNetwork;
    }

    /**
     * @return \infobip\api\model\nc\Network
     */
    public function getPortedNetwork()
    {
        return $this->portedNetwork;
    }

    public function setRoaming($roaming)
    {
        $this->roaming = $roaming;
    }
    public function isRoaming()
    {
        return $this->roaming;
    }

    /**
     * @param \infobip\api\model\nc\Network $roamingNetwork
     */
    public function setRoamingNetwork($roamingNetwork)
    {
        $this->roamingNetwork = $roamingNetwork;
    }

    /**
     * @return \infobip\api\model\nc\Network
     */
    public function getRoamingNetwork()
    {
        return $this->roamingNetwork;
    }

    public function setServingMSC($servingMSC)
    {
        $this->servingMSC = $servingMSC;
    }
    public function getServingMSC()
    {
        return $this->servingMSC;
    }

    /**
     * @param \infobip\api\model\Status $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return \infobip\api\model\Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param \infobip\api\model\Error $error
     */
    public function setError($error)
    {
        $this->error = $error;
    }

    /**
     * @return \infobip\api\model\Error
     */
    public function getError()
    {
        return $this->error;
    }


  /**
   * (PHP 5 &gt;= 5.4.0)<br/>
   * Specify data which should be serialized to JSON
   * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
   * @return mixed data which can be serialized by <b>json_encode</b>,
   * which is a value of any type other than a resource.
   */
  function jsonSerialize()
  {
      return get_object_vars($this);
  }
}