<?php

namespace App\Console\Commands;

use App\Model\ReportRequest;
use App\Student;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log; 
use PDF;

class ReportGenrate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {  Log::info('report generate');
        $requestReports=ReportRequest::where('status',0)->get();
        foreach ($requestReports as $requestReport) { 
            if ($requestReport->report_wise==1) {
                $students=Student::where('student_status_id',1)->orderBy('class_id','ASC')->get();
            }
            if ($requestReport->report_wise==3) {
                $students=Student::where('class_id',$requestReport->class_id)->where('student_status_id',1)->orderBy('class_id','ASC')->get();
            }
            if ($requestReport->report_wise==4) {
                $students=Student::where('class_id',$requestReport->class_id)->where('section_id',$requestReport->section_id)->where('student_status_id',1)->orderBy('class_id','ASC')->get();
            }
            foreach ($students as $student) { 
                
               $documentUrl = Storage_path() . '/app/student/document/certificate/fee_certificate/'.'/'.$student->classes->name.'/'.$student->sectionTypes->name;   
               @mkdir($documentUrl, 0755, true); 
                   
                    $pdf = PDF::loadView('admin.certificate.tuitionfee.print',compact('student'))->save($documentUrl.'/'.$student->registration_no.'_fee_certificate.pdf'); 
                
                
            
        $requestReportStatus = ReportRequest::find($requestReport->id);
        $requestReportStatus->status=1;
        $requestReportStatus->save(); 
        }

      } 
    }    
   
}
