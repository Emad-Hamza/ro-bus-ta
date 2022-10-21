<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Seat;
use App\Models\Station;
use App\Models\Trip;
use App\Service\SeatService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Seats booking
     * @OA\Post(
     *     path="/bookings/book",
     *     tags={"booking"},
     *     summary="Books a seat in a certain trip",
     *     security={ {"sanctum": {} }},
     *     @OA\RequestBody(
     *         required=true,
     *     @OA\JsonContent(
     *          @OA\Property(property="trip_id", type="integer",example="2"),
     *          @OA\Property(property="seat_id", type="integer",example="3"),
     *          @OA\Property(property="start_station_id", type="integer",example="3"),
     *          @OA\Property(property="destination_station_id", type="integer",example="3"),
     *     )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Returns a success message",
     *     @OA\JsonContent(
     *          @OA\Property(property="booking_id", type="integer"),
     *          @OA\Property(property="trip_id", type="integer"),
     *          @OA\Property(property="user_id", type="integer"),
     *          @OA\Property(property="seat_id", type="integer"),
     *          @OA\Property(property="start_id", type="integer"),
     *          @OA\Property(property="destination_id", type="integer"),
     *          @OA\Property(property="created_at", type="datetime"),
     *          @OA\Property(property="updated_at", type="datetime"),
     *     )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Returns a error message",
     *     @OA\JsonContent(
     *          @OA\Property(property="message", type="string",example="The provided credentials are incorrect."),
     *     )
     *     ),
     * )
     *
     *
     *
     */
    public function book(Request $request, SeatService $seatService)
    {

        $request->validate([
            'trip_id' => 'required|integer',
            'seat_id' => 'required|integer',
            'start_station_id' => 'required|integer',
            'destination_station_id' => 'required|integer',
        ]);

        $trip = Trip::find($request->input('trip_id'));
        $seat = Seat::find($request->input('seat_id'));
        $start = Station::find($request->input('start_station_id'));
        $destination = Station::find($request->input('destination_station_id'));

        $validTripsSeats = $seatService->getValidSeats($request->input('start_station_id'), $request->input('destination_station_id'));
//        return $seats;
//        dd($seats);

        $tripObjectWithValidSeats = null;
        foreach ($validTripsSeats as $validTripsSeat) {
            if ($validTripsSeat['trip_id'] == $request->input('trip_id')) {
                $tripObjectWithValidSeats = $validTripsSeat;
            }
        }

//        if ($tripObjectWithValidSeats)


        if ($tripObjectWithValidSeats) {
            $validSeats = $tripObjectWithValidSeats['trip_seats'];
            if ($trip instanceOf Trip
                && $seat instanceOf Seat
                && $start instanceOf Station
                && $destination instanceof Station) {
                if ($trip->bus()->first() == $seat->bus()->first()
                    && in_array($seat, $validSeats)
                ) {
                    $booking = new Booking();
                    $booking->user_id = auth()->user()->id;
                    $booking->trip_id = $trip->id;
                    $booking->seat_id = $seat->id;
                    $booking->start_id = $start->id;
                    $booking->destination_id = $destination->id;
                    $booking->save();
                }
                return $booking;
            }
            return new JsonResponse(['message' => 'there no valid seats for the selected criteria.'], 400);
        }
        return new JsonResponse(['message' => 'there no valid seats for the selected criteria.'], 400);

    }

}
