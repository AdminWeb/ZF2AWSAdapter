<?php

namespace ZF2AWSAdapter\Ses\Message;

use ZF2AWSAdapter\Ses\Arrayable;
use InvalidArgumentException;

/**
 * Build the email destination 
 */
class Destination implements Arrayable {

    /**
     * BBC Addresses
     * @var array 
     */
    private $bbcAddress = [];
    
    /**
     * CC Addresses
     * @var array 
     */
    private $ccAddress = [];
    
    /**
     * TO Addresses
     * @var To Address 
     */
    private $toAddress = [];

    /**
     * Return the destinations
     * @return array
     */
    public function toArray() {
        $array = [];
        if(count($this->getBbcAddress())>0){
             $array['BccAddresses'] = $this->getBbcAddress();
        }
        if(count($this->getToAddress())>0){
             $array['ToAddresses'] = $this->getToAddress();
        }
        if(count($this->getCcAddress())>0){
            $array['CcAddresses'] = $this->getCcAddress();
        }
        return $array;
    }

    /**
     * Return BBC Addresses
     * @return array
     */
    public function getBbcAddress() {
        return $this->bbcAddress;
    }

    /**
     * Return CC Addresses
     * @return array
     */
    public function getCcAddress() {
        return $this->ccAddress;
    }

    /**
     * Return TO Addresses
     * @return array
     */
    public function getToAddress() {
        return $this->toAddress;
    }

    /**
     * Set to BBC Address
     * @param string $bbcAddress
     * @return \ZF2AWSAdapter\Ses\Message\Destination
     */
    public function setBbcAddress($bbcAddress) {
        $this->bbcAddress[] = $this->validateEmail($bbcAddress);
        return $this;
    }

    /**
     * Set CC Address
     * @param string $ccAddress
     * @return \ZF2AWSAdapter\Ses\Message\Destination
     */
    public function setCcAddress($ccAddress) {
        $this->ccAddress[] = $this->validateEmail($ccAddress);
        return $this;
    }
    
    /**
     * Set TO Address
     * @param string $toAddress
     * @return \ZF2AWSAdapter\Ses\Message\Destination
     */
    public function setToAddress($toAddress) {
        $this->toAddress[] = $this->validateEmail($toAddress);
        return $this;
    }

    /**
     * Validate the email address
     * @param string $email
     * @return string
     * @throws InvalidArgumentException
     */
    private function validateEmail($email) {        
        if(!is_string($email)){
            throw new InvalidArgumentException("{$email} is not string!");
        }
        if(filter_var($email,FILTER_VALIDATE_EMAIL) === false){
            throw new InvalidArgumentException("{$email}  is not valid e-mail!");
        }
        return $email;
    }

}
