<?php

namespace App\Http\Controllers;

use App\Exceptions\ResponseException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function getSuccessResponse($message, $data = null, $redirectUrl = null, $statusCode = ResponseException::HTTP_OK)
    {
        $response = [
            'status' => ResponseException::STATUS_SUCCESS,
            'message' => $message
        ];

        if (!is_null($data)) {
            $response['data'] = $data;
        }

        if (!is_null($redirectUrl)) {
            $response['redirect_url'] = $redirectUrl;
        }

        if (request()->wantsJson()) {
            return response()->json($response, $statusCode);
        }

        if ($redirectUrl) {
            return redirect($redirectUrl)->with(ResponseException::STATUS_SUCCESS, $message);
        }

        return back()->with(ResponseException::STATUS_SUCCESS, $message);
    }

    protected function getExceptionResponse(\Exception $exception, $errorContext = 'Error')
    {
        $request = request();
        
        Log::error("{$errorContext}: " . $exception->getMessage(), [
            'exception_class' => get_class($exception),
            'exception_message' => $exception->getMessage(),
            'exception_code' => $exception->getCode(),
            'exception_file' => $exception->getFile(),
            'exception_line' => $exception->getLine(),
            'exception_trace' => $exception->getTraceAsString(),
            'request' => [
                'url' => $request->fullUrl(),
                'method' => $request->method(),
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'headers' => $request->headers->all(),
                'input' => $this->sanitizeRequestInput($request->all()),
            ],
            'user' => $this->getUserContext(),
            'timestamp' => now()->toIso8601String(),
            'environment' => app()->environment(),
        ]);

        // Handle berbagai tipe exception
        switch (true) {
            case $exception instanceof ResponseException:
                $response = [
                    'status' => $exception->getStatus(),
                    'message' => $exception->getResponseMessage()
                ];

                if ($exception->getRedirectUrl()) {
                    $response['redirect_url'] = $exception->getRedirectUrl();
                }

                if ($exception->getData()) {
                    $response['data'] = $exception->getData();
                }

                if (request()->wantsJson()) {
                    return response()->json($response, $exception->getStatusCode());
                }

                if ($exception->getRedirectUrl()) {
                    return redirect($exception->getRedirectUrl())
                        ->with($exception->getStatus(), $exception->getResponseMessage());
                }

                return back()->with($exception->getStatus(), $exception->getResponseMessage());

            case $exception instanceof ValidationException:
                if (request()->wantsJson()) {
                    return response()->json([
                        'status' => ResponseException::STATUS_ERROR,
                        'message' => $exception->getMessage(),
                        'errors' => $exception->validator->errors()
                    ], ResponseException::HTTP_UNPROCESSABLE_ENTITY);
                }

                return back()->withErrors($exception->validator)->withInput();

            case $exception instanceof ModelNotFoundException:
                $message = 'Data tidak ditemukan.';
                
                if (request()->wantsJson()) {
                    return response()->json([
                        'status' => ResponseException::STATUS_ERROR,
                        'message' => $message
                    ], ResponseException::HTTP_NOT_FOUND);
                }

                return back()->with(ResponseException::STATUS_ERROR, $message);

            default:
                if(env('APP_DEBUG') == 'true') {
                    $message = $exception->getMessage() ?? 'Terjadi kesalahan teknis pada server. Silakan coba lagi nanti.';
                } else {
                    $message = 'Terjadi kesalahan pada sistem. Silakan coba lagi nanti.';
                }
                
                if (request()->wantsJson()) {
                    return response()->json([
                        'status' => ResponseException::STATUS_ERROR,
                        'message' => $message
                    ], ResponseException::HTTP_SERVER_ERROR);
                }

                return back()->with(ResponseException::STATUS_ERROR, $message);
        }
    }

    /**
     * Sanitize sensitive information from request input
     */
    private function sanitizeRequestInput(array $input): array
    {
        $sensitiveFields = [
            'password',
            'password_confirmation',
            'current_password',
            'credit_card',
            'card_number',
            'token',
            'api_key',
            'secret',
        ];

        return collect($input)->map(function ($value, $key) use ($sensitiveFields) {
            if (in_array(strtolower($key), $sensitiveFields)) {
                return '[REDACTED]';
            }

            if (is_array($value)) {
                return $this->sanitizeRequestInput($value);
            }

            return $value;
        })->all();
    }

    /**
     * Get current user context for logging
     */
    private function getUserContext(): array
    {
        $user = auth()?->user();

        if (!$user) {
            return ['authenticated' => false];
        }

        return [
            'authenticated' => true,
            'id' => $user->id,
            'email' => $user->email ?? null,
            'name' => $user->name ?? null,
            // Tambahkan informasi user lain yang relevan
        ];
    }
}
