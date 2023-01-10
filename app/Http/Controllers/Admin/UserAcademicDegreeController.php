<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserAcademicDegree\BulkDestroyUserAcademicDegree;
use App\Http\Requests\Admin\UserAcademicDegree\DestroyUserAcademicDegree;
use App\Http\Requests\Admin\UserAcademicDegree\IndexUserAcademicDegree;
use App\Http\Requests\Admin\UserAcademicDegree\StoreUserAcademicDegree;
use App\Http\Requests\Admin\UserAcademicDegree\UpdateUserAcademicDegree;
use App\Models\UserAcademicDegree;
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

class UserAcademicDegreeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexUserAcademicDegree $request
     * @return array|Factory|View
     */
    public function index(IndexUserAcademicDegree $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(UserAcademicDegree::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'no_request', 'code_academic_degree'],

            // set columns to searchIn
            ['id', 'code_academic_degree']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }
        $contador = Counter::all()->where('route','admin.user-academic-degree.index')->all();
        //$val;use App\Models\Counter;
        if ( sizeOf($contador)==0 ){
            $val = new Counter();
            $val->route='admin.user-academic-degree.index';
            $val->contador = 1;
            $val->save();
        }else{
            $val = reset($contador);
            $val->contador = $val->contador + 1;
            $val->save();
        }//'val'=>$val
        return view('admin.user-academic-degree.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.user-academic-degree.create');
        $contador = Counter::all()->where('route','admin.user-academic-degree.create')->all();
        //$val;use App\Models\Counter;
        if ( sizeOf($contador)==0 ){
            $val = new Counter();
            $val->route='admin.user-academic-degree.create';
            $val->contador = 1;
            $val->save();
        }else{
            $val = reset($contador);
            $val->contador = $val->contador + 1;
            $val->save();
        }//'val'=>$val
        return view('admin.user-academic-degree.create',['val'=>$val]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserAcademicDegree $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreUserAcademicDegree $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the UserAcademicDegree
        $userAcademicDegree = UserAcademicDegree::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/user-academic-degrees'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/user-academic-degrees');
    }

    /**
     * Display the specified resource.
     *
     * @param UserAcademicDegree $userAcademicDegree
     * @throws AuthorizationException
     * @return void
     */
    public function show(UserAcademicDegree $userAcademicDegree)
    {
        $this->authorize('admin.user-academic-degree.show', $userAcademicDegree);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param UserAcademicDegree $userAcademicDegree
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(UserAcademicDegree $userAcademicDegree)
    {
        $this->authorize('admin.user-academic-degree.edit', $userAcademicDegree);

        $contador = Counter::all()->where('route','admin.user-academic-degree.edit')->all();
        //$val;use App\Models\Counter;
        if ( sizeOf($contador)==0 ){
            $val = new Counter();
            $val->route='admin.user-academic-degree.edit';
            $val->contador = 1;
            $val->save();
        }else{
            $val = reset($contador);
            $val->contador = $val->contador + 1;
            $val->save();
        }//'val'=>$val
        
        return view('admin.user-academic-degree.edit', [
            'userAcademicDegree' => $userAcademicDegree,
            'val'=>$val,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserAcademicDegree $request
     * @param UserAcademicDegree $userAcademicDegree
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateUserAcademicDegree $request, UserAcademicDegree $userAcademicDegree)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values UserAcademicDegree
        $userAcademicDegree->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/user-academic-degrees'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/user-academic-degrees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyUserAcademicDegree $request
     * @param UserAcademicDegree $userAcademicDegree
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyUserAcademicDegree $request, UserAcademicDegree $userAcademicDegree)
    {
        $userAcademicDegree->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyUserAcademicDegree $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyUserAcademicDegree $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    UserAcademicDegree::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
