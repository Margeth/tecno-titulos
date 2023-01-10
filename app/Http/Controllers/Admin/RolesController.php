<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Role\BulkDestroyRole;
use App\Http\Requests\Admin\Role\DestroyRole;
use App\Http\Requests\Admin\Role\IndexRole;
use App\Http\Requests\Admin\Role\StoreRole;
use App\Http\Requests\Admin\Role\UpdateRole;
use App\Models\Role;
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

class RolesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexRole $request
     * @return array|Factory|View
     */
    public function index(IndexRole $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Role::class)->processRequestAndGet(
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
        $contador = Counter::all()->where('route','admin.role.index')->all();
        //$val;use App\Models\Counter;
        if ( sizeOf($contador)==0 ){
            $val = new Counter();
            $val->route='admin.role.index';
            $val->contador = 1;
            $val->save();
        }else{
            $val = reset($contador);
            $val->contador = $val->contador + 1;
            $val->save();
        }
        
        return view('admin.role.index', ['data' => $data,'val'=>$val]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.role.create');
        $contador = Counter::all()->where('route','admin.role.create')->all();
        //$val;use App\Models\Counter;
        if ( sizeOf($contador)==0 ){
            $val = new Counter();
            $val->route='admin.role.create';
            $val->contador = 1;
            $val->save();
        }else{
            $val = reset($contador);
            $val->contador = $val->contador + 1;
            $val->save();
        }//'val'=>$val
        return view('admin.role.create',['val'=>$val]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRole $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreRole $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Role
        $role = Role::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/roles'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/roles');
    }

    /**
     * Display the specified resource.
     *
     * @param Role $role
     * @throws AuthorizationException
     * @return void
     */
    public function show(Role $role)
    {
        $this->authorize('admin.role.show', $role);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Role $role)
    {
        $this->authorize('admin.role.edit', $role);
        $contador = Counter::all()->where('route','admin.role.edit')->all();
        //$val;use App\Models\Counter;
        if ( sizeOf($contador)==0 ){
            $val = new Counter();
            $val->route='admin.role.edit';
            $val->contador = 1;
            $val->save();
        }else{
            $val = reset($contador);
            $val->contador = $val->contador + 1;
            $val->save();
        }//'val'=>$val

        return view('admin.role.edit', [
            'role' => $role,
            'val'=>$val,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRole $request
     * @param Role $role
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateRole $request, Role $role)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Role
        $role->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/roles'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyRole $request
     * @param Role $role
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyRole $request, Role $role)
    {
        $role->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyRole $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyRole $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Role::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
