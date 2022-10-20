<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StationResource;
use App\Models\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @OA\Get(
     *     path="/stations",
     *     tags={"station"},
     *     summary="Stations list",
     *
     *
     *     @OA\Response(
     *         response=200,
     *         description="Returns list of available stations for booking",
     *        @OA\JsonContent(
     *             type="object",
     *                @OA\Property(
     *                property="data",
     *                type="array",
     *                @OA\Items(
     *                      @OA\Property(
     *                         property="station_id",
     *                         type="integer",
     *                      ),
     *                      @OA\Property(
     *                         property="station_name",
     *                         type="string",
     *                      ),
     *
     *                ),
     *             ),
     *             ),
     *     ),
     *
     * )
     * @return StationResource|\Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
     */
    public function index()
    {
        return  StationResource::collection(Station::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
