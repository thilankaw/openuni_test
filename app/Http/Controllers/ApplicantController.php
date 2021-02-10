<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;
use App\EducationalQualification;
use App\WorkExperience;
use App\JobOpportunitie;
use DB;

class ApplicantController extends Controller
{
    public function index($jobId)
    {
        $user = auth()->user();
        $userId = $user->id;
        $userEmail = $user->email;
        $jobDet = JobOpportunitie::findOrFail($jobId);
        $data['user_id'] = $userId;
        $data['job_id'] = $jobId;
        $data['user_email'] = $userEmail;
        $data['job_det'] = $jobDet;
        return view('application.create', $data);
        
    }

    public function view($jobId)
    {
        $user = auth()->user();
        $userId = $user->id;

        $allReadyApply = DB::table('applicants')
                        ->join('job_opportunities', 'applicants.job_id', '=', 'job_opportunities.id')
                        ->select('job_opportunities.id', 'job_opportunities.name','applicants.id AS apply_id')
                        ->where('applicants.user_id', $userId)
                        ->where('applicants.job_id', $jobId)
                        ->first();
        if (empty($allReadyApply)) {
            $jobOp = JobOpportunitie::findOrFail($jobId);
            $data['allredyApply'] = $allReadyApply;
            $data['jobOp'] = $jobOp;
        
            
         }else{
            $jobOp = JobOpportunitie::findOrFail($jobId);
            $data['allredyApply'] = $allReadyApply;
            $data['jobOp'] = $jobOp;
            /*var_dump($allReadyApply);
            die();*/
         }
         /*var_dump($allReadyApply);
         die();*/
        return view('application.view', $data);
    }

    public function store(Request $request)
    {
        $form = $request->all();
        $applicant = Applicant::create($form);

        $title = $form['title'];
        $class = $form['class'];
        $university = $form['university'];
        $efe_date = $form['efe_date'];
        $countEdu = count($title);

        for ($i = 0; $i < $countEdu; $i++)
        {
            $eduQlifiAdd = new EducationalQualification;
            $eduQlifiAdd->applicant_id = $applicant->id;
            $eduQlifiAdd->title_of_degree_or_certificate = $title[$i]; 
            $eduQlifiAdd->class = $class[$i];
            $eduQlifiAdd->university_name = $university[$i];
            $eduQlifiAdd->date_of_graduation = $efe_date[$i];
            $eduQlifiAdd->save();          
        }

        $company_name = $form['company_name'];
        $possition = $form['possition'];
        $start_date = $form['start_date'];
        $end_date = $form['end_date'];
        $countWork = count($company_name);

        for ($c = 0; $c < $countWork; $c++)
        {
            $workExpAdd = new WorkExperience;
            $workExpAdd->applicant_id = $applicant->id;
            $workExpAdd->company_name = $company_name[$c]; 
            $workExpAdd->position = $possition[$c];
            $workExpAdd->start_date = $start_date[$c];
            $workExpAdd->end_date = $end_date[$c];
            $workExpAdd->save();           
        }

        return redirect()->route('home');

    }


    public function edit($id)
    {
        $applicant = Applicant::findOrFail($id);
        $eduQli = EducationalQualification::where('applicant_id', $id)->get();
        $workExp = WorkExperience::where('applicant_id', $id)->get();

        $data["applicant"] = $applicant;       
        $data['eduQli'] = $eduQli;
        $data["workExp"] = $workExp;
       
                
        return view('application.edit',$data);
    }

    public function update(Request $request)
    {
        $form = $request->all();
        $id = $request->applicant_id;
        $applicant = Applicant::findOrFail($id);
        $applicant->surname = $request->surname;
        $applicant->first_name = $request->first_name;
        $applicant->national_id_no = $request->national_id_no;
        $applicant->mobile_no = $request->mobile_no;
        $applicant->email = $request->email;
        $applicant->age = $request->age;
        $applicant->address = $request->address;
        $applicant->save();
       

        $title = $form['title'];
        $class = $form['class'];
        $university = $form['university'];
        $efe_date = $form['efe_date'];
        $countEdu = count($title);

        $dltEduQli = EducationalQualification::where('applicant_id', $id)->delete();
        //$dltEduQli->delete();

        for ($i = 0; $i < $countEdu; $i++)
        {
            $eduQlifiAdd = new EducationalQualification;
            $eduQlifiAdd->applicant_id = $applicant->id;
            $eduQlifiAdd->title_of_degree_or_certificate = $title[$i]; 
            $eduQlifiAdd->class = $class[$i];
            $eduQlifiAdd->university_name = $university[$i];
            $eduQlifiAdd->date_of_graduation = $efe_date[$i];
            $eduQlifiAdd->save();
            
        }

        $company_name = $form['company_name'];
        $possition = $form['possition'];
        $start_date = $form['start_date'];
        $end_date = $form['end_date'];
        $countWork = count($company_name);

        $dltWorkExp = WorkExperience::where('applicant_id', $id)->delete();
        //$dltWorkExp->delet();

        for ($c = 0; $c < $countWork; $c++)
        {
            $workExpAdd = new WorkExperience;
            $workExpAdd->applicant_id = $applicant->id;
            $workExpAdd->company_name = $company_name[$c]; 
            $workExpAdd->position = $possition[$c];
            $workExpAdd->start_date = $start_date[$c];
            $workExpAdd->end_date = $end_date[$c];
            $workExpAdd->save();
            
        }  
        return redirect()->route('home');

    }
    public function delete($id)
    {
        $dltApplication = Applicant::where('id', $id)->delete();
        $dltEduQli = EducationalQualification::where('applicant_id', $id)->delete();
        $dltWorkExp = WorkExperience::where('applicant_id', $id)->delete();
        return redirect()->route('home');
    }
}
