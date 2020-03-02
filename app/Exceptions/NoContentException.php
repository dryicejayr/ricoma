<?php

namespace App\Exceptions;

use Exception;

class NoContentException extends Exception{
    
    public function __construct($message='', $code = 402, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}