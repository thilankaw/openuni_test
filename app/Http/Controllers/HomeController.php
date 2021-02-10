<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\JobOpportunitie;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $user = auth()->user();
        $userId = $user->id;
        $userEmail = $user->email;
        $data['user_email'] = $userEmail;

        $allReadyApply = DB::table('applicants')
                        ->join('job_opportunities', 'applicants.job_id', '=', 'job_opportunities.id')
                        ->select('job_opportunities.id', 'job_opportunities.name','applicants.id AS apply_id')
                        ->where('applicants.user_id', $userId)
                        ->get();
        //$allReadyApply = $allReadyApply->toArray();

        /*$allReadyApply = array_map(function ($value) {
            return (array)$value;
        }, $allReadyApply);*/

        //$notApply = JobOpportunitie::select('job_opportunities.id', 'job_opportunities.name')->whereNotIn('id', [$allReadyApply[0]['id'],$allReadyApply[1]['id']])->get();
        /*var_dump($notApply);
        die();*/
        
        /*if (!$allReadyApply->isEmpty()) { 
            $jobOp = JobOpportunitie::all();
        
            $data['jobOp'] = $jobOp;
        }else{
            $notApply = JobOpportunitie::select('job_opportunities.id', 'job_opportunities.name')->whereNotIn('id', [$allReadyApply])->get();
            var_dump($notApply);
            die();
        }*/
        $jobOp = JobOpportunitie::all();
        
            $data['jobOp'] = $jobOp;
        
        
        $applyDetails = DB::table('job_opportunities')
            ->join('applicants', 'job_opportunities.id', '=', 'applicants.job_id')
            ->select('job_opportunities.id', 'applicants.id AS apply_id')
            ->where('applicants.user_id', $userId)
            ->get();

        
        $data['applyJobId'] = $applyDetails;
        return view('home', $data);
    }
}
