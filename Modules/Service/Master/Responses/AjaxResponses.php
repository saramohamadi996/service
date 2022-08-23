<?php
namespace Service\Master\Responses;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class AjaxResponses
{
    /**
     * @return JsonResponse
     */
    public static function SuccessResponse(): JsonResponse
    {
        return response()->json(['message' => 'successfully'], Response::HTTP_OK);
    }

    /**
     * @return JsonResponse
     */
    public static function FailedResponse(): JsonResponse
    {
        return response()->json(['message' => 'failed'], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
