<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Station\BulkDestroyStation;
use App\Http\Requests\Admin\Station\DestroyStation;
use App\Http\Requests\Admin\Station\IndexStation;
use App\Http\Requests\Admin\Station\StoreStation;
use App\Http\Requests\Admin\Station\UpdateStation;
use App\Models\Station;
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

class StationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexStation $request
     * @return array|Factory|View
     */
    public function index(IndexStation $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Station::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            [''],

            // set columns to searchIn
            ['']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.station.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.station.create');

        return view('admin.station.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreStation $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreStation $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Station
        $station = Station::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/stations'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/stations');
    }

    /**
     * Display the specified resource.
     *
     * @param Station $station
     * @throws AuthorizationException
     * @return void
     */
    public function show(Station $station)
    {
        $this->authorize('admin.station.show', $station);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Station $station
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Station $station)
    {
        $this->authorize('admin.station.edit', $station);


        return view('admin.station.edit', [
            'station' => $station,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateStation $request
     * @param Station $station
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateStation $request, Station $station)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Station
        $station->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/stations'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/stations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyStation $request
     * @param Station $station
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyStation $request, Station $station)
    {
        $station->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyStation $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyStation $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Station::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
