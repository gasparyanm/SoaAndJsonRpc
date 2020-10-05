<?php
namespace App\Services;

use App\Http\Response\JsonResponse;
use App\Http\Controllers\DataController;
use Illuminate\Http\Request;

class JsonRpcServer
{
    public function handle(Request $request, DataController $controller)
    {
        try {
            $content = json_decode($request->getContent(), true);

            if (empty($content)) {
                throw new \Exception('Parse error', JsonResponse::JSON_PARSE_ERROR_CODE);
            }
            $result = $controller->{$content['method']}(...[$content['params']]);

            return JsonResponse::success($result, $content['id']);
        } catch (\Exception $e) {
            return JsonResponse::error($e->getMessage());
        }
    }
}
