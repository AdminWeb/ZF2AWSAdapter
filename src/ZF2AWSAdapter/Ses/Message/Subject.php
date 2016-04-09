<?php

namespace ZF2AWSAdapter\Ses\Message;

use ZF2AWSAdapter\Ses\Arrayable;

/**
 * Build the subject to email
 */
class Subject implements Arrayable{
    
    /**
     * Subject charset
     * @var string 
     */
    private $charset = 'utf-8';
    
    /**
     * Subject Data
     * @var string 
     */
    private $data = null;
    
    /**
     * Return subject data
     * @return string
     */
    public function getCharset() {
        return $this->charset;
    }

    /**
     * Return subject data
     * @return string
     */
    public function getData() {
        return $this->data;
    }

    /**
     * Set subject charset. Default is 'utf-8'
     * @param string $charset
     * @return \ZF2AWSAdapter\Ses\Message\Subject
     */
    public function setCharset($charset = 'utf-8') {
        $this->charset = $charset;
        return $this;
    }

    /**
     * Set subject data
     * @param string $data
     * @return \ZF2AWSAdapter\Ses\Message\Subject
     */
    public function setData($data) {
        $this->data = $data;
        return $this;
    }
    
    /**
     * Return subject in array form
     * @return array
     */
    public function toArray()
    {
        $array = [];
        $array['Charset'] = $this->getCharset();
        $array['Data'] = $this->getData();
        return $array;
    }
}