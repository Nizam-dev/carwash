<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kendaraan;
use App\Models\paket_cuci;
use App\Models\paket_detailing;

class getPaketLayananController extends Controller
{
    public function getpaketlayanan(Request $request)
    {
        $jenis= kendaraan::find($request->jenis_kendaraan);
        $paket_cuci= paket_cuci::getpaketlayanan($jenis->jenis_kendaraan);
        $paket_detailing= paket_detailing::getpaketlayanan($jenis->jenis_kendaraan);
        return response()->json([
            "paket_cuci"=>$paket_cuci,
            "paket_detailing"=>$paket_detailing
        ]);
    }
}
