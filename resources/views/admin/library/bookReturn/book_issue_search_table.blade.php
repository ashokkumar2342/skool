 <table  class="table table-bordered table-striped table-hover"> 
              <thead>
                <tr> 
                  <th>Accession No</th> 
                  <th>Book Name</th> 
                  <th>Hall No</th> 
                  <th>Shelf No</th> 
                  <th>Box No</th>     
                  <th>Action</th>
               </tr>
              </thead>
              <tbody>
               
                <tr>
                  <td>{{ $bookIssueDetail->bookaccession->accession_no or '' }}</td>
                  <td>{{ $bookIssueDetail->bookaccession->Booktype->name or '' }}</td>
                  <td>{{ $bookIssueDetail->bookaccession->Booktype->hall_no or '' }}</td>
                  <td>{{ $bookIssueDetail->bookaccession->Booktype->shelf_no or '' }}</td>
                  <td>{{ $bookIssueDetail->bookaccession->Booktype->box_no or '' }}</td>
                  
                  <td>
                    <a href="{{ route('admin.library.book.issue.return',$bookIssueDetail->id) }}" class="btn btn-info btn-xs" title="">Return</a>
                     

                       

                  </td>
                   
                </tr>
               
              </tbody>
            </table> 