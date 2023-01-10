<?php

namespace Brackets\AdminAuth\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Inspiring;
use Illuminate\View\View;
use App\Models\Counter;
class AdminHomepageController extends Controller
{
    /**
     * Display default admin home page
     *
     * @return Factory|View
     */
    public function index()
    {  $contador = Counter::all()->where('route','brackets/admin-auth::admin.homepage.index')->all();
        //$val;
        if ( sizeOf($contador)==0 ){
            $val = new Counter();
            $val->route='brackets/admin-auth::admin.homepage.index';
            $val->contador = 1;
            $val->save();
        }else{
            $val = reset($contador);
            $val->contador = $val->contador + 1;
            $val->save();
        }//'val'=>$val
        return view('brackets/admin-auth::admin.homepage.index', [
            'inspiration' => Inspiring::quote(),
            'val'=>$val
        ]);
    }
}
