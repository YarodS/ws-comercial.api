<?php

namespace App\Helpers;

class ResponseHelper
{
    public function parametersError()
    {
        return response()->json([
            'response' => 'danger',
            'message' => 'Parámetros incorrectos.',
            'data' => []
        ], 200);
    }

    public function tokenIncorrect($params = [])
    {
        $params['message'] = !empty($params['message']) ? $params['message'] : 'El token es incorrecto.';
        return response()->json([
            'response' => 'danger',
            'message' => $params['message'],
            'data' => []
        ], 200);
    }

    public function notExistsInformation($params = [])
    {
        $params['message'] = !empty($params['message']) ? $params['message'] : 'No se ha encontrado información.';
        return response()->json([
            'response' => 'warning',
            'message' => $params['message'],
            'data' => []
        ], 200);
    }

    public function warning($params = [])
    {
        $params['message'] = !empty($params['message']) ? $params['message'] : 'No se ha encontrado información.';
        return response()->json([
            'response' => 'warning',
            'message' => $params['message'],
            'data' => []
        ], 200);
    }

    public function info($params = [])
    {
        $params['message'] = !empty($params['message']) ? $params['message'] : '';
        return response()->json([
            'response' => 'info',
            'message' => $params['message'],
            'data' => []
        ], 200);
    }

    public function danger($params = [])
    {
        $params['message'] = !empty($params['message']) ? $params['message'] : 'No hay información para mostrar.';
        $params['data'] = !empty($params['data']) ? $params['data'] : [];
        return response()->json([
            'response' => 'danger',
            'message' => $params['message'],
            'data' => $params['data']
        ], 200);
    }

    public function success($params = [])
    {
        $params['message'] = !empty($params['message']) ? $params['message'] : 'Operación completada con éxito.';
        $params['data'] = !empty($params['data']) ? $params['data'] : [];
        return response()->json([
            'response' => 'success',
            'message' => $params['message'],
            'data' => $params['data']
        ], 200);
    }

    public function successData($params = [])
    {
        $data = [
            'response' => $params['data']->response,
            'message' => $params['data']->message,
            'data' => []
        ];

        foreach ($params['data'] as $key => $value) {
            if ($key != 'message' && $key != 'response')
                $data['data'][$key] = $value;
        }

        return response()->json($data, 200);
    }

    public function errorOnRequest($params = [])
    {
        $params['message'] = !empty($params['message']) ? $params['message'] : 'No se ha podido realizar la conexión al servidor. Contacte con el área de IT.';
        return response()->json([
            'response' => 'danger',
            'message' => $params['message'],
            'data' => []
        ], 200);
    }

    public function saveIncomplete($params = [])
    {
        $params['message'] = !empty($params['message']) ? $params['message'] : 'No se ha guardado la información completa.';
        $params['data'] = !empty($params['data']) ? $params['data'] : [];
        return response()->json([
            'response' => 'info',
            'message' => $params['message'],
            'data' => $params['data']
        ], 200);
    }
}
