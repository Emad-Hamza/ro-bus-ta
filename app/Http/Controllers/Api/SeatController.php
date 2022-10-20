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
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Psy\Command\WhereamiCommand;

class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
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
     *         required=false,
     *         @OA\Schema(
     *             type="array",
     *             @OA\Items(
     *                 type="integer",
     *                 enum = {1, 2, 3, 4},
     *             )
     *         ),
     *         style="form"
     *     ),
     *     @OA\Parameter(
     *         name="destination_station_id",
     *         in="query",
     *         explode=true,
     *         required=false,
     *         @OA\Schema(
     *             type="array",
     *             @OA\Items(
     *                 type="integer",
     *                 enum = {1, 2, 3, 4},
     *             )
     *         ),
     *         style="form"
     *     ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Returns list of Seats",
     *     ),
     *
     * )
     *
     * @return array|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $startStationId = $request->input('start_station_id');
        $destinationStationId = $request->input('destination_station_id');
        $trips = Trip::whereHas('stations', function (Builder $query) use ($startStationId) {
            $query->where('stations.id', $startStationId);
        })
            ->whereHas('stations', function (Builder $query) use ($destinationStationId) {
                $query->where('stations.id', $destinationStationId);
            })
            ->get();


        $seats = [];
        foreach ($trips as $trip) {
            if ($trip instanceOf Trip) {
                $startStationOrder = StationsTrip::where('trip_id', $trip->id)
                    ->where('station_id', $startStationId)->first()->station_order;

//                dd($startOrder->);
                $destinationStationOrder = StationsTrip::where('trip_id', $trip->id)
                    ->where('station_id', $destinationStationId)->first()->station_order;


                if ($startStationOrder < $destinationStationOrder) {
                    $tripSeats = $trip->bus()->first()->seats()
                        ->doesntHave('bookings')
//
                        ->orWhereHas('bookings.start.trips', function (Builder $query) use ($destinationStationOrder, $trip) {
                            $query->where('stations_trips.station_order', '>=', $destinationStationOrder)
                            ->where('stations_trips.trip_id', $trip->id);
                        })
                        ->orWhereHas('bookings.destination.trips', function (Builder $query) use ($startStationOrder, $trip) {
                            $query->where('stations_trips.station_order', '<=', $startStationOrder)
                                ->where('stations_trips.trip_id', $trip->id);
                        })->get();



                    array_push($seats, $tripSeats);
                }
            }
        }


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
