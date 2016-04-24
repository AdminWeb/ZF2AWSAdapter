<?php

namespace ZF2AWSAdapter\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZF2AWSAdapter\Ses\SimpleEmailBuilder;


/**
 * Create email build object
 */
class AwsSimpleEmailFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $serviceLocator) {       
        $config = $serviceLocator->get('Config');
        return new SimpleEmailBuilder($config['aws']['ses']['source'],$serviceLocator->get('AwsClient')->createSes());
    }

}