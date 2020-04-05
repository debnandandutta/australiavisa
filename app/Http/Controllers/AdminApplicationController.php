<?php


namespace App\Http\Controllers;


use App\Application;
use App\Helpers\LogActivity;
use App\ApplicationSecond;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class AdminApplicationController extends Controller

{

    public function saveApplicationSecondStage(Request $request){


        $appId = Application::where('personal_id', $request->personal)->first()->id;
        if($request->status>=1){
            $secondAppId = ApplicationSecond::where('applicant_id', $appId)->first()->id;
            $applicationSecond = ApplicationSecond::find($secondAppId);
        }else{
            $applicationSecond = new ApplicationSecond();
        }

        $applicationSecond->applicant_id = $appId;
        $applicationSecond->full_name = trim(strtoupper($request->full_name));
        $applicationSecond->sir_name = trim(strtoupper($request->sir_name));
        $applicationSecond->first_name = trim(strtoupper($request->first_name));
        $applicationSecond->change_of_passport = $request->change_of_passport;
        $applicationSecond->gender = $request->gender;
        $applicationSecond->dob_month = $request->dob_month;
        $applicationSecond->dob_day = $request->dob_day;
        $applicationSecond->dob_year = $request->dob_year;
        $applicationSecond->country_of_birth = $request->country_of_birth;
        $applicationSecond->nationality = $request->nationality;
        $applicationSecond->passport_number = trim(strtoupper($request->passport_number));
        $applicationSecond->passport_issue_country = $request->passport_issue_country;
        $applicationSecond->passport_issue_authority = $request->passport_issue_authority;
        $applicationSecond->issue_month = $request->issue_month;
        $applicationSecond->issue_day = $request->issue_day;
        $applicationSecond->issue_year = $request->issue_year;
        $applicationSecond->expiry_month = $request->expiry_month;
        $applicationSecond->expiry_day = $request->expiry_day;
        $applicationSecond->expiry_year = $request->expiry_year;
        $applicationSecond->identity_number = $request->identity_number;
        $applicationSecond->another_passport = $request->another_passport;
        $applicationSecond->criminal_conviction = $request->criminal_conviction;



        if($applicationSecond->save()){
            LogActivity::addToLog('Application Saved - Ref -'.$request->reference_number.'Personal Id'. $request->personal);

            $application = Application::find($appId);
            $application->address = $request->address;
            $application->status = 1;
            if($application->save()){
                LogActivity::addToLog('Address Updated - Ref -'.$request->reference_number.'Personal Id'. $request->personal);

               // return redirect()->back()->with('success', ['Application Information Updated']);

                $group = $request->group;
                $nextApplicant = Application::where('group_id', $group)->where('status',0)->first();

                if(is_null($nextApplicant))
                    return redirect('admins/application/'.$group.'/'.$request->personal.'/'.'updated');
                else
                    return redirect('admins/application/'.$group.'/'.$nextApplicant->personal_id.'/'.'updated');

            }

        }
    }
    public function editVisaPaymentNotify(Request $request){
        $request->validate([
            'receipt' => 'mimes:pdf,jpg,jpeg,png,docx|max:2048',
        ]);

        $appId = Application::where('reference_number', $request->reference)->first()->id;
        if($request->hasFile('receipt')){

            $fileName = $request->passport.'_'.time().'.'.$request->receipt->extension();

            $request->receipt->move(public_path('images/uploads/receipt/'), $fileName);
            $payment = new Payment();
            $payment->service_type = $request->service_type;
            $payment->order_id = $request->reference;
            $payment->msg = $request->msg;
            $payment->transaction_id = $request->personal;
            $payment->payment_reciept = $fileName;
            $payment->status_id = $request->status_id;
            $payment->save();
            LogActivity::addToLog('Payment Status Saved - Ref -'.$request->reference.'Personal Id'. $request->personal);

            if($this->changeStatus($request->reference, $request->status_id )) {
               LogActivity::addToLog('Visa Status Changed - Ref -'.$request->reference.'Personal Id'. $request->personal);

               return redirect('admins/application/'.$request->group.'/'.$request->personal);
           }

            // DB::table('applications')->where('id', $content->id)->update(['visafile' => $img]);
        }
        return redirect('admins/application/'.$request->group.'/'.$request->personal);
    }
    public function statusVisaFileNotify(Request $request){
        $request->validate([
            'file' => 'mimes:pdf,png,docx|max:2048',
        ]);
        $appId = Application::where('personal_id', $request->personal)->first()->id;
        $application = Application::find($appId);

        if($request->status>=1) {
            $secondAppId = ApplicationSecond::where('applicant_id', $appId)->first()->id;
            $applicationSecond = ApplicationSecond::find($secondAppId);
            $applicationSecond->status = $request->status;
            $applicationSecond->save();
            $application->status = $request->status;
            $application->save();
            LogActivity::addToLog('Visa Status Changed - to -'.$request->status.'For Personal Id'. $request->personal);
        }



        if($request->hasFile('visafile')){

            $fileName = $request->passport.'_'.time().'.'.$request->visafile->extension();

            $request->visafile->move(public_path('images/uploads'), $fileName);

            $application->visa_file = $fileName;
            $application->save();
            LogActivity::addToLog('Visa File Uploaded - to -'.'For Personal Id'. $request->personal);

           // DB::table('applications')->where('id', $content->id)->update(['visafile' => $img]);
        }
switch ($request->status){
    case 1:
        return redirect('admins/pending/'.$request->reference);
        break;
            //processing
    case 2:
        return redirect('admins/processing/'.$request->reference);
        break;
        //approved
    case 3:
        return redirect('admins/approved/'.$request->reference);
        break;
    case 4:
        return redirect('admins/onhold/'.$request->reference);
        break;
    case 5:
        return redirect('admins/rejected/'.$request->reference);
        break;
    case 6:
        return redirect('admins/delivered/'.$request->reference);
        break;
    case 7:
        return redirect('admins/canceled/'.$request->reference);
        break;
    case 8:
        return redirect('admins/inAustralia/'.$request->reference);
        break;
}


    }
    public function saveApplicationFirstStage(Request $request){


            $application = new Application();
            $application->reference_number = $request->reference_number;
            $application->group_id = $request->group_id;
            $application->personal_id = $this->geraHash(6);

            $application->country = $request->registerCountry;
            $application->email = $request->email;
            $application->phone = $request->phone;
            $application->address = $request->address;
            $application->visa_type = $request->visa_type;

            $application->save();
        LogActivity::addToLog('New Application Added - to -'.$request->reference_number.'For Personal Id'. $application->personal_id);


        return redirect('admins/application/'.$request->group_id.'/'.$application->personal_id.'/pending');

    }
    function geraHash($qtd){

        $caracteres = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789abcdefghijklmnopqrstuvwxyz';
        $quantidadeCaracteres = strlen($caracteres);
        $quantidadeCaracteres--;

        $Hash=NULL;
        for($x=1;$x<=$qtd;$x++){
            $Posicao = rand(0,$quantidadeCaracteres);
            $Hash .= substr($caracteres,$Posicao,1);
        }

        return $Hash;
    }
    public function deleteApplicant(Request $request){
        $application = Application::find($request->id);
        $application->delete();
        LogActivity::addToLog('Application Deleted - Id -'.$request->id);
        return redirect('admins/pending/'.$request->reference_number);
    }
    public function deleteAllApplicant(Request $request){

        $applications = Application::where('reference_number',$request->reference_number)->get();
        foreach ($applications as $application)
        {
            $array[] = $application->id;
        }
        DB::table('applications')->whereIn('id', $array)->delete();
        DB::table('application_seconds')->whereIn('applicant_id', $array)->delete();

        LogActivity::addToLog('All Application Deleted - of Ref No. -'.$request->reference_number);
        return redirect('admins/data/pending')->with('status','Applications Deleted Successfully');

    }
    public function changeStatus($referenceId, $newStatusValue ){
        $applications = Application::where('reference_number',$referenceId)->get();
        foreach ($applications as $application)
        {
            $array[] = $application->id;
        }
        LogActivity::addToLog('Status Changed of all applicatnt - of Ref No. -'.$referenceId);
        DB::table('applications')->whereIn('id', $array)->update(['status' => $newStatusValue]);
        DB::table('application_seconds')->whereIn('applicant_id', $array)->update(['status' => $newStatusValue]);
        return true;

    }
}
