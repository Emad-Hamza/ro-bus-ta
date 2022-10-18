<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Bus\BulkDestroyBus;
use App\Http\Requests\Admin\Bus\DestroyBus;
use App\Http\Requests\Admin\Bus\IndexBus;
use App\Http\Requests\Admin\Bus\StoreBus;
use App\Http\Requests\Admin\Bus\UpdateBus;
use App\Models\Bus;
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

class BusesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexBus $request
     * @return array|Factory|View
     */
    public function index(IndexBus $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Bus::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id'],

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

        return view('admin.bus.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.bus.create');

        return view('admin.bus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBus $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreBus $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Bus
        $bu = Bus::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/buses'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/buses');
    }

    /**
     * Display the specified resource.
     *
     * @param Bus $bu
     * @throws AuthorizationException
     * @return void
     */
    public function show(Bus $bu)
    {
        $this->authorize('admin.bus.show', $bu);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Bus $bu
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Bus $bu)
    {
        $this->authorize('admin.bus.edit', $bu);


        return view('admin.bus.edit', [
            'bu' => $bu,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateBus $request
     * @param Bus $bu
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateBus $request, Bus $bu)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Bus
        $bu->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/buses'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/buses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyBus $request
     * @param Bus $bu
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyBus $request, Bus $bu)
    {
        $bu->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyBus $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyBus $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Bus::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
