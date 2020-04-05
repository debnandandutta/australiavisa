<?php

namespace App\Http\Controllers;

use App\Application;
use App\ApplicationSecond;
use App\Country;
use App\Currency;
use App\Payment;
use App\PaymentGateSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class ApplicationController extends Controller
{
    public function __construct(CurrencyRepositary $currencyRepositary)
    {
        $this->currencyRepo = $currencyRepositary;

    }
    public function index(){

        return view('admin.application-process');
    }
    public function saveApplicationFirstStage(Request $request){
        $count= $request->visaQuantity;
        $groupId= $this->geraHash(6);
        do {
            $token = $this->getToken(4);
            $code = 'AUSETA' . strftime("%m", time()) . substr(strftime("%Y", time()), 2) . $token;
            $user_code = Application::where('reference_number', $code)->first();
        } while (!empty($user_code));
        for($i=0;$i<$count;$i++) {

            $application = new Application();
            $application->reference_number = $code;
            $application->group_id = $groupId;
            $application->personal_id = $this->geraHash(6);

            $application->country = $request->registerCountry;
            $application->email = $request->email;
            $application->phone = $request->phone;
            $application->address = $request->address;
            $application->visa_type = $request->visa_type;
            $application->status = 0;
            $application->save();
            if($i<1){
                 $mainApplicant=$application->personal_id;
            }
        }
                return redirect('my/'.$groupId.'/'.$mainApplicant);

    }
    public function saveApplicationSecondStage(Request $request){


        $appId = Application::where('personal_id', $request->personal)->first()->id;
        if($request->status==1){
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
        $applicationSecond->status = 1;


        if($applicationSecond->save()){

            $application = Application::find($appId);
            $application->status = 1;
            if($application->save()){
                $group = $request->group;
                   $nextApplicant = Application::where('group_id', $group)->where('status',0)->first();

                if(is_null($nextApplicant))
                    return redirect('checkout/my/'.$group.'/'.$request->personal);
                else
                    return redirect('my/'.$group.'/'.$nextApplicant->personal_id);

            }

        }
    }

    public function editApplication($groupId, $applicantId, $status){



        $first_stage_details = DB::table('applications')
            ->where('group_id', $groupId)
           // ->where('status',$value)
            //->rightJoin('application_seconds', 'applications.id', '=', 'application_seconds.applicant_id')
            ->get();
        $thisApplicant = Application::where('personal_id', $applicantId)->first();
        $payment = Payment::where('transaction_id', $applicantId)->first();
        $informations = DB::table('application_seconds')
            ->where('applicant_id', $thisApplicant->id)

            ->get();
        $countries = DB::table('countries')
            ->get();
        $years = [];
        $byears = [];
        $dobyears = [];
        $thisyear = now()->year;
        $prev = $thisyear-20;
        $next = $thisyear+20;
        $birth = $thisyear-100;
        for ($year=$prev; $year <= $thisyear; $year++)
            $years[$year] = $year;
        for ($byear=$next; $byear >= $thisyear; $byear--)
            $byears[$byear] = $byear;
        for ($dobyear=$thisyear; $dobyear >= $birth; $dobyear--)
            $dobyears[$dobyear] = $dobyear;
        return view('admin.application-process',[
             'firstStageDetails'=>$first_stage_details,'informations'=>$informations,'countries' => $countries,
            'years' => $years, 'byears' => $byears, 'dobyears' => $dobyears,'applicant'=>$applicantId,
            'group'=>$groupId, 'thisApplicant'=>$thisApplicant, 'paymentHistory'=>$payment, 'status'=>$status
        ]);
    }

    public function details($groupId, $applicantId){
        $defaultCurrency = session('defaultCurrency', "MYR");
        session(['defaultCurrency' => $defaultCurrency]);
        $currencies = $this->currencyRepo->getAllCurrencies();
        $serviceFees = Currency::where('code',$defaultCurrency)->first();

        $countries = DB::table('countries')
            ->get();
         $first_stage_details = DB::table('applications')
            ->where('group_id', $groupId)
            //->rightJoin('application_seconds', 'applications.id', '=', 'application_seconds.applicant_id')
            ->get();
        $appId = Application::where('personal_id', $applicantId)->first()->id;
        $informations = DB::table('application_seconds')
            ->where('applicant_id', $appId)
            ->get();
        $years = [];
        $byears = [];
        $dobyears = [];
        $thisyear = now()->year;
        $prev = $thisyear-20;
        $next = $thisyear+20;
        $birth = $thisyear-100;
        for ($year=$prev; $year <= $thisyear; $year++)
            $years[$year] = $year;
        for ($byear=$next; $byear >= $thisyear; $byear--)
            $byears[$byear] = $byear;
        for ($dobyear=$thisyear; $dobyear >= $birth; $dobyear--)
            $dobyears[$dobyear] = $dobyear;

            return view('ausvisa.details',[
                'countries' => $countries, 'years' => $years, 'byears' => $byears, 'dobyears' => $dobyears, 'firstStageDetails'=>$first_stage_details,
                'applicant'=>$applicantId, 'group'=>$groupId, 'informations'=>$informations,'currencies' => $currencies,
                'defaultCurrency'=>$defaultCurrency,'serviceFees'=>$serviceFees
            ]);



    }
    public function checkoutIndex($groupId, $applicantId){
        $defaultCurrency = session('defaultCurrency', "MYR");
        session(['defaultCurrency' => $defaultCurrency]);
        $serviceFees = Currency::where('code',$defaultCurrency)->first();
        $currencies = $this->currencyRepo->getAllCurrencies();
        $first_stage_details = DB::table('applications')
            ->where('group_id', $groupId)
            //->rightJoin('application_seconds', 'applications.id', '=', 'application_seconds.applicant_id')
            ->get();

        $appId = Application::where('personal_id', $applicantId)->first()->id;
        $paymentInfos = PaymentGateSetting::all()->first();
        $informations = DB::table('application_seconds')
            ->where('applicant_id', $appId)
            ->rightJoin('applications', 'application_seconds.applicant_id', '=', 'applications.id')
            ->get()->first();
                if($informations->visa_type==1){
                    $visa_type ="ETA (Tourist) Subclass 601-T";
                }elseif ($informations->visa_type==2){
                    $visa_type ="ETA (Business) Subclass 601-B";
                }
                elseif     ($informations->visa_type=3){
                $visa_type ="eVisitor ETA (Tourist) Subclass 651-T";}
                elseif     ($informations->visa_type==4){
                    $visa_type ="eVisitor ETA (Tourist) Subclass 651-B";
                }
        return view('ausvisa.checkoutBegin',[
             'firstStageDetails'=>$first_stage_details, 'visa_type'=>$visa_type, 'paymentInfos' => $paymentInfos,
            'applicant'=>$applicantId, 'group'=>$groupId, 'informations'=>$informations, 'currencies' => $currencies,
            'defaultCurrency'=>$defaultCurrency,'serviceFees'=>$serviceFees
        ]);


    }
    static function createHash($detail, $amount, $orderId)
    {
        $paymentInfos = PaymentGateSetting::all()->first();
        $stringData = $paymentInfos->senangpay_secret_id.$detail.$amount.$orderId;

        // generate md5 hash for stringData
        $hashString = md5($stringData);

        return $hashString;
    }
    static function getApplicantName($applicantId, $i, $group, $personal){
        $appId = Application::where('personal_id', $applicantId)->first()->id;

        $second_stage_details = DB::table('application_seconds')
            ->where('applicant_id', $appId)
            ->first();
        if(is_null($second_stage_details)){

            return "<li class=''><a href='$personal'><span style='color: #bd362f'>Applicant No - $i</span></a></li> ";

        }else{
            return "<li><a href='$personal'> <span style='color: #00A000'>$second_stage_details->first_name -
            $second_stage_details->passport_number</span></a></li>";

        }

    }
    static function getCountryCode($slug){
        return Country::where('slug', $slug)->first()->shortFormat;
    }
    static function getApplicantNameAppconfig($applicantId, $i, $group, $personal,$status){
        $appId = Application::where('personal_id', $applicantId)->first()->id;

        $second_stage_details = DB::table('application_seconds')
            ->where('applicant_id', $appId)
            ->first();
        if(is_null($second_stage_details)){


            return "<a href='../$personal/pending'><button type='button' class='btn btn-danger mb-1'>Applicant No - $i</button></a>";

        }else{
            switch ($status){
                case 1:
                    return "<a href='../$personal/pending'><button type='button' class='btn btn-danger  mb-1'>$second_stage_details->first_name|$second_stage_details->passport_number</button></a>";
                    break;
                case 3:
                    return "<a href='../$personal/approved'><button type='button' class='btn btn-success mb-1'>$second_stage_details->first_name|$second_stage_details->passport_number</button></a>";
                break;
                case 2:
                    return "<a href='../$personal/processing'><button type='button' class='btn btn-warning mb-1'>$second_stage_details->first_name|$second_stage_details->passport_number</button></a>";
                    break;
                case 4:
                    return "<a href='../$personal/onHold'><button type='button' class='btn btn-warning mb-1'>$second_stage_details->first_name|$second_stage_details->passport_number</button></a>";
                    break;
                case 5:
                    return "<a href='../$personal/rejected'><button type='button' class='btn btn-dark mb-1'>$second_stage_details->first_name|$second_stage_details->passport_number</button></a>";
                    break;
                case 6:
                    return "<a href='../$personal/delivered'><button type='button' class='btn btn-success mb-1'>$second_stage_details->first_name|$second_stage_details->passport_number</button></a>";
                    break;
                case 7:
                    return "<a href='../$personal/canceled'><button type='button' class='btn btn-danger mb-1'>$second_stage_details->first_name|$second_stage_details->passport_number</button></a>";
                    break;
                case 8:
                    return "<a href='../$personal/currently-in-australia'><button type='button' class='btn btn-info mb-1'>$second_stage_details->first_name|$second_stage_details->passport_number</button></a>";
                    break;


            }


        }

    }

    function getToken($qtd){

        $caracteres = '0123456789';
        $quantidadeCaracteres = strlen($caracteres);
        $quantidadeCaracteres--;

        $Hash=NULL;
        for($x=1;$x<=$qtd;$x++){
            $Posicao = rand(0,$quantidadeCaracteres);
            $Hash .= substr($caracteres,$Posicao,1);
        }

        return $Hash;
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
    public function createSenangHash(Request $request)
    {
        $detail = $request->detail;
        $amount = $request->amount;
        $orderId = $request->orderId;

        $paymentInfos = PaymentGateSetting::all()->first();
        $stringData = $paymentInfos->senangpay_secret_id.$detail.$amount.$orderId;

        // generate md5 hash for stringData
        $hashString = md5($stringData);

        return $hashString;
    }
    public function get_by_visa_type(Request $request)
    {
        if (!$request->visa_type) {
            $html = '<option value="">--Please Select Your Citizenship--</option>';
        } else {
            $html = '';
            $countries = Country::where('slug', $request->visa_type)->get();

            foreach ($countries as $country) {
                if($country->subclass_601_T==1){
                    $html .='<option value="1">ETA (Tourist) Subclass 601-T</option>';
                }
                if($country->subclass_601_B==1){
                    $html .='<option value="2">ETA (Business) Subclass 601-B</option>';
                }
                if($country->subclass_651_T==1){
                    $html .='<option value="3">eVisitor ETA (Tourist) Subclass 651-T</option>';
                }
                if($country->subclass_651_B==1){
                    $html .='<option value="4">eVisitor ETA (Business) Subclass 651-B</option>';
                }
            }
        }

        return response()->json(['html' => $html]);
    }

}
