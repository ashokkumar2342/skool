@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
    <h1>Certificate Download</h1>
    </section>  
    <section class="content"> 
      <div class="box"> 
        <div class="box-body">
        <div class="panel panel-danger">
          <div class="panel-heading">Character Certificate</div> 
          <div class="panel-body">
          <table class="table" id="certificate_list">
            <thead>
              <tr>
                <th>Registration No.</th>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($CharCertIssueDetails as $CharCertIssueDetail)
              <tr>
                <td>{{ $CharCertIssueDetail->students->registration_no or '' }}</td>
                <td>{{ $CharCertIssueDetail->students->name or '' }}</td>
                <td>{{ date('d-m-Y',strtotime($CharCertIssueDetail->DOB)) }}</td>
                <td>
                  <a class="btn btn-xs btn-success" target="blank" href="{{ route('admin.student.CertificateDownload',[Crypt::encrypt($CharCertIssueDetail->id),Crypt::encrypt(1)]) }}" title="Download"><i class="fa fa-download"></i></a>
                </td>
              </tr> 
              @endforeach
            </tbody>
          </table>
          </div>
          </div>
          <div class="panel panel-success">
          <div class="panel-heading">Date of Birth Certificate</div> 
          <div class="panel-body">
          <table class="table" id="certificate_list">
            <thead>
              <tr>
                <th>Registration No.</th>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($DOBCertIssueDetails as $DOBCertIssueDetail)
              <tr>
                <td>{{ $DOBCertIssueDetail->students->registration_no or '' }}</td>
                <td>{{ $DOBCertIssueDetail->students->name or '' }}</td>
                <td>{{ date('d-m-Y',strtotime($DOBCertIssueDetail->DOB)) }}</td>
                <td>
                  <a class="btn btn-xs btn-success" target="blank" href="{{ route('admin.student.CertificateDownload',[Crypt::encrypt($DOBCertIssueDetail->id),Crypt::encrypt(2)]) }}" title="Download"><i class="fa fa-download"></i></a>
                </td>
              </tr> 
              @endforeach
            </tbody>
          </table>
          </div>
          </div>
          <div class="panel panel-info">
          <div class="panel-heading">School Leaving Certificate</div> 
          <div class="panel-body">
          <table class="table" id="certificate_list">
            <thead>
              <tr>
                <th>Registration No.</th>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($SLCIssueDetails as $SLCIssueDetail)
              <tr>
                <td>{{ $SLCIssueDetail->students->registration_no or '' }}</td>
                <td>{{ $SLCIssueDetail->students->name or '' }}</td>
                <td>{{ date('d-m-Y',strtotime($SLCIssueDetail->DOB)) }}</td>
                <td>
                  <a class="btn btn-xs btn-success" target="blank" href="{{ route('admin.student.CertificateDownload',[Crypt::encrypt($SLCIssueDetail->id),Crypt::encrypt(3)]) }}" title="Download"><i class="fa fa-download"></i></a>
                </td>
              </tr> 
              @endforeach
            </tbody>
          </table>
          </div>
          </div> 
        </div>
      </div>
    </section> 
 @endsection 
 @push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
@push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
    $(document).ready(function(){
        $('#').DataTable();
    });
 </script>
  @endpush
