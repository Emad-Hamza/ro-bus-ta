<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Seat;
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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $startStationId = $request->input('start_station_id');
         $startStation = Station::find($startStationId);
         $destinationStationId = $request->input('destination_station_id');
         $destinationStation = Station::find($destinationStationId);
         $stationsIds = [$startStationId, $destinationStationId];
        $trips = Trip::whereHas('stations', function (Builder $query) use($startStationId) {
            $query->where('stations.id', $startStationId);
        })
        ->whereHas('stations', function (Builder $query) use($destinationStationId) {
            $query->where('stations.id', $destinationStationId);
        })
        ->get();

        $seats = [];
        foreach($trips as $trip)
        {
            if($trip instanceOf Trip){

                // dd($trip->stations()->get());
                // $destinationOrder = ;
                $query = $trip->bus()->first()->seats()
                ->with('bookings')
                ->whereHas('bookings', function (Builder $query) use($destinationStation) {
                    $query->with('start')
                    ->where('start.order', '>', 2);
                    
                })
                

                // ->with('bookings.destination')
                // ->where('bookings.start.id', '=', 0)
                // ->where(function ($query) use ($startStation, $destinationStation) {
                        // $query->where('bookings.destination.order', '=<', $startStation->order)
                        // ->orWhere('bookings.start.order', '=>', $destinationStation->order)
                        // ;
                    // })
                
                ;
                
                // dd($query->get());
                
                array_push($seats, $trip->bus()->first()->seats()->getQuery());
            }
        }



        
        return $seats;
        $seats = Seat::where('bus_id', 2)->get();
        return $seats;
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
     * @param  \App\Models\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function show(Seat $seat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seat $seat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seat $seat)
    {
        //
    }

    
}
