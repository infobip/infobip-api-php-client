<?php
namespace infobip\api\model\sms\mo\logs;

/**
 * This is a generated class and is not intended for modification!
 * TODO: Point to Github contribution instructions
 */
class GetReceivedSmsLogsExecuteContext
{
    private $to;
    /**
     * @var \DateTime
     */
    private $receivedSince;
    /**
     * @var \DateTime
     */
    private $receivedUntil;
    private $limit;
    private $keyword;


    public function setTo($to)
    {
        $this->to = $to;
    }

    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param \DateTime $receivedSince
     */
    public function setReceivedSince($receivedSince)
    {
        $this->receivedSince = $receivedSince;
    }

    /**
     * @return \DateTime
     */
    public function getReceivedSince()
    {
        return $this->receivedSince;
    }

    /**
     * @param \DateTime $receivedUntil
     */
    public function setReceivedUntil($receivedUntil)
    {
        $this->receivedUntil = $receivedUntil;
    }

    /**
     * @return \DateTime
     */
    public function getReceivedUntil()
    {
        return $this->receivedUntil;
    }

    public function setLimit($limit)
    {
        $this->limit = $limit;
    }

    public function getLimit()
    {
        return $this->limit;
    }

    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;
    }

    public function getKeyword()
    {
        return $this->keyword;
    }

}

?>