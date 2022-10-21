<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10/21/2022
 * Time: 3:49 AM
 */

namespace App\Service;


use App\Models\Trip;
use App\Models\StationsTrip;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class SeatService
{

    public function getValidSeats($startStationId, $destinationStationId)
    {
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

                    array_push($seats,
                        [
                            'trip_id' => $trip->id,
                            'trip_name' => $trip->name,
                            'trip_seats' => $tripSeats->all(),
                            'trip_stations' => $trip->stations()->get()
                        ]);
                }
            }
        }


        return $seats;
    }
}