@extends('adminlte::page')

@section('title', 'help and support')

@section('content_header')
@stop

@section('content')
<div class="">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header alert d-flex justify-content-between align-items-center">
          <h3>Contact Us</h3>
          <div style="height: 41px;"></div>
        </div>
        <div class="card-body">
          <table style="width:100%" id="pages-list" class="table table-bordered table-hover">
            <thead>
              <tr>
                  <th class="display-none"></th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>message</th>
                  <!-- <th>Status</th> -->
                     
                  <th>Actions</th>
                    
                </tr>
            </thead>
            <tbody>
                 @foreach($contactUsMessagesList as $contactUsMessagesList )
                
                       <tr>
                    <td class="display-none"></td>
                    <td>{{ $contactUsMessagesList->name }}</td>
                    <td>{{ $contactUsMessagesList->email }}</td>
                    <td>{{ $contactUsMessagesList->phone }}</td>
                    <td>{{ substr($contactUsMessagesList->message,0,14) }}..</td>
                  <!--   <td>
                      
                    </td>
                       -->
                     <td>
                      <a href="{{ route('view_contact_us_message', ['id' => $contactUsMessagesList->id]) }}" title="View"><i class="text-info fa fa-eye"></i></a>
                       <a href="mailto:{{ $contactUsMessagesList->email }}" title="Reply"><i class="text-info fa fa-reply"></i></a>
                    </td>
                     
                  </tr>


              @endforeach 
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('css')
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"> -->
@stop

@section('js')
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>

  $('#pages-list').DataTable({
    columnDefs: [{
      targets: 0,
      render: function(data, type, row) {
        return data.substr(0, 2);
      }
    }]
  });

  function changeStatus(selector) {
    var value = $(selector).attr('aria-pressed');
    var id = $(selector).data('id');
    var status = value == 'false' ? 1 : 2;

    $.ajax({
      url: "{{route('feed.help-support.changestatus')}}",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      method: 'post',
      data: {
        id: id,
        status: status
      },
      success: function(response) {
        console.log("Response", response);
      }
    });
  }
</script>
@stop