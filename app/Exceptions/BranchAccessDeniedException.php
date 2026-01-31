<?php

namespace App\Exceptions;

use Exception;

class BranchAccessDeniedException extends Exception
{
    public function render($request)
    {
        return response()->json(['error' => 'You do not have permission to access this branch'], 403);
    }
}
