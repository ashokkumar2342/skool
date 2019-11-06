<?php

namespace App\Console\Commands;

use App\Model\StudentProfileReport;
use App\Student;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log; 
use PDF;
use setasign\Fpdi\Fpdi;
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
    {  Log::info('student generate');
          $studentProfileReports=StudentProfileReport::where('status',0)->get();

          
        foreach ($studentProfileReports as $studentProfileReport) {
           $sectionWiseDetails= explode(',',$studentProfileReport->section_name ); 
           $fieldNames= explode(',',$studentProfileReport->field_name); 
               
            if ($studentProfileReport->report_for_id==1) {
                $studentss=Student::where('student_status_id',1)->get();
            } 
            if ($studentProfileReport->report_for_id==3) {
                $studentss=Student::where('class_id',$studentProfileReport->class_id)->where('student_status_id',1)->orderBy('class_id','ASC')->get();
            } 
            if ($studentProfileReport->report_for_id==4) {
                $studentss=Student::where('class_id',$studentProfileReport->class_id)->where('section_id',$studentProfileReport->section_id)->where('student_status_id',1)->orderBy('class_id','ASC')->get();
            }
            foreach ($studentss as $student) {                
                $documentUrl = Storage_path() . '/app/student/profile/pdf/'.$student->classes->name.'/'.$student->sectionTypes->name;
                @mkdir($documentUrl, 0755, true); 
                   
                if ($studentProfileReport->report_wise_id==2) {  
                    $pdf = PDF::loadView('admin.report.finalReport.filed_wise_pdf',compact('student','fieldNames'))->save($documentUrl.'/'.$student->registration_no.'_field_wise.pdf'); 
                } 
                if ($studentProfileReport->report_wise_id==1) {  
                    $pdf = PDF::loadView('admin.report.finalReport.pdf_generate',compact('student','sectionWiseDetails'))->save($documentUrl.'/'.$student->registration_no.'_section_wise.pdf'); 
                }
                $docs=$student->documents; 
                   $pdfMerge = new Fpdi();
                   $dt =array();
                  $dt['student']=$documentUrl.'/'.$student->registration_no.'_section_wise.pdf';
                   foreach ($docs as $key=>$document) {
                     
                     $dt[$key]=Storage_path('app/'.$document->document_url);  
                    
                  }
                
                   $files =$dt;
                   foreach ($files as $file) {
                      $pageCount =$pdfMerge->setSourceFile($file);
                      for ($pageNo=1; $pageNo <=$pageCount ; $pageNo++) { 
                          $pdfMerge->AddPage();
                          $pageId = $pdfMerge->importPage($pageNo, '/MediaBox');
                          //$pageId = $pdfMerge->importPage($pageNo, Fpdi\PdfReader\PageBoundaries::ART_BOX);
                          $s = $pdfMerge->useTemplate($pageId, 10, 10, 200);
                      }
                   }
                   $file = uniqid().'.pdf';
                   // $output =$pdfMerge->Output('I', 'simple.pdf');
                   file_put_contents(Storage_path('app/filename.pdf'), $pdfMerge->Output('I', 'simple.pdf')); 
                   Log::info('dfd');
                 
            }
            $studentProfileReports=StudentProfileReport::find($studentProfileReport->id);
                $studentProfileReports->status=1; 
                // $studentProfileReports->save();
        }
    }
    
}
