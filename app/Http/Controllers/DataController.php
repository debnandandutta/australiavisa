<?php

namespace App\Http\Controllers;

use App\Application;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function index(){

        return view('admin.data-table');
    }

    public function unpaidApplicatnt(){
        $contents = DB::table('applications')
             ->select('id', 'reference_number','country', 'email','status', 'created_at',DB::raw('count(reference_number) as count'))
            ->where('status', '=', 1)
            ->orWhere('status', '=', 0)
            ->groupBy('reference_number')
            ->get();

        $breadCrumb="Unpaid Application";
        return view('admin.unpaid-table',[
            'contents' => $contents, 'breadcrumb'=>$breadCrumb, 'countApplicant'=>$this->countApplicant()
        ]);

    }
    public function processingApplicatnt(){
        $this->countApplicant();
        $contents = DB::table('applications')
            ->select('id', 'reference_number','country', 'email','status', 'created_at',DB::raw('count(reference_number) as count'))
            ->where('status', '=', 2)
            ->groupBy('reference_number')
            ->get();


        $breadCrumb="Processing Application";
        return view('admin.processing-table',[
            'contents' => $contents, 'breadcrumb'=>$breadCrumb, 'countApplicant'=>$this->countApplicant()
        ]);

    }
    public function countApplicant(){
        $pending = Application::where('status',1)->orWhere('status',0)->get();
        $processing = Application::where('status',2)->get();
        $approved = Application::where('status',3)->get();

        return $count = ["pendingCount" => $pending->count(), "processingCount" => $processing->count(),'approvedCount'=>
            $approved->count()];
    }

    public function approvedApplicatnt(){
        $contents = DB::table('applications')
            ->rightJoin('application_seconds', 'applications.id', '=', 'application_seconds.applicant_id')
            ->select('applications.id', 'applications.reference_number','applications.country', 'applications.email','applications.status', 'applications.created_at',
                DB::raw('count(applications.reference_number) as count'))
            ->where('applications.status', '=', 3)
            ->groupBy('reference_number')
            ->get();

          $contents2 = DB::table('applications')
            ->rightJoin('application_seconds', 'applications.id', '=', 'application_seconds.applicant_id')
            ->where('applications.status', '=', 3)
             ->get();


        $breadCrumb="Approved Application";
        return view('admin.approved-table',[
            'contents' => $contents, 'breadcrumb'=>$breadCrumb, 'countApplicant'=>$this->countApplicant()
        ]);

    }
    public function onHoldApplicatnt(){
        $contents = DB::table('applications')
            ->rightJoin('application_seconds', 'applications.id', '=', 'application_seconds.applicant_id')
            ->select('applications.id', 'applications.reference_number','applications.country', 'applications.email','applications.status', 'applications.created_at',
                DB::raw('count(applications.reference_number) as count'))
            ->where('applications.status', '=', 4)
            ->groupBy('reference_number')
            ->get();

        $contents2 = DB::table('applications')
            ->rightJoin('application_seconds', 'applications.id', '=', 'application_seconds.applicant_id')
            ->where('applications.status', '=', 4)
            ->get();


        $breadCrumb="OnHold Application";
        return view('admin.onhold-table',[
            'contents' => $contents, 'breadcrumb'=>$breadCrumb, 'countApplicant'=>$this->countApplicant()
        ]);

    }
    public function refundApplicatnt(){
        $contents = DB::table('applications')
            ->rightJoin('application_seconds', 'applications.id', '=', 'application_seconds.applicant_id')
            ->select('applications.id', 'applications.reference_number','applications.country', 'applications.email','applications.status', 'applications.created_at',
                DB::raw('count(applications.reference_number) as count'))
            ->where('applications.status', '=', 9)
            ->groupBy('reference_number')
            ->get();

        $contents2 = DB::table('applications')
            ->rightJoin('application_seconds', 'applications.id', '=', 'application_seconds.applicant_id')
            ->where('applications.status', '=', 9)
            ->get();


        $breadCrumb="Refunded Application";
        return view('admin.onhold-table',[
            'contents' => $contents, 'breadcrumb'=>$breadCrumb, 'countApplicant'=>$this->countApplicant()
        ]);

    }
    public function rejectedApplicatnt(){
        $contents = DB::table('applications')
            ->rightJoin('application_seconds', 'applications.id', '=', 'application_seconds.applicant_id')
            ->select('applications.id', 'applications.reference_number','applications.country', 'applications.email','applications.status', 'applications.created_at',
                DB::raw('count(applications.reference_number) as count'))
            ->where('applications.status', '=', 5)
            ->groupBy('reference_number')
            ->get();

        $contents2 = DB::table('applications')
            ->rightJoin('application_seconds', 'applications.id', '=', 'application_seconds.applicant_id')
            ->where('applications.status', '=', 5)
            ->get();


        $breadCrumb="Rejected Application";
        return view('admin.rejected',[
            'contents' => $contents, 'breadcrumb'=>$breadCrumb, 'countApplicant'=>$this->countApplicant()
        ]);

    }
    static function getPaymentType($ref){
        return Payment::where('order_id', $ref)->first()->msg;
    }
    public function incompleteApplicatnt(){
        $contents = DB::table('applications')
            ->select('id', 'reference_number','country', 'email','status', 'created_at',DB::raw('count(reference_number) as count'))
            ->where('status', '=', 0)
            ->groupBy('reference_number')
            ->get();

        $breadCrumb="Incomplete Application";
        return view('admin.unpaid-table',[
            'contents' => $contents, 'breadcrumb'=>$breadCrumb, 'countApplicant'=>$this->countApplicant()
        ]);

    }
}
