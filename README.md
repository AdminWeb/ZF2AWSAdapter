ZF2 AWS Adapter
===============

This is an AWS SDK PHP Adapter to Zend Framework 2.

Install with:

```
composer require adminweb/zf2aws-adapter
```

Now, only Ses service is supported

Requirements:
- php >= 5.5
- zendframework/zend-view
- zendframework/zend-servicemanager
- aws/aws-sdk-php

Copy the aws.global.php.dist file to config/autoload of project, with name aws.global.php. Fill the region, version, key and secret fields. Version can be 'latest'. Fill ses/source field with email validated on ses service.

## Example use

```php
<?php
//use with html templates
class SomeController extends ...{
    public function someAction(){
        $simplebuilder = $this->getServiceLocator()->get('AwsAdapter\Simple\EmailBuilder');
        $htmlparser = $this->getServiceLocator()->get('AwsAdapter\Simple\HtmlParser');
        $htmlparser->setTemplate('some/template'); //see below
        // set data to parse to html
        $htmlparser->setData(['foo'=>'bar']);
        // set body
        $body = new \ZF2AWSAdapter\Ses\Message\Body();
        $body->setBody($htmlparser);
        // set destinations
        $destination = new \ZF2AWSAdapter\Ses\Message\Destination();
        $destination->setToAddress('test@example.com');
        //init message
        $message = new \ZF2AWSAdapter\Ses\Message\Message();
        // set subject
        $subject = new \ZF2AWSAdapter\Ses\Message\Subject();
        $subject->setData('Some subject');
        // compose message with body and subject
        $message->setBody($body)->setSubject($subject);
        // compose email and sent it
        $simplebuilder->setDestination($destination)->setMessage($message)->sendEmail();
    }
}
```
### Html templates

The html template are configured on view manager settings of your module, like below:

```php
<?php
return [
'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => realpath(__DIR__ . '/../../base/view/layout/layout.phtml'),
            'some/template' => '/../template.phtml'),    
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),];
```

## Roadmap

- Upload to S3
- Other AWS Services