<?php

namespace ZF2AWSAdapter\Email\Message\Body;

use ZF2AWSAdapter\Ses\ArrayableInterface;


/**
 * BodyType Interface
 */
interface BodyTypeInterface extends ArrayableInterface{
    
    public function getCharset();
    
    public function getData();
    
    public function setCharset($charset = 'utf-8');
    
    public function setData($data);
    
    public function getType();
}