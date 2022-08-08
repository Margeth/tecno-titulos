<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TypeAcademicDegree\BulkDestroyTypeAcademicDegree;
use App\Http\Requests\Admin\TypeAcademicDegree\DestroyTypeAcademicDegree;
use App\Http\Requests\Admin\TypeAcademicDegree\IndexTypeAcademicDegree;
use App\Http\Requests\Admin\TypeAcademicDegree\StoreTypeAcademicDegree;
use App\Http\Requests\Admin\TypeAcademicDegree\UpdateTypeAcademicDegree;
use App\Models\TypeAcademicDegree;
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

class TypeAcademicDegreeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTypeAcademicDegree $request
     * @return array|Factory|View
     */
    public function index(IndexTypeAcademicDegree $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(TypeAcademicDegree::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name'],

            // set columns to searchIn
            ['id', 'name']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.type-academic-degree.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.type-academic-degree.create');

        return view('admin.type-academic-degree.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTypeAcademicDegree $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTypeAcademicDegree $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the TypeAcademicDegree
        $typeAcademicDegree = TypeAcademicDegree::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/type-academic-degrees'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/type-academic-degrees');
    }

    /**
     * Display the specified resource.
     *
     * @param TypeAcademicDegree $typeAcademicDegree
     * @throws AuthorizationException
     * @return void
     */
    public function show(TypeAcademicDegree $typeAcademicDegree)
    {
        $this->authorize('admin.type-academic-degree.show', $typeAcademicDegree);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TypeAcademicDegree $typeAcademicDegree
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(TypeAcademicDegree $typeAcademicDegree)
    {
        $this->authorize('admin.type-academic-degree.edit', $typeAcademicDegree);


        return view('admin.type-academic-degree.edit', [
            'typeAcademicDegree' => $typeAcademicDegree,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTypeAcademicDegree $request
     * @param TypeAcademicDegree $typeAcademicDegree
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTypeAcademicDegree $request, TypeAcademicDegree $typeAcademicDegree)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values TypeAcademicDegree
        $typeAcademicDegree->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/type-academic-degrees'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/type-academic-degrees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTypeAcademicDegree $request
     * @param TypeAcademicDegree $typeAcademicDegree
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTypeAcademicDegree $request, TypeAcademicDegree $typeAcademicDegree)
    {
        $typeAcademicDegree->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTypeAcademicDegree $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTypeAcademicDegree $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    TypeAcademicDegree::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
