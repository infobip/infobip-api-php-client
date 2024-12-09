<?php

declare(strict_types=1);

$responseVars = [
    'acknowledged'     => true,
    'hash'    => 'eU2Fdi4EMUw=',
    'createdAt'  => '2022-02-18T08:12:26.422Z'
];

$acknowlegedBool = var_export($responseVars['acknowledged'], true);

$givenResponse = <<<JSON
        {
            "acknowledged": $acknowlegedBool,
            "hash": "{$responseVars['hash']}",
            "createdAt": "{$responseVars['createdAt']}"
        }
        JSON;

return [$responseVars, $givenResponse];
