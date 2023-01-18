<?php
namespace UD4_Herramientas\util;
class DulceNoCompradoException extends PasteleriaException
{

    public function __construct(
        $message = "</br>El dulce no ha sido comprado</br>",
        $code = 1,

    ) {
        parent::__construct($message, $code);
    }

    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}