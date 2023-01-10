<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Permission\BulkDestroyPermission;
use App\Http\Requests\Admin\Permission\DestroyPermission;
use App\Http\Requests\Admin\Permission\IndexPermission;
use App\Http\Requests\Admin\Permission\StorePermission;
use App\Http\Requests\Admin\Permission\UpdatePermission;
use App\Models\Permission;
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
use App\Models\Counter;

class PermissionsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPermission $request
     * @return array|Factory|View
     */
    public function index(IndexPermission $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Permission::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name', 'guard_name'],

            // set columns to searchIn
            ['id', 'name', 'guard_name']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }
        $contador = Counter::all()->where('route','admin.permission.index')->all();
        //$val;use App\Models\Counter;
        if ( sizeOf($contador)==0 ){
            $val = new Counter();
            $val->route='admin.permission.index';
            $val->contador = 1;
            $val->save();
        }else{
            $val = reset($contador);
            $val->contador = $val->contador + 1;
            $val->save();
        }//'data' => $data
        return view('admin.permission.index', ['data' => $data,'val' => $val]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.permission.create');
        $contador = Counter::all()->where('route','admin.permission.create')->all();
        //$val;use App\Models\Counter;
        if ( sizeOf($contador)==0 ){
            $val = new Counter();
            $val->route='admin.permission.create';
            $val->contador = 1;
            $val->save();
        }else{
            $val = reset($contador);
            $val->contador = $val->contador + 1;
            $val->save();
        }//'val' => $val
        return view('admin.permission.create',['val' => $val]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePermission $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePermission $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Permission
        $permission = Permission::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/permissions'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/permissions');
    }

    /**
     * Display the specified resource.
     *
     * @param Permission $permission
     * @throws AuthorizationException
     * @return void
     */
    public function show(Permission $permission)
    {
        $this->authorize('admin.permission.show', $permission);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Permission $permission
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Permission $permission)
    {
        $this->authorize('admin.permission.edit', $permission);
        $contador = Counter::all()->where('route','admin.permission.edit')->all();
        //$val;use App\Models\Counter;
        if ( sizeOf($contador)==0 ){
            $val = new Counter();
            $val->route='admin.permission.edit';
            $val->contador = 1;
            $val->save();
        }else{
            $val = reset($contador);
            $val->contador = $val->contador + 1;
            $val->save();
        }//'val' => $val

        return view('admin.permission.edit', [
            'permission' => $permission,
            'val' => $val,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePermission $request
     * @param Permission $permission
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePermission $request, Permission $permission)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Permission
        $permission->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/permissions'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/permissions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPermission $request
     * @param Permission $permission
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPermission $request, Permission $permission)
    {
        $permission->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPermission $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPermission $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Permission::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
