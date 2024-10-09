@extends('adminlte::page')

@section('title', 'Data Analysis')

@section('content_header')
@stop

@section('content')

<section class="content">
  <style>
    .card {
      border: 1px solid rgba(0, 0, 0, 0.125);
      border-radius: 0.25rem;
  }

  .card-title {
      font-size: 1.25rem;
      margin-bottom: 0.5rem;
      text-align: center;
  }

  .card-subtitle {
      font-size: 1rem;
      color: rgba(0, 0, 0, 0.6);
      margin-bottom: 1rem;
      text-align: center;
  }

  .list-group-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      border: none;
      padding: 0.5rem 0;
  }

  .list-group-item .badge {
      font-size: 0.9rem;
      padding: 0.4rem 0.6rem;
  }
</style>


<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header alert d-flex justify-content-between align-items-center">
            <h3>Report Scores </h3>
            <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
        </div>

        <div class="card-body">

            <form id="countryForm">
              @csrf
              <div class="card-body">
                <div class="row">

                  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
                    <div class="form-group">
                      <label for="status">Countries</label>
                      <select class="form-control" name="country" id="country">
                        @foreach ($countries as $key => $value)
                        <option value="{{$value->id}}" {{ $value->iso2 == "JO" ? 'selected' : '' }}>{{$value->country_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>
    </div>
</form>


<!-- Country Reports Section START -->
<div class="container">
  <div class="row" id="country_score_section">

  </div>
</div>
<!-- Country Reports Section END -->

</div>

</div>
</div>
</div>
</div>

</section>
@endsection


@section('js')
<script>
  $(document).ready(function() {

    //When page refresh show by default country data
    var country_id = $("#country option:selected").val();
    calculateScore(country_id);

    //When Country Change
    $(document).on('change', '#country', function() {
      var country_id = $(this).val();
      calculateScore($(this).val());
  });

    //Common Calculate Score Method
    function calculateScore(country_id) {
      var form = {
        country_id: country_id
    };
    $.ajax({
        type: "POST",
        url: "{{ route('calculate-score') }}",
        data: form,
        dataType: "JSON",
        _token: '{{csrf_token()}}',
        success: function(response) {

          $('#country_score_section').empty();
          var html = ``;

          response.data.forEach((item, key) => {


            coloer ='secondary';
            totalScore =0;
            if (item.color==1) {

                totalScore = isNaN(item.total_score / item.expert_count) ? 0 : Math.ceil(item.total_score / item.expert_count);


                if(totalScore>0 && totalScore<=23){               

                    coloer ="success";

                }else if(totalScore>=24 &&  totalScore<=110){

                    coloer ="warning";
                }else if(totalScore>=111 &&  totalScore){
                    
                    coloer ="danger";
                }


            }



            html += ` 
            <div class="col-md-6 col-lg-4">
            <div class="card"> 
            <h5 class="card-title mt-3">${item.country}</h5>
            <div class="card-body">
            <h6 class="card-subtitle text-muted">${item.region}</h6>
            <ul class="list-group">
            <li class="list-group-item">
            Total Experts
            <span class="badge bg-secondary">${item.expert_count}</span>
            </li>
            <li class="list-group-item">
            Biophysical Conditions Score
            <span class="badge bg-secondary">${isNaN(item.the_biophysical_conditions_score  / item.expert_count) ? 0 : Math.ceil(item.the_biophysical_conditions_score  / item.expert_count) }</span>
            </li>
            <li class="list-group-item">
            Tradeoff Intensity Score
            <span class="badge bg-secondary">${isNaN(item.tradeoff_intensity_score  / item.expert_count) ? 0 : Math.ceil(item.tradeoff_intensity_score / item.expert_count) }</span>
            </li>
            <li class="list-group-item">
            Institutional Response Scores
            <span class="badge bg-secondary">${isNaN(item.institutional_response_score  / item.expert_count) ? 0 : Math.ceil(item.institutional_response_score  / item.expert_count) }</span>
            </li>
            <li class="list-group-item">
            ${key === response.data.length - 1 ? 'Total Score' : 'Region Score'}


            <span class="badge bg-${coloer}">${isNaN(item.total_score / item.expert_count) ? 0 : Math.ceil(item.total_score / item.expert_count)}</span>

            </li>
            </ul>
            </div>
            </div>
            </div>
            `;
        });
          $('#country_score_section').append(html);
      }
  });
}


});
</script>
@stop