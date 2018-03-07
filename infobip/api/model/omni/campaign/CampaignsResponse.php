<?php
namespace infobip\api\model\omni\campaign;

/**
 * This is a generated class and is not intended for modification!
 */
class CampaignsResponse implements \JsonSerializable
{
    /**
     * @var \infobip\api\model\omni\campaign\Campaign[]
     */
    private $campaigns;
    private $campaignCount;


    /**
     * @param \infobip\api\model\omni\campaign\Campaign[] $campaigns
     */
    public function setCampaigns($campaigns)
    {
        $this->campaigns = $campaigns;
    }

    /**
     * @return \infobip\api\model\omni\campaign\Campaign[]
     */
    public function getCampaigns()
    {
        return $this->campaigns;
    }

    public function setCampaignCount($campaignCount)
    {
        $this->campaignCount = $campaignCount;
    }
    public function getCampaignCount()
    {
        return $this->campaignCount;
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