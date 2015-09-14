<?php
/**
 * Created by PhpStorm.
 * User: nmenkovic
 * Date: 9/9/15
 * Time: 3:46 PM
 */
require_once __DIR__ . '/../../vendor/autoload.php';

use infobip\api\client\GetAccountBalance;
use infobip\api\configuration\BasicAuthConfiguration;

// Initializing GetAccountBalance client with appropriate configuration
$client = new GetAccountBalance(new BasicAuthConfiguration(USERNAME, PASSWORD));
// Executing request
$response = $client->execute();

echo 'accountBalance = ' . $response->getBalance() . ' ' . $response->getCurrency();