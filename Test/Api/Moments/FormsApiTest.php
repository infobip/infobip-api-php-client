<?php

namespace Infobip\Test\Api\Moments;

use DateTime;
use GuzzleHttp\Psr7\Query;
use Infobip\Api\FormsApi;
use Infobip\Model\FormsElement;
use Infobip\Model\FormsResponse;
use Infobip\Model\FormsResponseContent;
use Infobip\Model\FormsStatus;
use Infobip\Model\FormsStatusResponse;
use Infobip\Model\FormsType;
use Infobip\Model\FormsValidationRules;
use Infobip\Test\Api\ApiTestBase;

class FormsApiTest extends ApiTestBase
{
    public function testGetForms()
    {
        $givenResponse = <<<JSON
        {
          "forms": [
            {
              "id": "f23f0f7c-9898-4feb-8f21-5afe2c29db7e",
              "name": "Test form",
              "elements": [
                {
                  "component": "TEXT",
                  "fieldId": "first_name",
                  "personField": "firstName",
                  "label": "First Name",
                  "isRequired": false,
                  "isHidden": false,
                  "additionalConfiguration": {},
                  "validationRules": {
                    "maxLength": 255,
                    "sample": "James",
                    "forbiddenSymbols": [
                      "^",
                      "&",
                      "<",
                      ">"
                    ]
                  },
                  "placeholder": "First Name"
                },
                {
                  "component": "TEXT",
                  "fieldId": "last_name",
                  "personField": "lastName",
                  "label": "Last Name",
                  "isRequired": false,
                  "isHidden": false,
                  "additionalConfiguration": {},
                  "validationRules": {
                    "maxLength": 255,
                    "sample": "James",
                    "forbiddenSymbols": [
                      "(",
                      ")",
                      "{",
                      "}"
                    ]
                  },
                  "placeholder": "Last Name"
                },
                {
                  "component": "TEXT",
                  "fieldId": "company",
                  "personField": "267ce64a-1a26-4326-9036-6384696f39c8",
                  "label": "Company",
                  "isRequired": false,
                  "isHidden": false,
                  "additionalConfiguration": {},
                  "validationRules": {
                    "maxLength": 1000,
                    "sample": "Lorem ipsum"
                  },
                  "placeholder": "Company"
                },
                {
                  "component": "EMAIL",
                  "fieldId": "email",
                  "personField": "email",
                  "label": "Email Address",
                  "isRequired": true,
                  "isHidden": false,
                  "additionalConfiguration": {},
                  "validationRules": {
                    "maxLength": 1000,
                    "pattern": "[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\\\\.[A-Z|a-z]{2,}",
                    "sample": "email@example.com"
                  },
                  "placeholder": "Email"
                },
                {
                  "component": "TEXTAREA",
                  "fieldId": "business_needs",
                  "label": "Business Needs",
                  "isRequired": false,
                  "isHidden": false,
                  "additionalConfiguration": {},
                  "validationRules": {
                    "maxLength": 3000,
                    "sample": "Lorem ipsum ..."
                  },
                  "placeholder": ""
                }
              ],
              "createdAt": "2022-07-11T06:38:12.757+0000",
              "updatedAt": "2022-07-11T06:45:12.826+0000",
              "resubmitEnabled": true,
              "formType": "OPT_IN",
              "formStatus": "ACTIVE"
            }    
          ],
          "offset": 0,
          "limit": 25,
          "total": 1
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $formsApi = new FormsApi($this->getConfiguration(), client: $client);

        $expectedPath = '/forms/1/forms?'
            . Query::build([
                'offset' => 0,
                'limit' => 25,
                'formType' => 'OPT_IN',
                'formStatus' => 'ACTIVE',
            ]);

        $closures = [
            fn () => $formsApi->getForms(formType: FormsType::OPT_IN(), formStatus: FormsStatus::ACTIVE()),
            fn () => $formsApi->getFormsAsync(formType: FormsType::OPT_IN(), formStatus: FormsStatus::ACTIVE()),
        ];

        $expectedResponse = new FormsResponse(
            forms: [
                new FormsResponseContent(
                    id: 'f23f0f7c-9898-4feb-8f21-5afe2c29db7e',
                    name: 'Test form',
                    elements: [
                        new FormsElement(
                            component: 'TEXT',
                            fieldId: 'first_name',
                            personField: 'firstName',
                            label: 'First Name',
                            isRequired: false,
                            isHidden: false,
                            additionalConfiguration: [],
                            validationRules: new FormsValidationRules(
                                maxLength: 255,
                                sample: 'James',
                                forbiddenSymbols: ['^', '&', '<', '>']
                            ),
                            placeholder: 'First Name'
                        ),
                        new FormsElement(
                            component: 'TEXT',
                            fieldId: 'last_name',
                            personField: 'lastName',
                            label: 'Last Name',
                            isRequired: false,
                            isHidden: false,
                            additionalConfiguration: [],
                            validationRules: new FormsValidationRules(
                                maxLength: 255,
                                sample: 'James',
                                forbiddenSymbols: ['(', ')', '{', '}']
                            ),
                            placeholder: 'Last Name'
                        ),
                        new FormsElement(
                            component: 'TEXT',
                            fieldId: 'company',
                            personField: '267ce64a-1a26-4326-9036-6384696f39c8',
                            label: 'Company',
                            isRequired: false,
                            isHidden: false,
                            additionalConfiguration: [],
                            validationRules: new FormsValidationRules(
                                maxLength: 1000,
                                sample: 'Lorem ipsum'
                            ),
                            placeholder: 'Company'
                        ),
                        new FormsElement(
                            component: 'EMAIL',
                            fieldId: 'email',
                            personField: 'email',
                            label: 'Email Address',
                            isRequired: true,
                            isHidden: false,
                            additionalConfiguration: [],
                            validationRules: new FormsValidationRules(
                                maxLength: 1000,
                                pattern: '[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\\.[A-Z|a-z]{2,}',
                                sample: 'email@example.com'
                            ),
                            placeholder: 'Email'
                        ),
                        new FormsElement(
                            component: 'TEXTAREA',
                            fieldId: 'business_needs',
                            label: 'Business Needs',
                            isRequired: false,
                            isHidden: false,
                            additionalConfiguration: [],
                            validationRules: new FormsValidationRules(
                                maxLength: 3000,
                                sample: 'Lorem ipsum ...'
                            ),
                            placeholder: ''
                        )
                    ],
                    resubmitEnabled: true,
                    formType: FormsType::OPT_IN(),
                    formStatus: FormsStatus::ACTIVE(),
                    createdAt: new DateTime('2022-07-11T06:38:12.757+0000'),
                    updatedAt: new DateTime('2022-07-11T06:45:12.826+0000')
                )
            ],
            offset: 0,
            limit: 25,
            total: 1
        );

        $this->assertGetRequest(
            $closures,
            $expectedPath,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testGetForm()
    {
        $givenResponse = <<<JSON
        {
          "id": "f23f0f7c-9898-4feb-8f21-5afe2c29db7e",
          "name": "Test form",
          "elements": [
            {
              "component": "TEXT",
              "fieldId": "company",
              "personField": "267ce64a-1a26-4326-9036-6384696f39c8",
              "label": "Company",
              "isRequired": false,
              "isHidden": false,
              "additionalConfiguration": {},
              "validationRules": {
                "maxLength": 1000,
                "sample": "Lorem ipsum"
              },
              "placeholder": "Company"
            },
            {
              "component": "TEXTAREA",
              "fieldId": "business_needs",
              "label": "Business Needs",
              "isRequired": false,
              "isHidden": false,
              "additionalConfiguration": {
                "config": true
              },
              "validationRules": {
                "maxLength": 3000,
                "sample": "Lorem ipsum ..."
              },
              "placeholder": ""
            }
          ],
          "createdAt": "2022-07-11T06:38:12.757+0000",
          "updatedAt": "2022-07-11T06:45:12.826+0000",
          "resubmitEnabled": true,
          "formType": "OPT_IN",
          "formStatus": "ACTIVE"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $formsApi = new FormsApi($this->getConfiguration(), client: $client);
        $expectedPath = '/forms/1/forms/f23f0f7c-9898-4feb-8f21-5afe2c29db7e';

        $closures = [
            fn () => $formsApi->getForm('f23f0f7c-9898-4feb-8f21-5afe2c29db7e'),
            fn () => $formsApi->getFormAsync('f23f0f7c-9898-4feb-8f21-5afe2c29db7e'),
        ];

        $expectedResponse = new FormsResponseContent(
            id: 'f23f0f7c-9898-4feb-8f21-5afe2c29db7e',
            name: 'Test form',
            elements: [
                new FormsElement(
                    component: 'TEXT',
                    fieldId: 'company',
                    personField: '267ce64a-1a26-4326-9036-6384696f39c8',
                    label: 'Company',
                    isRequired: false,
                    isHidden: false,
                    additionalConfiguration: [],
                    validationRules: new FormsValidationRules(
                        maxLength: 1000,
                        sample: 'Lorem ipsum'
                    ),
                    placeholder: 'Company'
                ),
                new FormsElement(
                    component: 'TEXTAREA',
                    fieldId: 'business_needs',
                    label: 'Business Needs',
                    isRequired: false,
                    isHidden: false,
                    additionalConfiguration: ['config' => true],
                    validationRules: new FormsValidationRules(
                        maxLength: 3000,
                        sample: 'Lorem ipsum ...'
                    ),
                    placeholder: ''
                )
            ],
            resubmitEnabled: true,
            formType: FormsType::OPT_IN(),
            formStatus: FormsStatus::ACTIVE(),
            createdAt: new DateTime('2022-07-11T06:38:12.757+0000'),
            updatedAt: new DateTime('2022-07-11T06:45:12.826+0000')
        );

        $this->assertGetRequest(
            $closures,
            $expectedPath,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testIncrementFormViewCount()
    {
        $givenResponse = <<<JSON
        {
          "status": "OK"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $formsApi = new FormsApi($this->getConfiguration(), client: $client);
        $expectedPath = '/forms/1/forms/cec5dfd2-4238-48e0-933b-9acbdb2e6f5fe/views';

        $closures = [
            fn () => $formsApi->incrementViewCount('cec5dfd2-4238-48e0-933b-9acbdb2e6f5fe'),
            fn () => $formsApi->incrementViewCountAsync('cec5dfd2-4238-48e0-933b-9acbdb2e6f5fe'),
        ];

        $expectedResponse = new FormsStatusResponse(
            status: 'OK'
        );

        $this->assertPostRequestWithNoBody(
            $closures,
            $expectedPath,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testSubmitFormData()
    {
        $givenRequest = <<<JSON
        {
          "first_name": "John",
          "last_name": "Doe",
          "company": "Infobip",
          "email": "info@example.com"
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "status": "OK"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $formsApi = new FormsApi($this->getConfiguration(), client: $client);
        $expectedPath = '/forms/1/forms/f7cf1606-e155-40eb-9721-78183d268d24/data';

        $request = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'company' => 'Infobip',
            'email' => 'info@example.com'
        ];

        $closures = [
            fn () => $formsApi->submitFormData(
                'f7cf1606-e155-40eb-9721-78183d268d24',
                $request,
                "mySource"
            ),
            fn () => $formsApi->submitFormDataAsync(
                'f7cf1606-e155-40eb-9721-78183d268d24',
                $request,
                "mySource"
            )
        ];

        $expectedResponse = new FormsStatusResponse(
            status: 'OK'
        );

        $this->assertPostRequestWithAdditionalHeaders(
            $closures,
            $expectedPath,
            $givenRequest,
            $expectedResponse,
            $requestHistoryContainer,
            ['ib-submission-source' => 'mySource']
        );
    }
}
