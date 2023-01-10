<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Stat\IndexStat;
use App\Models\Stat;
use App\Models\ProcedureRequest;
use Carbon\Carbon;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Counter;

class StatsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexStat $request
     * @return array|Factory|View
     */
    public function index()
    {
        /*
 DB::table('table2')
->join('table1', 'table2.rif', '=', 'table1.rif')
->select(DB::raw('count(*) as count'), 'table1.category as category')
->groupBy('category')
->get();
 * */
        $collecion = DB::table('procedure_request')
            ->join('request_state', 'procedure_request.id_request_state', '=', 'request_state.id')
            ->select('name', DB::raw('count(*) as quantity'))
            ->groupBy('name')
            ->pluck('quantity', 'name')->all();

        /*$name = DB::table('procedure_request')
            ->join('request_state','request_state.id', '=',  'id_request_state')
            ->groupBy('request_state.name')
            ->count('quantity')
            ->get(['request_state.name', 'quantity'])->pluck('request_state.name');

        $count = DB::table('procedure_request')
            ->join('request_state','request_state.id', '=',  'id_request_state')
            ->groupBy('request_state.name')
            ->get(['request_state.name', 'count(*) as quantity'])->pluck('quantity');*/

// Generate random colours for the groups
        for ($i=0; $i<=count($collecion); $i++) {
            $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 3);
        }
// Prepare the data for returning with the view
        $chart = new Stat();
        $chart->labels = (array_keys($collecion));
        $chart->dataset = (array_values($collecion));
        $chart->colours = $colours;


        $contador = Counter::all()->where('route','admin.stat.index')->all();
        //$val;use App\Models\Counter;
        if ( sizeOf($contador)==0 ){
            $val = new Counter();
            $val->route='admin.stat.index';
            $val->contador = 1;
            $val->save();
        }else{
            $val = reset($contador);
            $val->contador = $val->contador + 1;
            $val->save();
        }//'val'=>$val
        return view('admin.stat.index', compact('chart'),['val'=>$val]);
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


}
