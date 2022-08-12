<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Signer\BulkDestroySigner;
use App\Http\Requests\Admin\Signer\DestroySigner;
use App\Http\Requests\Admin\Signer\IndexSigner;
use App\Http\Requests\Admin\Signer\StoreSigner;
use App\Http\Requests\Admin\Signer\UpdateSigner;
use App\Models\Signer;
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

class SignerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexSigner $request
     * @return array|Factory|View
     */
    public function index(IndexSigner $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Signer::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'id_minute', 'code_user_academic_degre', 'code', 'id_step', 'is_signed'],

            // set columns to searchIn
            ['id', 'id_minute', 'code_user_academic_degre', 'code', 'id_step', 'is_signed']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.signer.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.signer.create');

        return view('admin.signer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSigner $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreSigner $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Signer
        $signer = Signer::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/signers'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/signers');
    }

    /**
     * Display the specified resource.
     *
     * @param Signer $signer
     * @throws AuthorizationException
     * @return void
     */
    public function show(Signer $signer)
    {
        $this->authorize('admin.signer.show', $signer);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Signer $signer
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Signer $signer)
    {
        $this->authorize('admin.signer.edit', $signer);


        return view('admin.signer.edit', [
            'signer' => $signer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSigner $request
     * @param Signer $signer
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateSigner $request, Signer $signer)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Signer
        $signer->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/signers'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/signers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroySigner $request
     * @param Signer $signer
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroySigner $request, Signer $signer)
    {
        $signer->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroySigner $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroySigner $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Signer::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
