<?php

namespace App\Exceptions;

use App\Services\ResponseApi;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        if ($request->wantsJson()) {
            $status = $e->getCode();
            $data = [$e->getMessage()];
            $message = 'Произошла ошибка! Мы уже работаем над ее устранением!';

            if ($e instanceof ValidationException) {
                $status = 422;
                $data = $e->errors();
                $message = 'Ошибка валидации данных';
            } elseif ($e instanceof ModelNotFoundException) {
                $status = 404;
                $data = [];
                $message = 'Запись не найдена';
            } elseif ($e instanceof UniqueConstraintViolationException ) {
                $status = 422;
                $data = [];
                $message = 'Значение ' .key($request->toArray()). ' уже существует';
            }

            return ResponseApi::json(
                $data,
                $status,
                $message
            );
        }

        return parent::render($request, $e);
    }
}
