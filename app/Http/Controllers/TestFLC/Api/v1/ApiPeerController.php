<?php

namespace App\Http\Controllers\TestFLC\Api\v1;

use App\Core\Peer\Process\GetPeersProcess;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
/**
 * @group Test FLC
 *
 * APIs para prueba técnica de Franklin Lucero Correa
 */
class ApiPeerController extends Controller
{
    /**
     * Pares de números
     *
     * @bodyParam  data string required Cadena de texto de 2 lineas.<br/><strong>Linea 1:</strong> Debe tener 2 numeros enteros (<strong>n</strong> y <strong>k</strong>) separados por un espacio en blanco.<br/><strong>n:</strong> Cuantos números se envían. Debe ser un valor entre 2 y 10^5<br/><strong>k:</strong> El valor objetivo de las restas de cada par. Debe ser un valor entre 0 y 10^9<br/><strong>Línea 2:</strong> Los números enteros a procesar, separados por espacios en blanco. Cada valor debe estar en el rango de 2 y 2^31 - 1 (2147483647).<br/><strong>Formato Final:</strong><br/>[n] [k]<br/>[i1] [i2] [i3] ... [in]<br/><strong>Ejemplo:</strong> <br/>4 5<br/>123 128 354 14523 <br/>En este caso la api devolver 1 como resultado (128 - 123 = 5 = k). Example: 4 5\n123 128 354 14523
     *
     * @response  200 {
     *  "results": 1,
     *  "error": "[Mensaje de error si hubiera]"
     * }
     *
     * @response  500 {
     *  "message": "[Mensaje de error]"
     * }
     */
    public function processPeers(Request $request) {
        try {
            $request->validate([
                'data' => 'required|string',
            ]);

            $data = $request->input('data');
            $process =new GetPeersProcess();
            $results = $process->process($data);

            return response()->json([
                'results' => $results,
                'error' => ''
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'results' => 0,
            ]);
        }
    }
}
