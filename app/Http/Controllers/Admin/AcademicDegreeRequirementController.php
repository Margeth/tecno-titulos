<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AcademicDegreeRequirement\BulkDestroyAcademicDegreeRequirement;
use App\Http\Requests\Admin\AcademicDegreeRequirement\DestroyAcademicDegreeRequirement;
use App\Http\Requests\Admin\AcademicDegreeRequirement\IndexAcademicDegreeRequirement;
use App\Http\Requests\Admin\AcademicDegreeRequirement\StoreAcademicDegreeRequirement;
use App\Http\Requests\Admin\AcademicDegreeRequirement\UpdateAcademicDegreeRequirement;
use App\Models\AcademicDegreeRequirement;
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

class AcademicDegreeRequirementController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexAcademicDegreeRequirement $request
     * @return array|Factory|View
     */
    public function index(IndexAcademicDegreeRequirement $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(AcademicDegreeRequirement::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'id_type_academic_degree', 'id_requirement'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.academic-degree-requirement.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.academic-degree-requirement.create');

        return view('admin.academic-degree-requirement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAcademicDegreeRequirement $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreAcademicDegreeRequirement $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the AcademicDegreeRequirement
        $academicDegreeRequirement = AcademicDegreeRequirement::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/academic-degree-requirements'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/academic-degree-requirements');
    }

    /**
     * Display the specified resource.
     *
     * @param AcademicDegreeRequirement $academicDegreeRequirement
     * @throws AuthorizationException
     * @return void
     */
    public function show(AcademicDegreeRequirement $academicDegreeRequirement)
    {
        $this->authorize('admin.academic-degree-requirement.show', $academicDegreeRequirement);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param AcademicDegreeRequirement $academicDegreeRequirement
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(AcademicDegreeRequirement $academicDegreeRequirement)
    {
        $this->authorize('admin.academic-degree-requirement.edit', $academicDegreeRequirement);


        return view('admin.academic-degree-requirement.edit', [
            'academicDegreeRequirement' => $academicDegreeRequirement,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAcademicDegreeRequirement $request
     * @param AcademicDegreeRequirement $academicDegreeRequirement
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateAcademicDegreeRequirement $request, AcademicDegreeRequirement $academicDegreeRequirement)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values AcademicDegreeRequirement
        $academicDegreeRequirement->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/academic-degree-requirements'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/academic-degree-requirements');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyAcademicDegreeRequirement $request
     * @param AcademicDegreeRequirement $academicDegreeRequirement
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyAcademicDegreeRequirement $request, AcademicDegreeRequirement $academicDegreeRequirement)
    {
        $academicDegreeRequirement->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyAcademicDegreeRequirement $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyAcademicDegreeRequirement $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    AcademicDegreeRequirement::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
