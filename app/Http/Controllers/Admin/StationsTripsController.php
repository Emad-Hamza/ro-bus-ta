<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StationsTrip\BulkDestroyStationsTrip;
use App\Http\Requests\Admin\StationsTrip\DestroyStationsTrip;
use App\Http\Requests\Admin\StationsTrip\IndexStationsTrip;
use App\Http\Requests\Admin\StationsTrip\StoreStationsTrip;
use App\Http\Requests\Admin\StationsTrip\UpdateStationsTrip;
use App\Models\StationsTrip;
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

class StationsTripsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexStationsTrip $request
     * @return array|Factory|View
     */
    public function index(IndexStationsTrip $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(StationsTrip::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['trip_id', 'station_id', 'station_order'],

            // set columns to searchIn
            [''],
            function ($query) use ($request) {                      
    
                // add this line if you want to search by tags attributes
                $query->leftJoin('stations', 'stations.id', '=', 'stations_trips.station_id')
                ->leftJoin('trips', 'trips.id', '=', 'stations_trips.trip_id')
                ->select('stations_trips.*', 'stations.name  as station_name',
                'trips.name  as trip_name')
                ;
            }
    
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.stations-trip.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.stations-trip.create');

        return view('admin.stations-trip.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreStationsTrip $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreStationsTrip $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the StationsTrip
        $stationsTrip = StationsTrip::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/stations-trips'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/stations-trips');
    }

    /**
     * Display the specified resource.
     *
     * @param StationsTrip $stationsTrip
     * @throws AuthorizationException
     * @return void
     */
    public function show(StationsTrip $stationsTrip)
    {
        $this->authorize('admin.stations-trip.show', $stationsTrip);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param StationsTrip $stationsTrip
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(StationsTrip $stationsTrip)
    {
        $this->authorize('admin.stations-trip.edit', $stationsTrip);


        return view('admin.stations-trip.edit', [
            'stationsTrip' => $stationsTrip,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateStationsTrip $request
     * @param StationsTrip $stationsTrip
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateStationsTrip $request, StationsTrip $stationsTrip)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values StationsTrip
        $stationsTrip->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/stations-trips'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/stations-trips');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyStationsTrip $request
     * @param StationsTrip $stationsTrip
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyStationsTrip $request, StationsTrip $stationsTrip)
    {
        $stationsTrip->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyStationsTrip $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyStationsTrip $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    StationsTrip::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
