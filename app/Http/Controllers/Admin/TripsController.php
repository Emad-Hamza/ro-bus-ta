<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Trip\BulkDestroyTrip;
use App\Http\Requests\Admin\Trip\DestroyTrip;
use App\Http\Requests\Admin\Trip\IndexTrip;
use App\Http\Requests\Admin\Trip\StoreTrip;
use App\Http\Requests\Admin\Trip\UpdateTrip;
use App\Models\Trip;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TripsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTrip $request
     * @return array|Factory|View
     */
    public function index(IndexTrip $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Trip::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['bus_id', 'destination_id', 'id', 'parent_trip_id', 'start_id'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.trip.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.trip.create');

        return view('admin.trip.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTrip $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTrip $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Trip
        $trip = Trip::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/trips'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/trips');
    }

    /**
     * Display the specified resource.
     *
     * @param Trip $trip
     * @throws AuthorizationException
     * @return void
     */
    public function show(Trip $trip)
    {
        $this->authorize('admin.trip.show', $trip);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Trip $trip
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Trip $trip)
    {
        $this->authorize('admin.trip.edit', $trip);


        return view('admin.trip.edit', [
            'trip' => $trip,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTrip $request
     * @param Trip $trip
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTrip $request, Trip $trip)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Trip
        $trip->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/trips'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/trips');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTrip $request
     * @param Trip $trip
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTrip $request, Trip $trip)
    {
        $trip->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTrip $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTrip $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Trip::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
