<?php

namespace app\core\exceptions;

class NotFoundException extends \Exception
{
    protected $message = "The page you are looking for does not exist";
    protected $code = 404;
}