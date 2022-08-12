<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Minute\BulkDestroyMinute;
use App\Http\Requests\Admin\Minute\DestroyMinute;
use App\Http\Requests\Admin\Minute\IndexMinute;
use App\Http\Requests\Admin\Minute\StoreMinute;
use App\Http\Requests\Admin\Minute\UpdateMinute;
use App\Models\Minute;
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

class MinuteController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexMinute $request
     * @return array|Factory|View
     */
    public function index(IndexMinute $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Minute::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'no_request'],

            // set columns to searchIn
            ['id', 'no_request']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.minute.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.minute.create');

        return view('admin.minute.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMinute $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreMinute $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Minute
        $minute = Minute::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/minutes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/minutes');
    }

    /**
     * Display the specified resource.
     *
     * @param Minute $minute
     * @throws AuthorizationException
     * @return void
     */
    public function show(Minute $minute)
    {
        $this->authorize('admin.minute.show', $minute);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Minute $minute
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Minute $minute)
    {
        $this->authorize('admin.minute.edit', $minute);


        return view('admin.minute.edit', [
            'minute' => $minute,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMinute $request
     * @param Minute $minute
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateMinute $request, Minute $minute)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Minute
        $minute->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/minutes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/minutes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyMinute $request
     * @param Minute $minute
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyMinute $request, Minute $minute)
    {
        $minute->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyMinute $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyMinute $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Minute::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
