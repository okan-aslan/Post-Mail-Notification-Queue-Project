<?php

namespace App;

use Illuminate\Http\JsonResponse;

trait ApiResponses
{
    /**
     * Generate a success response.
     *
     * @param mixed $data The data to include in the response
     * @param string|null $message The message to include in the response
     * @param int $statusCode The HTTP status code
     * @return \Illuminate\Http\JsonResponse The JSON response
     */
    public function success(mixed $data, ?string $message, int $statusCode = 200): JsonResponse
    {
        return response()->json([
            'result' => 'success',
            'status' => $statusCode,
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }

    /**
     * Generate an error response.
     *
     * @param mixed $data The data to include in the response
     * @param string|null $message The message to include in the response
     * @param int $statusCode The HTTP status code
     * @return \Illuminate\Http\JsonResponse The JSON response
     */
    public function error(mixed $data, ?string $message, int $statusCode): JsonResponse
    {
        return response()->json([
            'result' => 'error',
            'status' => $statusCode,
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }
}
