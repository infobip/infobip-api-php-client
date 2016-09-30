<?php

namespace infobip\api\client;

use infobip\api\model\account\AccountBalance;
use infobip\api\AbstractApiClient;

/**
 * This is a generated class and is not intended for modification!
 */
class GetAccountBalance extends AbstractApiClient {

    public function __construct($configuration) {
        parent::__construct($configuration);
    }

    /**
     * @return AccountBalance
     */
    public function execute() {
        $restPath = $this->getRestUrl("/account/1/balance");
        $content = $this->executeGET($restPath, null);
        return $this->map(json_decode($content), get_class(new AccountBalance));
    }

}