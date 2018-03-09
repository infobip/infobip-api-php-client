<?php
namespace infobip\api\model\sms\mo\reports;

/**
 * This is a generated class and is not intended for modification!
 */
class MOReportResponse implements \JsonSerializable
{
    private $messageCount;
    private $pendingMessageCount;
    /**
     * @var \infobip\api\model\sms\mo\reports\MOReport[]
     */
    private $results;
    private $messageCount;
    private $pendingMessageCount;


    public function setMessageCount($messageCount)
    {
        $this->messageCount = $messageCount;
    }
    public function getMessageCount()
    {
        return $this->messageCount;
    }

    public function setPendingMessageCount($pendingMessageCount)
    {
        $this->pendingMessageCount = $pendingMessageCount;
    }
    public function getPendingMessageCount()
    {
        return $this->pendingMessageCount;
    }

    /**
     * @param \infobip\api\model\sms\mo\reports\MOReport[] $results
     */
    public function setResults($results)
    {
        $this->results = $results;
    }

    /**
     * @return \infobip\api\model\sms\mo\reports\MOReport[]
     */
    public function getResults()
    {
        return $this->results;
    }

    public function setMessageCount($messageCount)
    {
        $this->messageCount = $messageCount;
    }
    public function getMessageCount()
    {
        return $this->messageCount;
    }

    public function setPendingMessageCount($pendingMessageCount)
    {
        $this->pendingMessageCount = $pendingMessageCount;
    }
    public function getPendingMessageCount()
    {
        return $this->pendingMessageCount;
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