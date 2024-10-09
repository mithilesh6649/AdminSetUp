@extends('adminlte::page')

@section('title', 'country list')

@section('content_header')
@stop

@section('css')
<style>
  .total_score {
    padding: 2px 16px;
    font-size: 15px;
    border-radius: 5px;
    font-weight: bold;
  }
</style>
@stop


@section('content')
<div class="row">
  <div class="col-md-12">
    <!-- <div class="alert d-none" id="flash-message"></div> -->
    <div class="card">
      <div class="card-header alert d-flex justify-content-between align-items-center">
        <h3>Country Score list</h3>
        <div style="height: 41px;"></div>

      </div>

      <div class="card-body">

        <table style="width:100%" id="admins-list" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th class="display-none"></th>
              <th>Sr.No.</th>
              <th>Country name</th>
              <th>Country Score</th>

            </tr>
          </thead>
          <tbody>
            @foreach ($finalScore as $key => $value)
            <tr>
              <td class="display-none"></td>
              <td>{{++$key}}</td>
              <td>{{$value['country']}}</td>

              <td>
                
                @if($value['total_score'] >= 0 && $value['total_score'] <=23 ) 
                <span class="total_score bg-success">{{$value['total_score']}}</span>

                @elseif($value['total_score']>=24 and $value['total_score']<=110) 
                <span class="total_score bg-warning">{{$value['total_score']}}</span>

                @elseif($value['total_score']>=111 and $value['total_score'])
                <span class="total_score bg-danger">{{$value['total_score']}}</span>

                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th class="display-none"></th>
              <th>Sr.No.</th>
              <th>Country name</th>
              <th>Country Score</th>

            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
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