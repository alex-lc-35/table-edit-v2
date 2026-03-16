<?php

namespace App\Actions;

use Illuminate\Http\JsonResponse;

class ActionResult
{
    public bool $success;
    public mixed $data;
    public ?string $errorMessage;
    public int $statusCode;

    private function __construct(bool $success, mixed $data = null, ?string $errorMessage = null, int $statusCode = 200)
    {
        $this->success = $success;
        $this->data = $data;
        $this->errorMessage = $errorMessage;
        $this->statusCode = $statusCode;
    }

    public static function success(mixed $data = null): self
    {
        return new self(true, $data);
    }

    public static function error(string $errorMessage, int $statusCode = 400): self
    {
        return new self(false, null, $errorMessage, $statusCode);
    }

    public function jsonResponse(): JsonResponse
    {
        return response()->json([
            'success' => $this->success,
            'data' => $this->data,
            'error' => $this->errorMessage,
        ], $this->statusCode);
    }
}
