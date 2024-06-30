<?php

namespace App\Exceptions;

use Exception;

class FormException extends Exception
{
    public function render($request)
    {
        return response()->view('errors.error', [], 500);
    }
}
