<?php

namespace App\Repositories;

use App\Models\Region;
use Exception;
use Illuminate\Http\Response;
use stdClass;

class RegionRepository
{
    public function registrarRegion($request)
    {
        try {
            $region = Region::create(['reg_nombre' => $request->reg_nombre]);
            return response()->json(["region" => $region], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function buscarRegion($request)
    {
        try {
            $region = Region::where('reg_nombre', $request->region)->first();
            if (!$region) {
                $region = Region::create(['reg_nombre' => $request->region]);
            }
            return $region;
        } catch (Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}
