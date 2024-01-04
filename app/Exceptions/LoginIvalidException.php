<?php

namespace App\Exceptions;

use Exception;

class LoginIvalidException extends Exception
{
    protected $message = 'Credentials don\'t match';

    public function render()
    {
        return response()->json([
            'error' => class_basename($this),
            'message' => $this->getMessage(),
        ], 400);
    }
}
