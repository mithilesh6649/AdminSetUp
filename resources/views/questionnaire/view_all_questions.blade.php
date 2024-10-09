@extends('adminlte::page')

@section('title', 'Questionnaire Questions Details')

@section('content_header')
@stop
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header alert d-flex justify-content-between align-items-center">
        <h3>{{ $expertDetail->name }}</h3>
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
              <th class="display-none"></th>
              <th width="5%">Sr.No.</th>
              <th width="55%">Question</th>
              <th width="15%">Region</th>
              <th width="15%">Answer</th>
              <th width="10%">Text Answer</th>
            </tr>
          </thead>
          <tbody>
            @php $i = 1; @endphp
            @foreach($questionDetailwithAnswers as $key)
            <tr>
              <td class="display-none"></td>
              <td>{{ $i }}</td>
              <td style="text-align: left;">{{ $key['question'] }}</td>
              <td style="text-align: center;">{!! $key['implodeRegion'] !!}</td>
              <td style="text-align: center;">{!! $key['implodeAnswer'] !!}</td>
              <td style="text-align: left;">{!! $key['implodeText'] ? $key['implodeText'] : '' !!}</td>
            </tr>
            @php $i++; @endphp
            @endforeach
          </tbody>

          <tfoot>
              <th></th>
              <th>Sr.No.</th>
              <th>Question</th>
              <th>Region</th>
              <th>Answer</th>
              <th>Text Answer</th>
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