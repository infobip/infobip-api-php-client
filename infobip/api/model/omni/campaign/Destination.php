<?php
namespace infobip\api\model\omni\campaign;

/**
 * This is a generated class and is not intended for modification!
 */
class Destination implements \JsonSerializable
{
    private $firstName;
    private $lastName;
    private $middleName;
    private $gsm;
    private $landline;
    private $email;
    private $address;
    private $city;
    private $country;
    private $gender;
    private $birthday;


    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }
    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }
    public function getLastName()
    {
        return $this->lastName;
    }

    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
    }
    public function getMiddleName()
    {
        return $this->middleName;
    }

    public function setGsm($gsm)
    {
        $this->gsm = $gsm;
    }
    public function getGsm()
    {
        return $this->gsm;
    }

    public function setLandline($landline)
    {
        $this->landline = $landline;
    }
    public function getLandline()
    {
        return $this->landline;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }
    public function getAddress()
    {
        return $this->address;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }
    public function getCity()
    {
        return $this->city;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }
    public function getCountry()
    {
        return $this->country;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }
    public function getGender()
    {
        return $this->gender;
    }

    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }
    public function getBirthday()
    {
        return $this->birthday;
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