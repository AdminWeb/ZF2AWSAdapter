<?php

namespace ZF2AWSAdapter\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZF2AWSAdapter\Ses\Message\Body\Html;


/**
 * Create Html parser object
 */
class SimpleEmailHtmlFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $serviceLocator) { 
        return new Html($serviceLocator);
    }

}