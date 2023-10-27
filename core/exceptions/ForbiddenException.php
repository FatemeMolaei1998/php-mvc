<?php

namespace app\core\exceptions;

class ForbiddenException extends \Exception
{
    protected $message = "you do not have access to this page";
    protected $code = 403;
}