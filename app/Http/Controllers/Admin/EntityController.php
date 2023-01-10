<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Entity\BulkDestroyEntity;
use App\Http\Requests\Admin\Entity\DestroyEntity;
use App\Http\Requests\Admin\Entity\IndexEntity;
use App\Http\Requests\Admin\Entity\StoreEntity;
use App\Http\Requests\Admin\Entity\UpdateEntity;
use App\Models\Entity;
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
class EntityController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexEntity $request
     * @return array|Factory|View
     */
    public function index(IndexEntity $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Entity::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['code', 'name'],

            // set columns to searchIn
            ['id', 'code', 'name']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }
        $contador = Counter::all()->where('route','admin.entity.index')->all();
        //$val; use App\Models\Counter;
        if ( sizeOf($contador)==0 ){
            $val = new Counter();
            $val->route='admin.entity.index';
            $val->contador = 1;
            $val->save();
        }else{
            $val = reset($contador);
            $val->contador = $val->contador + 1;
            $val->save();
        }//'val' => $val

        return view('admin.entity.index', ['data' => $data,'val' => $val]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.entity.create');
        $contador = Counter::all()->where('route','admin.entity.create')->all();
        //$val; use App\Models\Counter;
        if ( sizeOf($contador)==0 ){
            $val = new Counter();
            $val->route='admin.entity.create';
            $val->contador = 1;
            $val->save();
        }else{
            $val = reset($contador);
            $val->contador = $val->contador + 1;
            $val->save();
        }//'val' => $val

        return view('admin.entity.create',['val' => $val]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEntity $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreEntity $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Entity
        $entity = Entity::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/entities'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/entities');
    }

    /**
     * Display the specified resource.
     *
     * @param Entity $entity
     * @throws AuthorizationException
     * @return void
     */
    public function show(Entity $entity)
    {
        $this->authorize('admin.entity.show', $entity);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Entity $entity
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Entity $entity)
    {
        $this->authorize('admin.entity.edit', $entity);
        $contador = Counter::all()->where('route','admin.entity.edit')->all();
        //$val; use App\Models\Counter;
        if ( sizeOf($contador)==0 ){
            $val = new Counter();
            $val->route='admin.entity.edit';
            $val->contador = 1;
            $val->save();
        }else{
            $val = reset($contador);
            $val->contador = $val->contador + 1;
            $val->save();
        }//'val' => $val

        return view('admin.entity.edit', [
            'entity' => $entity,
            'val' => $val,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEntity $request
     * @param Entity $entity
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateEntity $request, Entity $entity)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Entity
        $entity->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/entities'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/entities');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyEntity $request
     * @param Entity $entity
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyEntity $request, Entity $entity)
    {
        $entity->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyEntity $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyEntity $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Entity::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
