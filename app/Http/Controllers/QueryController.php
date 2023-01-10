<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Brackets\AdminAuth\Models\AdminUser;
use App\Models\Signer;
use App\Models\StepSigner;
use App\Models\Minute;
use App\Models\ProcedureRequest;
use App\Models\AcademicDegree;
class QueryController extends Controller
{
    function queryRes(Request $request){
        $result = AdminUser::all()->where('code',$request->code)->first();
        if ($result != null){
            $data = $result->code;
            $result = ProcedureRequest::all()->where('user_student',$data);
            $minutes = Minute::all();
            $procedureRequest =ProcedureRequest::all();
            $academicDegree = AcademicDegree::all();
            $step = StepSigner::all();
            $signer = Signer::all();
            return view('query_result',compact('result','step','signer','minutes','procedureRequest','academicDegree'));
        }else{
            $result=[];
            return view('query_result',compact('result'));
        }
        
    }
}
