<?php

namespace ZF2AWSAdapter\Ses\Message\Body;

use ZF2AWSAdapter\Ses\Message\Body\BodyTypeInterface;
use InvalidArgumentException;

/**
 * Renderer an email to text format
 */
class Text implements BodyTypeInterface {

    /**
     * Email charset
     * @var string 
     */
    private $charset = 'utf-8';
    
    /**
     * Email content
     * @var string 
     */
    private $data = null;

    /**
     * Return Email charset
     * @return string
     */
    public function getCharset() {
        return $this->charset;
    }

    /**
     * Return email content
     * @return string
     */
    public function getData() {
        return $this->data;
    }

    /**
     * Set email charset. Default is 'utf-8'
     * @param string $charset
     */
    public function setCharset($charset = 'utf-8') {
        $this->charset = $charset;
    }

    /**
     * Set email content
     * @param string $data
     */
    public function setData($data) {
        if(!is_string($data)){
            throw new InvalidArgumentException('The email data content need be a string!');
        }
        $this->data = $data;
    }

    /**
     * Return email type
     * @return string
     */
    public function getType() {
        return 'Text';
    }

    /**
     * Return the data in array form
     * @return array
     */
    public function toArray() {
        $array = [];
        $array['Data'] = $this->getData();
        $array['Charset'] = $this->getCharset();
        return $array;
    }

}
