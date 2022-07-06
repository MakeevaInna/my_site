<?php

namespace Exceptions;

class IdNotFound extends \DomainException
{
    protected $message = 'Not Found in Storage';
}
