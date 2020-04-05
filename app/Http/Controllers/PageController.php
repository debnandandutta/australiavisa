<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{

    public function __construct(CurrencyRepositary $currencyRepositary)
    {
        $this->currencyRepo = $currencyRepositary;

    }
    public function index()
    {
        $defaultCurrency = session('defaultCurrency', "MYR");
        $currencies = $this->currencyRepo->getAllCurrencies();
        return view('ausvisa.home',[
            'currencies' => $currencies, 'defaultCurrency'=>$defaultCurrency
        ]);
    }
    public function setCurrency(Request $request){


        session(['defaultCurrency' => $request->currency]);
        return redirect($request->url);

    }
    public function contactPage(){

        $defaultCurrency = session('defaultCurrency', "MYR");
        $currencies = $this->currencyRepo->getAllCurrencies();
        return view('ausvisa.contact',[
            'currencies' => $currencies, 'defaultCurrency'=>$defaultCurrency
        ]);
    }
    public function application(){
        $defaultCurrency = session('defaultCurrency', "MYR");
        $currencies = $this->currencyRepo->getAllCurrencies();
        $countries = DB::table('countries')
            ->get();

        return view('ausvisa.application',[
            'countries' => $countries,'currencies' => $currencies, 'defaultCurrency'=>$defaultCurrency
        ]);

    }
    public function details($ref){
        $defaultCurrency = session('defaultCurrency', "MYR");
        $currencies = $this->currencyRepo->getAllCurrencies();
        $countries = DB::table('countries')
            ->get();
        $first_stage_details = DB::table('applications')
            ->where('reference_number', $ref)
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
            'countries' => $countries, 'years' => $years, 'byears' => $byears, 'dobyears' => $dobyears, 'firstStageDetails'=>$first_stage_details, 'currencies' => $currencies, 'defaultCurrency'=>$defaultCurrency
        ]);

    }
    public function pageInformation($slug){
        $defaultCurrency = session('defaultCurrency', "MYR");
        $currencies = $this->currencyRepo->getAllCurrencies();
        $parentCats = DB::table('categories')->where('parent', 0)->where('display_type', 'menu')->get();
        $contents = DB::table('categories')
            ->rightJoin('contents', 'categories.id', '=', 'contents.category_id')
            ->where('slug', $slug)
            ->get();
        if($slug=='check-eta-status'){
            return redirect('check-eta-status');
        }else{
            return view('ausvisa.page',[
                'contents' => $contents,'categories' => $parentCats, 'currencies' => $currencies, 'defaultCurrency'=>$defaultCurrency
            ]);
        }

    }
    public function appProcess($ref){


        $first_stage_details = Application::where('reference_number',$ref)->first();

        return redirect('admins/application/'.$first_stage_details->group_id.'/'.$first_stage_details->personal_id);
    }
    public function approvedProcess($ref){

        $matchThese = ['reference_number' => $ref, 'status' => 3];
          $first_stage_details = Application::where($matchThese)->get();

        return redirect('admins/application/'.$first_stage_details[0]->group_id.'/'
            .$first_stage_details[0]->personal_id.'/approved');
    }
    public function onHoldProcess($ref){

        $matchThese = ['reference_number' => $ref, 'status' => 4];
        $first_stage_details = Application::where($matchThese)->get();

        return redirect('admins/application/'.$first_stage_details[0]->group_id.'/'
            .$first_stage_details[0]->personal_id.'/onHold');
    }

    public function rejectedProcess($ref){

        $matchThese = ['reference_number' => $ref, 'status' => 5];
        $first_stage_details = Application::where($matchThese)->get();

        return redirect('admins/application/'.$first_stage_details[0]->group_id.'/'
            .$first_stage_details[0]->personal_id.'/rejected');
    }
    public function deliveredProcess($ref){

        $matchThese = ['reference_number' => $ref, 'status' => 6];
        $first_stage_details = Application::where($matchThese)->get();

        return redirect('admins/application/'.$first_stage_details[0]->group_id.'/'
            .$first_stage_details[0]->personal_id.'/delivered');
    }
    public function processingProcess($ref){

        $matchThese = ['reference_number' => $ref, 'status' => 2];
        $first_stage_details = Application::where($matchThese)->get();

        return redirect('admins/application/'.$first_stage_details[0]->group_id.'/'
            .$first_stage_details[0]->personal_id.'/processing');
    }
    public function canceledProcess($ref){

        $matchThese = ['reference_number' => $ref, 'status' => 7];
        $first_stage_details = Application::where($matchThese)->get();

        return redirect('admins/application/'.$first_stage_details[0]->group_id.'/'
            .$first_stage_details[0]->personal_id.'/canceled');
    }
    public function inAustraliaProcess($ref){

        $matchThese = ['reference_number' => $ref, 'status' => 8];
        $first_stage_details = Application::where($matchThese)->get();

        return redirect('admins/application/'.$first_stage_details[0]->group_id.'/'
            .$first_stage_details[0]->personal_id.'/Currently-In-Australia');
    }
    public function pendingProcess($ref){


        $first_stage_details = Application::where('reference_number',$ref)
            ->where('status',1)->orWhere('status',0)->get();
if(count($first_stage_details)<1)
    return redirect('admins/data/pending');
        else
        return redirect('admins/application/'.$first_stage_details[0]->group_id.'/'
            .$first_stage_details[0]->personal_id.'/pending');
    }
    public function checkEta(){
        $defaultCurrency = session('defaultCurrency', "MYR");
        $currencies = $this->currencyRepo->getAllCurrencies();
        return view('ausvisa.checkStatus',[
             'currencies' => $currencies, 'defaultCurrency'=>$defaultCurrency
        ]);
    }

}
