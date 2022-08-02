<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleHasPermission\BulkDestroyRoleHasPermission;
use App\Http\Requests\Admin\RoleHasPermission\DestroyRoleHasPermission;
use App\Http\Requests\Admin\RoleHasPermission\IndexRoleHasPermission;
use App\Http\Requests\Admin\RoleHasPermission\StoreRoleHasPermission;
use App\Http\Requests\Admin\RoleHasPermission\UpdateRoleHasPermission;
use App\Models\RoleHasPermission;
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

class RoleHasPermissionsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexRoleHasPermission $request
     * @return array|Factory|View
     */
    public function index(IndexRoleHasPermission $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(RoleHasPermission::class)->get();

        /*if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }*/

        return view('admin.role-has-permission.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.role-has-permission.create');

        return view('admin.role-has-permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRoleHasPermission $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreRoleHasPermission $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the RoleHasPermission
        $roleHasPermission = RoleHasPermission::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/role-has-permissions'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/role-has-permissions');
    }

    /**
     * Display the specified resource.
     *
     * @param RoleHasPermission $roleHasPermission
     * @throws AuthorizationException
     * @return void
     */
    public function show(RoleHasPermission $roleHasPermission)
    {
        $this->authorize('admin.role-has-permission.show', $roleHasPermission);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param RoleHasPermission $roleHasPermission
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(RoleHasPermission $roleHasPermission)
    {
        $this->authorize('admin.role-has-permission.edit', $roleHasPermission);


        return view('admin.role-has-permission.edit', [
            'roleHasPermission' => $roleHasPermission,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRoleHasPermission $request
     * @param RoleHasPermission $roleHasPermission
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateRoleHasPermission $request, RoleHasPermission $roleHasPermission)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values RoleHasPermission
        $roleHasPermission->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/role-has-permissions'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/role-has-permissions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyRoleHasPermission $request
     * @param RoleHasPermission $roleHasPermission
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyRoleHasPermission $request, RoleHasPermission $roleHasPermission)
    {
        $roleHasPermission->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }
}
