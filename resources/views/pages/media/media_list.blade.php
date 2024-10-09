@extends('adminlte::page')

@section('title', 'media')

@section('content_header')
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header alert d-flex justify-content-between align-items-center">
                <h3>Media</h3>
                {{-- @can('add_mobile_page')<a class="btn btn-success" href="{{ route('add_mobile_page') }}">Create Mobile Page</a>@endcan --}}
                <div style="height: 41px;"></div>
            </div>
            <div class="card-body">
                <table style="width:100%" id="pages-list" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="display-none"></th>
                            <th>Title</th>
                            @can('Edit_media_content')
                               <th>Actions</th>
                            @endcan
                        </tr> 
                    </thead>
                    <tbody>
                        @forelse($medialist as $media)
                        <tr>
                            <td class="display-none"></td>
                            <td>{{$media->name}}</td>
                           @can('Edit_media_content')
                            <td>
                                @if($media->slug=='mobile')
                                <a href="{{ route('media.mobile.list', ['slug' =>$media->slug]) }}" title="Edit"><i class="text-warning fa fa-edit"></i></a>
                                @elseif($media->slug=='website')
                                <a href="{{ route('media.website.list', ['slug' =>$media->slug]) }}" title="Edit"><i class="text-warning fa fa-edit"></i></a>
                                @endif
                            </td>
                          @endcan
                          
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">No data available in table</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
    $('#pages-list').DataTable({
        stateSave: true,
        columnDefs: [{
            targets: 0,
            render: function(data, type, row) {
                return data.substr(0, 2);
            }
        }]
    });
</script>
@stop