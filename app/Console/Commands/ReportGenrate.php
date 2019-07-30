<?php

namespace App\Console\Commands;

use App\Model\ReportRequest;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\log;

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
    {
        $requestReports=ReportRequest::where('status',0)->orderBy('class_id','ASC')->get();
        foreach ($requestReports as $requestReport) {
        $requestReportStatus=ReportRequest::find($requestReport->id);
        $requestReportStatus->status=1;
        $requestReportStatus->save(); 
        }

         
    }
}
