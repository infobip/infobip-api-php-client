<?php
namespace infobip\api\model\omni;

/**
 * This is a generated class and is not intended for modification!
 */
class To implements \JsonSerializable
{
    private $phoneNumber;
    private $emailAddress;
    private $pushRegistrationId;
    private $facebookUserKey;
    private $lineUserKey;


    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    public function setPushRegistrationId($pushRegistrationId)
    {
        $this->pushRegistrationId = $pushRegistrationId;
    }
    public function getPushRegistrationId()
    {
        return $this->pushRegistrationId;
    }

    public function setFacebookUserKey($facebookUserKey)
    {
        $this->facebookUserKey = $facebookUserKey;
    }
    public function getFacebookUserKey()
    {
        return $this->facebookUserKey;
    }

    public function setLineUserKey($lineUserKey)
    {
        $this->lineUserKey = $lineUserKey;
    }
    public function getLineUserKey()
    {
        return $this->lineUserKey;
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