<?php

namespace ZF2AWSAdapter\Ses;

/**
 * Interface to tranform data in array
 */
interface Arrayable {
    
    /**
     * Return data in array form
     */
    public function toArray();
    
}
