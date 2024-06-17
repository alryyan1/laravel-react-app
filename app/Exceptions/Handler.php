<?php

namespace App\Exceptions;

use App\Models\Whatsapp;
use Illuminate\Auth\AuthenticationException;
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
//        $this->reportable(function (Throwable $e) {
//            //
//        });

        $this->renderable(function (AuthenticationException $e, $request) {
            if ($request->is('api/*')) {

//                Whatsapp::sendMsgWb('96878622990',$e->getMessage());
                return response()->json([
                    'status_code' => 401,
                    'success' => false,
                    'message' => 'Unauthenticated.'
                ], 401);
            }
        });
        $this->renderable(function (Throwable $e, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'line'=>$e->getLine(),
                    'message' => $e->getMessage(),
                    'code' => $e->getCode(),
                    'file' => $e->getFile(),
                ], 404);
            }
        });
    }
}
