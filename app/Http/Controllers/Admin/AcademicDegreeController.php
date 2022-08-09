<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AcademicDegree\BulkDestroyAcademicDegree;
use App\Http\Requests\Admin\AcademicDegree\DestroyAcademicDegree;
use App\Http\Requests\Admin\AcademicDegree\IndexAcademicDegree;
use App\Http\Requests\Admin\AcademicDegree\StoreAcademicDegree;
use App\Http\Requests\Admin\AcademicDegree\UpdateAcademicDegree;
use App\Models\AcademicDegree;
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

class AcademicDegreeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexAcademicDegree $request
     * @return array|Factory|View
     */
    public function index(IndexAcademicDegree $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(AcademicDegree::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'id_entity', 'id_type', 'name'],

            // set columns to searchIn
            ['id', 'id_entity', 'name']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.academic-degree.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.academic-degree.create');

        return view('admin.academic-degree.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAcademicDegree $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreAcademicDegree $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the AcademicDegree
        $academicDegree = AcademicDegree::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/academic-degrees'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/academic-degrees');
    }

    /**
     * Display the specified resource.
     *
     * @param AcademicDegree $academicDegree
     * @throws AuthorizationException
     * @return void
     */
    public function show(AcademicDegree $academicDegree)
    {
        $this->authorize('admin.academic-degree.show', $academicDegree);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param AcademicDegree $academicDegree
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(AcademicDegree $academicDegree)
    {
        $this->authorize('admin.academic-degree.edit', $academicDegree);


        return view('admin.academic-degree.edit', [
            'academicDegree' => $academicDegree,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAcademicDegree $request
     * @param AcademicDegree $academicDegree
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateAcademicDegree $request, AcademicDegree $academicDegree)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values AcademicDegree
        $academicDegree->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/academic-degrees'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/academic-degrees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyAcademicDegree $request
     * @param AcademicDegree $academicDegree
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyAcademicDegree $request, AcademicDegree $academicDegree)
    {
        $academicDegree->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyAcademicDegree $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyAcademicDegree $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    AcademicDegree::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
