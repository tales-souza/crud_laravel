<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobsController extends Controller
{
    //
    public function index()
    {
        $jobs = Job::with('company')->get();
       // $teste = DB::select('select * from companies');
        //dd($teste);
        return response()->json($jobs);
    }

    public function show($id)
    {
        $job = Job::with('company')->find($id);

        if (!$job) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        return response()->json($job);
    }


    public function store(Request $request)
    {
        $job = new Job();
        $job->fill($request->all());
        $job->save();

        return response()->json($job, 201);
    }


    public function update(Request $request ,$id)
    {
        $job = Job::find($id);

        if(!$job){
            return response()->json([
                'message' => 'Record not found',
            ],404);
        }
    
        $job->fill($request->all());
        $job->save();

        return response()->json($job);


    }


    public function destroy($id)
    {
        $job = Job::find($id);

        if(!$job) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $job->delete();
        return response()->json([
            'message' => 'Registro Excluído'
        ]);
    }
}
