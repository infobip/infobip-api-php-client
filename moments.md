# Moments quickstart

This quick guide aims to help you start with [Infobip Moments API](https://www.infobip.com/docs/api/customer-engagement/moments).    

Initialize configuration:

```php
$configuration = new Configuration(
    host: 'your-base-url',
    apiKey: 'your-api-key'
);
```

## Flow API

You can now create an instance of `FlowApi` which allows you to manage your flows.

```php
$flowApi = new FlowApi(config: $configuration);
```
### Add participants to flow

To add participants to a flow, you can use the following code:

```php
$campaignId = '200000000000001';

$request = new FlowAddFlowParticipantsRequest(
    participants: [
        new FlowParticipant(
            identifyBy: new FlowPersonUniqueField(
                identifier: 'test@example.com',
                type: FlowPersonUniqueFieldType::EMAIL
            ),
            variables: ['orderNumber' => 1167873391]
        )
    ],
    notifyUrl: 'https://example.com/callback',
);

$status = $flowApi->addFlowParticipants($campaignId, $request);
```

The received status will contain the operation ID that you can use to track the status of the operation.

### Get a report on participants added to flow

To fetch a report to confirm that all persons have been successfully added to the flow, you can use the following code:

```php
$report = $flowApi->getFlowParticipantsAddedReport($campaignId, $status->getOperationId());
```

### Remove person from flow

To remove a person from a flow, you can use the following code:

```php
$externalId = '8edb24b5-0319-48cd-a1d9-1e8bc5d577ab';
$flowApi->removePeopleFromFlow($campaignId, null, null, $externalId);
```

## Forms API

You can now create an instance of `FormsApi` which allows you to manage your forms.

```php
$formsApi formsApi = new FormsApi(config: $configuration);
```

### Get forms

To get all your forms, you can use the following code:

```php
$formsResponse = $formsApi->getForms();
```

### Get form by ID

To get a specific form by its ID, you can use the following code:

```php
$formId = 'cec5dfd2-4238-48e0-933b-9acbdb2e6f5f';
$formResponse = $formsApi->getForm($formId);
```

### Increment form view count

To increase the view counter of a specific form, you can use the following code:

```php
$status = $formsApi->incrementViewCount($formId);
```

### Submit form data

To submit data to a specific form, you can use the following code:

```php
$data = [
    'first_name' => 'John',
    'last_name' => 'Doe',
    'company' => 'Infobip',
    'email' => 'info@example.com'
];

$status = $formsApi->submitFormData($formId, $data);
```
