<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Seat\BulkDestroySeat;
use App\Http\Requests\Admin\Seat\DestroySeat;
use App\Http\Requests\Admin\Seat\IndexSeat;
use App\Http\Requests\Admin\Seat\StoreSeat;
use App\Http\Requests\Admin\Seat\UpdateSeat;
use App\Models\Seat;
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

class SeatsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexSeat $request
     * @return array|Factory|View
     */
    public function index(IndexSeat $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Seat::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['bus_id', 'id'],

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

        return view('admin.seat.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.seat.create');

        return view('admin.seat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSeat $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreSeat $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Seat
        $seat = Seat::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/seats'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/seats');
    }

    /**
     * Display the specified resource.
     *
     * @param Seat $seat
     * @throws AuthorizationException
     * @return void
     */
    public function show(Seat $seat)
    {
        $this->authorize('admin.seat.show', $seat);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Seat $seat
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Seat $seat)
    {
        $this->authorize('admin.seat.edit', $seat);


        return view('admin.seat.edit', [
            'seat' => $seat,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSeat $request
     * @param Seat $seat
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateSeat $request, Seat $seat)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Seat
        $seat->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/seats'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/seats');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroySeat $request
     * @param Seat $seat
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroySeat $request, Seat $seat)
    {
        $seat->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroySeat $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroySeat $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Seat::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
