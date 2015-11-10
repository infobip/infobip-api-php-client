<?php
/**
 * Created by PhpStorm.
 * User: nmenkovic
 * Date: 9/8/15
 * Time: 4:41 PM
 */

namespace infobip\api\client;

use infobip\api\AbstractApiClient;
use infobip\api\model\account\AccountBalance;

class GetAccountBalance extends AbstractApiClient
{

    public function __construct($configuration)
    {
        parent::__construct($configuration);
    }

    /**
     * @return AccountBalance
     */
    public function execute()
    {
        $restPath = $this->getRestUrl("/account/1/balance");
        $content = $this->executeGET($restPath, null);
        return $this->map(json_decode($content), get_class(new AccountBalance));
    }
}