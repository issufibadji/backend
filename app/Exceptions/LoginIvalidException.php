<?php

namespace App\Exceptions;

use Exception;

/**
 *
 */
class LoginIvalidException extends Exception
{
    /**
     * @var string
     */
    protected $message = 'Credentials don\'t match';

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function render()
    {
        return response()->json([
            'error' => class_basename($this),
            'message' => $this->getMessage(),
        ], 400);
    }
}
