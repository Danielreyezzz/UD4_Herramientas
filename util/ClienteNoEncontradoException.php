<?php
namespace UD4_Herramientas\util;

class ClienteNoEncontradoException extends PasteleriaException
{

    public function __construct(
        $message = "</br>El cliente no ha sido encontrado</br>",
        $code = 1,

    ) {
        parent::__construct($message, $code);
    }

    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}