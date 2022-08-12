<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Stat\BulkDestroyStat;
use App\Http\Requests\Admin\Stat\DestroyStat;
use App\Http\Requests\Admin\Stat\IndexStat;
use App\Http\Requests\Admin\Stat\StoreStat;
use App\Http\Requests\Admin\Stat\UpdateStat;
use App\Models\Stat;
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

class StatsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexStat $request
     * @return array|Factory|View
     */
    public function index(IndexStat $request)
    {
        // create and AdminListing instance for a specific model and
        /*$data = AdminListing::create(Stat::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'page_name', 'count'],

            // set columns to searchIn
            ['id', 'page_name']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }*/

        $groups = DB::table('stats')->get();
        $name = DB::table('stats')->pluck('page_name');
        $count = DB::table('stats')->pluck('count');
// Generate random colours for the groups
        for ($i=0; $i<=count($name); $i++) {
            $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 3);
        }
// Prepare the data for returning with the view
        $chart = new Stat();
        $chart->labels = $name;
        $chart->dataset = $count;
        $chart->colours = $colours;
        return view('admin.stat.index', compact('chart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.stat.create');

        return view('admin.stat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreStat $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreStat $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Stat
        $stat = Stat::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/stats'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/stats');
    }

    /**
     * Display the specified resource.
     *
     * @param Stat $stat
     * @throws AuthorizationException
     * @return void
     */
    public function show(Stat $stat)
    {
        $this->authorize('admin.stat.show', $stat);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Stat $stat
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Stat $stat)
    {
        $this->authorize('admin.stat.edit', $stat);


        return view('admin.stat.edit', [
            'stat' => $stat,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateStat $request
     * @param Stat $stat
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateStat $request, Stat $stat)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Stat
        $stat->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/stats'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/stats');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyStat $request
     * @param Stat $stat
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyStat $request, Stat $stat)
    {
        $stat->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyStat $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyStat $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Stat::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
