<?php

namespace ZF2AWSAdapter\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Aws\Sdk;


/**
 * Factory to AWS Sdk client
 */
class AwsClientFactory implements FactoryInterface {

    /**
     * Create AWS Sdk Client configured
     * @param ServiceLocatorInterface $serviceLocator
     * @return Sdk
     */
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $config = $serviceLocator->get('Config');
        return new Sdk($config['aws']['init']);
    }

}