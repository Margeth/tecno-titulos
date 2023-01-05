<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProcedureRequest\BulkDestroyProcedureRequest;
use App\Http\Requests\Admin\ProcedureRequest\DestroyProcedureRequest;
use App\Http\Requests\Admin\ProcedureRequest\IndexProcedureRequest;
use App\Http\Requests\Admin\ProcedureRequest\StoreProcedureRequest;
use App\Http\Requests\Admin\ProcedureRequest\UpdateProcedureRequest;
use App\Models\ProcedureRequest;
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
use App\Models\AcademicDegree;
use App\Models\RequestState;
use Brackets\AdminAuth\Models\AdminUser;
use App\Models\ModelHasRole;
use App\Models\Role;
use GuzzleHttp\Psr7\Request;
use App\Models\Counter;

class ProcedureRequestController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexProcedureRequest $request
     * @return array|Factory|View
     */
    public function index(IndexProcedureRequest $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(ProcedureRequest::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'no_request', 'id_academic_degree', 'id_request_state', 'user_student', 'user_transcriber'],

            // set columns to searchIn
            ['id', 'no_request', 'id_academic_degree', 'id_request_state', 'user_student', 'user_transcriber']
        );

        $data2=AcademicDegree::all();
        $data3=RequestState::all();
        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }
        $contador = Counter::all()->where('route','admin.procedure-request.index')->all();
        $val;
        if ( sizeOf($contador)==0 ){
            $val = new Counter();
            $val->route='admin.procedure-request.index';
            $val->contador = 1;
            $val->save();
        }else{
            $val = reset($contador);
            $val->contador = $val->contador + 1;
            $val->save();
        }
        return view('admin.procedure-request.index', ['data' => $data,'data2' => $data2,'data3' => $data3,'val'=>$val]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.procedure-request.create');
        $data2=AcademicDegree::all();
        $data3=RequestState::all();
        $contador = Counter::all()->where('route','admin.procedure-request.create')->all();
        $val;
        if ( sizeOf($contador)==0 ){
            $val = new Counter();
            $val->route='admin.procedure-request.create';
            $val->contador = 1;
            $val->save();
        }else{
            $val = reset($contador);
            $val->contador = $val->contador + 1;
            $val->save();
        }
        return view('admin.procedure-request.create',compact('data2','data3','val'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProcedureRequest $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreProcedureRequest $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the ProcedureRequest
        $procedureRequest = ProcedureRequest::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/procedure-requests'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/procedure-requests');
    }

    /**
     * Display the specified resource.
     *
     * @param ProcedureRequest $procedureRequest
     * @throws AuthorizationException
     * @return void
     */
    public function show(ProcedureRequest $procedureRequest)
    {
        $this->authorize('admin.procedure-request.show', $procedureRequest);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ProcedureRequest $procedureRequest
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(ProcedureRequest $procedureRequest)
    {
        $this->authorize('admin.procedure-request.edit', $procedureRequest);
        $data2=AcademicDegree::all();
        $data3=RequestState::all();

        $contador = Counter::all()->where('route','admin.procedure-request.edit')->all();
        $val;
        if ( sizeOf($contador)==0 ){
            $val = new Counter();
            $val->route='admin.procedure-request.edit';
            $val->contador = 1;
            $val->save();
        }else{
            $val = reset($contador);
            $val->contador = $val->contador + 1;
            $val->save();
        }

        return view('admin.procedure-request.edit', [
            'procedureRequest' => $procedureRequest,
            'data2' => $data2 ,
            'data3' => $data3 ,
            'val' => $val
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProcedureRequest $request
     * @param ProcedureRequest $procedureRequest
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateProcedureRequest $request, ProcedureRequest $procedureRequest)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values ProcedureRequest
        $procedureRequest->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/procedure-requests'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/procedure-requests');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyProcedureRequest $request
     * @param ProcedureRequest $procedureRequest
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyProcedureRequest $request, ProcedureRequest $procedureRequest)
    {
        $procedureRequest->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyProcedureRequest $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyProcedureRequest $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    ProcedureRequest::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
