@extends('adminlte::page')

@section('title', 'country list')

@section('content_header')
@stop

@section('css')
<style>
  .download-button {
    display: inline-block;
    padding: 6px !important;
    background-color: #4b2f60;
    color: #fff !important;
    text-decoration: none;
    border-radius: 4px;
  }

  .download-button:hover {
    background-color: #6b4885;
    color: #fff;
  }

  .download-button i {
    color: #fff;
    margin-right: 5px;
  }
</style>
@stop


@section('content')
<div class="row">
  <div class="col-md-12">
    <!-- <div class="alert d-none" id="flash-message"></div> -->
    <div class="card">
      <div class="card-header alert d-flex justify-content-between align-items-center">
        <h3>Country list</h3>
        <div style="height: 41px;"></div>

      </div>

      <div class="card-body">
        <table style="width:100%" id="admins-list" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th class="display-none"></th>
              <th>Sr.No.</th>
              <th>Country name</th>
              <th>Last Updated At</th>
              <th style="width: 20%;">{{ __('adminlte::adminlte.actions') }}</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($getCountry as $key => $value)
            <tr>
              <td class="display-none"></td>
              <td>{{++$key}}</td>
              <td>{{$value->country_name}}</td>
              <td>{{$value->filelinks ? Carbon\Carbon::parse($value->filelinks->updated_at)->format('d/m/Y')  : "Not Downloaded" }}</td>
              <td>
                <a onclick="refreshPage()" class="download-button" href="{{route('exceldownload',$value->id)}}">
                  <i class="fas fa-download"></i> Download Report
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th class="display-none"></th>
              <th>Sr.No.</th>
              <th>Country name</th>
              <th>Last Updated At</th>
              <th>{{ __('adminlte::adminlte.actions') }}</th>
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
  function refreshPage() {
    setTimeout(function() {
      location.reload();
    }, 1000); // Reload the page after 1 second (adjust the delay as needed)
  }

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