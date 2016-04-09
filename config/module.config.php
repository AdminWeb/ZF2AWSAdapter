<?php

return [
    'service_manager' => array(
        'factories' => array(
            'AwsClient' => ZF2AWSAdapter\Factory\AwsClientFactory::class,
            'Aws\Simple\EmailBuilder' => ZF2AWSAdapter\Factory\AwsSimpleEmailFactory::class,
        ),
    )
];
