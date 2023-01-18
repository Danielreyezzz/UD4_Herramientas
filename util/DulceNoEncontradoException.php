<?php
namespace UD4_Herramientas\util;
class DulceNoEncontradoException extends PasteleriaException
{

    public function __construct(
        $message = "</brNo se ha encontado el dulce</br>",
        $code = 1,

    ) {
        parent::__construct($message, $code);
    }

    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}