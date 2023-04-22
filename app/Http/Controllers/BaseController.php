<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class BaseController extends Controller
{
    /**
     * Send a success response.
     *
     * @param  string|array  $result
     * @param  string  $message
     * @param  int  $code
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message = 'Success', $code = Response::HTTP_OK)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];

        return response()->json($response, $code);
    }

    /**
     * Send an error response.
     *
     * @param  string|array  $error
     * @param  string  $message
     * @param  int  $code
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $message = 'Error', $code = Response::HTTP_BAD_REQUEST)
    {
        $response = [
            'success' => false,
            'message' => $message,
        ];

        if (!empty($error)) {
            $response['error'] = $error;
        }

        return response()->json($response, $code);
    }
}