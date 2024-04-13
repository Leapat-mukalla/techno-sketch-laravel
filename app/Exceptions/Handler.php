<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    public function render($request, Throwable $exception)
    {
        if ($this->isHttpException($exception)) {
            if ($exception->getStatusCode() == 404) {
                return response()->view('errors.404', [], 404);
            } elseif ($exception->getStatusCode() == 403) {
                return response()->view('errors.403', [], 403);
            } elseif ($exception->getStatusCode() == 401) {
                return response()->view('errors.403', [], 401);
            } elseif ($exception->getStatusCode() == 500) {
                return response()->view('errors.500', [], 500);
            }elseif ($exception->getStatusCode() == 503) {
                return response()->view('errors.503', [], 503);
            }
        }

        return parent::render($request, $exception);
    }
}
