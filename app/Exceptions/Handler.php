<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use App\Http\Controllers\PagesController;

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
        //
    }

    /**
     * Render the exception into an HTTP response.
     */
    public function render($request, Throwable $exception)
    {
        // لو Debug شغال (Local)
        if (config('app.debug')) {
            return parent::render($request, $exception);
        }

        // تحديد كود الخطأ
        $code = $exception instanceof HttpExceptionInterface
            ? $exception->getStatusCode()
            : 500;

        // منع أكواد غريبة
        if (!in_array($code, [403, 404, 500])) {
            $code = 500;
        }

        // تحويل لصفحة Error المخصصة
        return app(PagesController::class)->error($code);
    }
}
