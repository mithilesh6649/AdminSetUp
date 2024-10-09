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
          <h3>Help And Support</h3>
          <div style="height: 41px;"></div>
        </div>
        <div class="card-body">
          <table style="width:100%" id="pages-list" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th class="display-none"></th>
                <!-- <th>Sr.No.</th> -->
                <th>Ticket Id</th>
                <th>User Type</th>
                <th>Message</th>
                <th>Created at</th>
                <th>Status</th>
                @if(Gate::check('view_helpandsupport'))
                <th>Response</th>
                @endif

              </tr>
            </thead>
            <tbody>
              @forelse($helplist as $key =>$data)
              <tr>
                <td class="display-none"></td>
                <!-- <td>{{++$key}}</td> -->
                <td style="width: 17%;">{{ 'LOSS-DAMAGE-' .$data->id }}</td>
                <td>{{$data->user_type==1? 'Coordinator' : 'Expert' }}</td>
                <td>
                  {{Illuminate\Support\Str::length($data->description) > 50 ? Illuminate\Support\Str::substr($data->description, 0, 50)."..." : $data->description }}
                </td>
                <td>{{ Carbon\Carbon::parse($data->created_at)->format('d/m/Y') }} </td>

                <td>
                  <!-- <span class="text-center {{$data->status==1?'text-danger':'text-info'}}">{{$data->status==1? 'Opened': 'Resolved' }}</span> -->
                  <button type="button" class="btn btn-sm btn-toggle {{ $data->status==1 ? 'active':'' }}" onclick="changeStatus(this)" data-id="{{ $data->id }}" data-toggle="button" aria-pressed="{{ $data->status==1 ? 'true':'false' }}" autocomplete="off">
                    <div class="handle"></div>
                  </button>
                </td>

                @if(Gate::check('view_helpandsupport'))
                <td>
                  <a href="{{route('feed.help-support.view',base64_encode($data->id))}}" title="View"><i class="text-info fa fa fa-comments comment_chat"></i></a>
                </td>
                @endif
              </tr>
              @empty
              @endforelse
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