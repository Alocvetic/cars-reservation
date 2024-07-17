<?php

namespace App\Exceptions;

class BookingException extends AbstractApiException
{
    public function __construct()
    {
        parent::__construct('Автомобиль уже занят в это время');
    }
}
