<?php

namespace App\Console\Commands;

use App\Model\Document;
use App\Model\SiblingGroup;
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
                $students=new Student();
                $studentss=$students->getStudentAllDetails();
            } 
            if ($studentProfileReport->report_for_id==3) {
              $students=new Student();
                $studentss=$students->getStudentByClassMultiselectId([$studentProfileReport->class_id]);
                
            } 
            if ($studentProfileReport->report_for_id==4) {
              $students=new Student();
                $studentss=$students->getStudentByClassSection($studentProfileReport->class_id,$studentProfileReport->section_id);
                 
            }
            foreach ($studentss as $student) { 
            $studentSibling=new SiblingGroup();
            $studentSiblingInfos=$studentSibling->getSiblingByStudentId($student->id);
            $documents=Document::where('student_id',$student->id)->get();               
                $documentUrl = Storage_path().'/'.'app/student/profile/pdf/'.$student->classes->name.'/'.$student->sectionTypes->name;
                @mkdir($documentUrl, 0755, true); 
                   
                if ($studentProfileReport->report_wise_id==2) {  
                    $pdf = PDF::loadView('admin.report.finalReport.filed_wise_pdf',compact('student','fieldNames','studentSiblingInfos'))->save($documentUrl.'/'.$student->registration_no.'_field_wise.pdf'); 
                } 
                if ($studentProfileReport->report_wise_id==1) {  
                    $pdf = PDF::loadView('admin.report.finalReport.pdf_generate',compact('student','sectionWiseDetails','studentSiblingInfos'))->save($documentUrl.'/'.$student->registration_no.'_section_wise.pdf'); 
                }
              
                $docs=Document::where('student_id',$student->id)->get();
                 $pdfMerge = new Fpdi();
                 $dt =array();
                $dt['student']=$documentUrl.'/'.$student->registration_no.'_section_wise.pdf';
                 foreach ($docs as $key=>$document) {
                  if ($studentProfileReport->document_marge==1) {
                   $dt[$key]=Storage_path('app/'.$document->document_url);  
                 }
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
                 
                 
                   file_put_contents(Storage_path('app/filename.pdf'), $pdfMerge->Output('I', 'simple.pdf')); 
                   Log::info('download success');

                
            $studentProfileReports=StudentProfileReport::find($studentProfileReport->id);
            // $studentProfileReports->status=1; 
            // $studentProfileReports->save();
            }
        }
    }
    
}
