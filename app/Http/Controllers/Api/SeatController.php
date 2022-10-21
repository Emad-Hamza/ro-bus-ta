<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Seat;
use App\Models\StationsTrip;
use App\Models\Trip;
use App\Models\Bus;
use App\Models\Station;
use App\Http\Resources\SeatCollection;
use App\Service\SeatService;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Psy\Command\WhereamiCommand;

class SeatController extends Controller
{
    /**
     * Display a each trip that matches the desired pick up
     * and destinations and its seats.
     *
     * @OA\Get(
     *     path="/seats",
     *     tags={"seat"},
     *     summary="Seats list",
     *
     *     @OA\Parameter(
     *         name="start_station_id",
     *         in="query",
     *         explode=true,
     *         required=true,
     *         @OA\Schema(
     *             type="array",
     *             @OA\Items(
     *                 type="integer",
     *                 enum = {1, 2, 3, 4, 5, 6},
     *             )
     *         ),
     *         style="form"
     *     ),
     *     @OA\Parameter(
     *         name="destination_station_id",
     *         in="query",
     *         explode=true,
     *         required=true,
     *         @OA\Schema(
     *             type="array",
     *             @OA\Items(
     *                 type="integer",
     *                 enum = {1, 2, 3, 4, 5, 6},
     *             )
     *         ),
     *         style="form"
     *     ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Returns list of Trip and its seats",
     *        @OA\JsonContent(
     *             type="array",
     *                @OA\Items(
     *                      @OA\Property(
     *                         property="trip_id",
     *                         type="integer",
     *                      ),
     *                      @OA\Property(
     *                         property="trip_name",
     *                         type="string",
     *                      ),
     *                      @OA\Property(
     *                         property="trip_seats",
     *                         type="array",
     *                      @OA\Items(
     *                      @OA\Property(
     *                         property="id",
     *                         type="integer",
     *                      ),
     *                      @OA\Property(
     *                         property="created_at",
     *                         type="string",
     *                      ),
     *                      @OA\Property(
     *                         property="updated_at",
     *                         type="string",
     *
     *                      ),
     *                      @OA\Property(
     *                         property="bus_id",
     *                         type="integer",
     *                      ),
     *                ),
     *
     *                      @OA\Property(
     *                         property="trip_stations",
     *                         type="array",
     *                      @OA\Items(
     *                      @OA\Property(
     *                         property="id",
     *                         type="integer",
     *                      ),
     *                      @OA\Property(
     *                         property="created_at",
     *                         type="string",
     *                      ),
     *                      @OA\Property(
     *                         property="updated_at",
     *                         type="string",
     *                      ),
     *                      @OA\Property(
     *                         property="pivot",
     *                         type="object",
     *                      @OA\Property(
     *                         property="trip_id",
     *                         type="integer",
     *                      ),
     *                      @OA\Property(
     *                         property="station_id",
     *                         type="integer",
     *                      ),
     *                      @OA\Property(
     *                         property="stations_id",
     *                         type="integer",
     *                      ),
     *                      ),
     *                      ),
     *                      ),
     *
     *                      ),
     *
     *                ),
     *             ),
     *     ),
     *
     * )
     *
     * @return array|\Illuminate\Http\Response
     */
    public function index(Request $request, SeatService $seatService)
    {

        $request->validate([
            'start_station_id' => 'required|integer',
            'destination_station_id' => 'required|integer',
        ]);


        $startStationId = $request->input('start_station_id');
        $destinationStationId = $request->input('destination_station_id');


        $seats = $seatService->getValidSeats($startStationId, $destinationStationId);


        return $seats;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seat $seat
     * @return \Illuminate\Http\Response
     */
    public function show(Seat $seat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Seat $seat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seat $seat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seat $seat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seat $seat)
    {
        //
    }


}
