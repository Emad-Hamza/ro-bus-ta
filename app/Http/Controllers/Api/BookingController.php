<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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


    /**
     * Seats booking
     * @OA\Post(
     *     path="/bookings/book",
     *     tags={"booking"},
     *     summary="Books a seat in a certain trip",
     *
     *     @OA\RequestBody(
     *         required=false,
     *     @OA\JsonContent(
     *          @OA\Property(property="trip_id", type="integer",example="2"),
     *          @OA\Property(property="seat_id", type="integer",example="3"),
     *     )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Returns a success message",
     *     ),
     *
     * )
     *
     *     @OA\Response(
     *         response=401,
     *         description="Returns a error message",
     *     @OA\JsonContent(
     *          @OA\Property(property="message", type="string",example="The provided credentials are incorrect."),
     *     )
     *     ),
     *
     *
     */
    public function book(Request $request)
    {

        return [];
    }

}
