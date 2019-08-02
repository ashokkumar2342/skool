<?php

namespace App\Console\Commands;

use App\Model\StudentProfileReport;
use App\Student;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\log;
use PDF;
class StudentProfileReportRequest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'student:report';

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
    {
          $studentProfileReports=StudentProfileReport::where('status',0)->get();

          
        foreach ($studentProfileReports as $studentProfileReport) {
           $sectionWiseDetails= explode(',', $studentProfileReport->section_name );

           $fieldNames= explode(',', $studentProfileReport->field_name );
        
               
            if ($studentProfileReport->report_for_id==3) {
                $studentss=Student::where('class_id',$studentProfileReport->class_id)->where('student_status_id',1)->orderBy('class_id','ASC')->get();
            } 
            if ($studentProfileReport->report_wise==4) {
                $studentss=Student::where('class_id',$studentProfileReport->class_id)->where('section_id',$studentProfileReport->section_id)->where('student_status_id',1)->orderBy('class_id','ASC')->get();
            }
            foreach ($studentss as $student) {                
                $documentUrl = Storage_path() . '/app/student/pfofile/'.$student->class_id.'/'.$student->section_id.'/'.$student->registration_no; 

                if ($studentProfileReport->report_wise_id==2) {  
                    $pdf = PDF::loadView('admin.report.finalReport.filed_wise_pdf',compact('student','fieldNames'))->save($documentUrl.'/filed_wise.pdf'); 
                } 
                if ($studentProfileReport->report_wise_id==1) { Log::info('2');
                    $pdf = PDF::loadView('admin.report.finalReport.pdf_generate',compact('student','sectionWiseDetails'))->save($documentUrl.'/section_wise.pdf'); 
                } 
                $studentProfileReports=StudentProfileReport::find($studentProfileReport->id);
                $studentProfileReports->status=1;
                $studentProfileReports->save(); 
            }      
     
        }

         
    }
    
}
