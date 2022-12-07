<?php

namespace App\Http\Controllers;

use App\Services\Facades\ImageProcessingService;
use Illuminate\Http\JsonResponse;

class ImageProcessingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): JsonResponse
    {
        return \response()->json([
           'code' => ImageProcessingService::readQrCode('public/invoice.pdf')
        ]);
    }
}