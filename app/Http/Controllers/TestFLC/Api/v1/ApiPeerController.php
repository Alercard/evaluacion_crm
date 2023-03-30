<?php

namespace App\Http\Controllers\TestFLC\Api\v1;

use App\Core\Peer\Process\GetPeersProcess;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiPeerController extends Controller
{
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
