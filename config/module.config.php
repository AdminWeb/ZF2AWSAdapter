<?php

return [
    'service_manager' => array(
        'factories' => array(
            'AwsClient' => ZF2AWSAdapter\Factory\AwsClientFactory::class,
            'AwsAdapter\Simple\EmailBuilder' => ZF2AWSAdapter\Factory\AwsSimpleEmailFactory::class,
            'AwsAdapter\Simple\HtmlParser' => ZF2AWSAdapter\Factory\SimpleEmailHtmlFactory::class,
        ),
    )
];
