<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use infobip\api\client\CreatePerson;
use infobip\api\model\people\Persons;
use infobip\api\model\people\persons\Contacts;
use infobip\api\model\people\persons\contacts\Phone;
use infobip\api\configuration\BasicAuthConfiguration;

// Initializing SendSingleTextualSms client with appropriate configuration
$client = new CreatePerson(new BasicAuthConfiguration(USERNAME, PASSWORD));

// Creating request body
$requestBody = new Persons();

$requestBody->setExternalId('1');
$requestBody->setFirstName('Jane');
$requestBody->setLastName('Smith');
$requestBody->setAddress('67 Farringdon Road');
$requestBody->setCity('London');
$requestBody->setCountry('United Kingdom');
$requestBody->setGender('FEMALE');
$requestBody->setBirthDate('1966-01-15');
$requestBody->setMiddleName('Janie');
$requestBody->setProfilePicture('http://profile.com');
$requestBody->setTags([
    "VIP Customers",
    "New Customers"
]);

/* Additional Data */
$additionalData = new AdditionalData();
$additionalData->setContractExpiry('2018-06-01');
$additionalData->setCompany('Acme');
$requestBody->setAdditionalData($additionalData);

/* Contact Data */
$contacts = new Contacts();

/* Contact > Address > Email */
$email = new Email();
$email->setAddress('janesmith@acme.com');
$contacts->setEmail($email);

/* Contact > Phone > Number */
$phone = new Phone();
$phone->setNumber('41793026727');
$contacts->setPhone($phone);

$requestBody->setContacts($contacts);

// Executing request
try {
    $response    = $client->execute($requestBody);
    $personInfo  = $response->getPerson();
    $contactInfo = $personInfo->getContacts();
    echo "External ID: "     . $personInfo->getExternalId()     . PHP_EOL;
    echo "First Name: "      . $personInfo->getFirstName()      . PHP_EOL;
    echo "Last Name: "       . $personInfo->getLastName()       . PHP_EOL;
    echo "Address: "         . $personInfo->getAddress()        . PHP_EOL;
    echo "City: "            . $personInfo->getCity()           . PHP_EOL;
    echo "Country: "         . $personInfo->getCountry()        . PHP_EOL;
    echo "Gender: "          . $personInfo->getGender()         . PHP_EOL;
    echo "Birth Date: "      . $personInfo->getBirthDate()      . PHP_EOL;
    echo "Middle Name: "     . $personInfo->getMiddleName()     . PHP_EOL;
    echo "Profile Picture: " . $personInfo->getProfilePicture() . PHP_EOL;
    echo "Tags: "            . $personInfo->getTags()           . PHP_EOL;
    echo "Additional Data: " . $personInfo->getAdditionalData() . PHP_EOL;
    echo "Email Address: "   . $contactInfo->getEmail()         . PHP_EOL;
    echo "Phone Number: "    . $contactInfo->getPhone()         . PHP_EOL;
} catch (Exception $exception) {
    echo "HTTP status code: " . $exception->getCode()    . PHP_EOL;
    echo "Error message: "    . $exception->getMessage() . PHP_EOL;
}