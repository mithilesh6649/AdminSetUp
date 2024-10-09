@extends('adminlte::page')

@section('title', 'Questionnaires List')

@section('content_header')
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header alert d-flex justify-content-between align-items-center">
        <h3>Questionnaires</h3>
        <div style="height: 41px;"></div>

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
              <th style="width: 20%;">Sr.No.</th>
              <th style="width: 60%;">Title</th>

              @if(Gate::check('view_questionnaire') || Gate::check('edit_questionnaire') || Gate::check('delete_questionnaire') )
              <th>{{ __('adminlte::adminlte.actions') }}</th>
              @endif
            </tr>
          </thead>
          <tbody>
            <?php for ($i = 0; $i < count((is_countable($questionnairelist) ? $questionnairelist : [])); $i++) {
              $role = \App\Models\Role::where('id', $questionnairelist[$i]->role_id)->get();
            ?>
              <tr>
                <td class="display-none"></td>
                <td>{{ $i + 1 }}</td>
                <td>{{ $questionnairelist[$i]->title ?? 'N/A' }}</td>
                <td>
                  <a class="action-button" title="View Experts" href="{{route('questionnaires.view',base64_encode($questionnairelist[$i]->id))}}"><i class="text-info fa fa-eye"></i></a>
                </td>
              </tr>
            <?php } ?>
          </tbody>

          <tfoot>
            <tr>
              <th>Sr.No.</th>
              <th>Title</th>
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