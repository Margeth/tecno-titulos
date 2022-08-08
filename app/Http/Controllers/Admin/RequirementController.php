<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Requirement\BulkDestroyRequirement;
use App\Http\Requests\Admin\Requirement\DestroyRequirement;
use App\Http\Requests\Admin\Requirement\IndexRequirement;
use App\Http\Requests\Admin\Requirement\StoreRequirement;
use App\Http\Requests\Admin\Requirement\UpdateRequirement;
use App\Models\Requirement;
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

class RequirementController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexRequirement $request
     * @return array|Factory|View
     */
    public function index(IndexRequirement $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Requirement::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name', 'quantity', 'observation'],

            // set columns to searchIn
            ['id', 'name', 'observation']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.requirement.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.requirement.create');

        return view('admin.requirement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequirement $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreRequirement $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Requirement
        $requirement = Requirement::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/requirements'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/requirements');
    }

    /**
     * Display the specified resource.
     *
     * @param Requirement $requirement
     * @throws AuthorizationException
     * @return void
     */
    public function show(Requirement $requirement)
    {
        $this->authorize('admin.requirement.show', $requirement);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Requirement $requirement
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Requirement $requirement)
    {
        $this->authorize('admin.requirement.edit', $requirement);


        return view('admin.requirement.edit', [
            'requirement' => $requirement,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequirement $request
     * @param Requirement $requirement
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateRequirement $request, Requirement $requirement)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Requirement
        $requirement->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/requirements'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/requirements');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyRequirement $request
     * @param Requirement $requirement
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyRequirement $request, Requirement $requirement)
    {
        $requirement->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyRequirement $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyRequirement $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Requirement::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
