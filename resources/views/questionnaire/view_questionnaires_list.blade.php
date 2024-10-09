@extends('adminlte::page')

@section('title', 'Expert Questions/Answer Details')

@section('content_header')
@stop
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header alert d-flex justify-content-between align-items-center">
        <h3>{{ $questionnaires_detl->title??'N/A' }}</h3>
        <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
      </div>
      <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
        @endif
        <table style="width:100%" id="admins-list" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th style="width: 20%;">Sr.No.</th>
              <th>Expert Name</th>
              <th style="width: 20%;">Action</th>
            </tr>
          </thead>
          <tbody>
            @php $i = 1; @endphp
            @foreach($questionnaires_detl->questionExpertPanel as $key)
            @php $questionExpertPanelId = $key->id; @endphp
            @foreach($key->expertPanel->experPanelExepert as $key2)
            <tr>
              <td>{{ $i }}</td>
              <td>{{ $key2->Expert->name }}</td>
              <td><a class="action-button" title="View Q/A" href="{{route('questionnaire.viewallquestions',[base64_encode($key2->Expert->id),base64_encode($questionExpertPanelId)])}}"><i class="text-info fa fa-eye"></i></a></td>
            </tr>
            @php $i++;@endphp
            @endforeach
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>Sr.No.</th>
              <th>Expert Name</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@section('css')
@stop

@section('js')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function() {
    $('#admins-list').DataTable({
      stateSave: true,
      columnDefs: [{
        targets: 0,
        render: function(data, type, row) {
          return data.substr(0, 2);
        }
      }]
    });
  });
</script>
@stop