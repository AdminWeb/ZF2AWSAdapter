<?php

namespace ZF2AWSAdapter\Email\Message\Body;

use ZF2AWSAdapter\Email\Message\Body\BodyTypeInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use InvalidArgumentException;

/**
 * Renderer an email to html format
 */
class Html implements BodyTypeInterface,ServiceLocatorAwareInterface {

    /**
     * Email charset
     * @var String
     */
    private $charset = 'utf-8';
    
    /**
     * Email content
     * @var string 
     */
    private $data = null;
    
    /**
     * Email template body
     * @var string 
     */
    private $template = null;
    
    /**
     * Zend\ServiceManager\ServiceLocatorInterface
     * @var Zend\ServiceManager\ServiceLocatorInterface 
     */
    private $serviceLocator = null;

    /**
     * Constructor
     * @param Zend\ServiceManager\ServiceLocatorInterface  $serviceLocator
     */
    public function __construct(ServiceLocatorInterface $serviceLocator) {
        $this->setServiceLocator($serviceLocator);
    }

    /**
     * Return email body charset
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
     * @return \ZF2AWSAdapter\Email\Message\Body\Html
     */
    public function setCharset($charset = 'utf-8') {
        $this->charset = $charset;
        return $this;
    }

    /**
     * Set email content to html parse
     * @param Mixed $data
     * @throws InvalidArgumentException
     */
    public function setData($data) {
        $renderer = $this->getServiceLocator()->get('ViewRenderer');
        if(!is_array($data)){
            throw new InvalidArgumentException("The email data content need be of array type!");
        }
        $content = $renderer->render($this->getTemplate(), $data);
        $this->data = $content;
    }

    /**
     * Return email type
     * @return string
     */
    public function getType() {
        return 'Html';
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

    /**
     * Get email body template
     * @return string
     */
    public function getTemplate() {
        return $this->template;
    }

    /**
     * Return the ServiceLocator
     * @return Zend\ServiceManager\ServiceLocatorInterface 
     */
    public function getServiceLocator() {
        return $this->serviceLocator;
    }

    /**
     * Set template to email body content
     * @param string $template
     * @return \ZF2AWSAdapter\Email\Message\Body\Html
     */
    public function setTemplate($template) {
        $this->template = $template;
        return $this;
    }

    /**
     * Set the Zend\ServiceManager\ServiceLocatorInterface object
     * @param Zend\ServiceManager\ServiceLocatorInterface  $serviceLocator
     * @return \ZF2AWSAdapter\Email\Message\Body\Html
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator) {
        $this->serviceLocator = $serviceLocator;
        return $this;
    }

}
