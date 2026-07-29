<?php

namespace App\Exceptions;

use Exception;

class VendorAlreadyExistsException extends Exception
{
    protected $message = 'User is already a vendor.';
}
