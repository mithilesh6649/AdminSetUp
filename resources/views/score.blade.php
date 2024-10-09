@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>SCORES</h1>
@stop

@section('content')
<!-- Main content -->
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
    <div class="row">

      <?php
      $dummy_response = [
        [
          "country" => "Jordan",
          "region" => "Central Region",
          "expert_count" => 0,
          "the_biophysical_conditions_score" => 0,
          "tradeoff_intensity_score" => 0,
          "institutional_response_score" => 0,
          "total_score" => 0,
        ],
        [
          "country" => "Jordan",
          "region" => "Central Region2",
          "expert_count" => 0,
          "the_biophysical_conditions_score" => 0,
          "tradeoff_intensity_score" => 0,
          "institutional_response_score" => 0,
          "total_score" => 0,
        ],
        [
          "country" => "Jordan",
          "region" => "Central Region4",
          "expert_count" => 0,
          "the_biophysical_conditions_score" => 0,
          "tradeoff_intensity_score" => 0,
          "institutional_response_score" => 0,
          "total_score" => 0,
        ],
        [
          "country" => "Jordan",
          "region" => "Central Region5",
          "expert_count" => 0,
          "the_biophysical_conditions_score" => 0,
          "tradeoff_intensity_score" => 0,
          "institutional_response_score" => 0,
          "total_score" => 0,
        ]
      ];
      ?>
      @foreach($finalScore as $key => $item)


      <div class="col-md-6 col-lg-4">
        <div class="card mb-4">
          <div class="card-body">
            <h5 class="card-title">{{$item["country"]}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $item["region"]}}</h6>
            <ul class="list-group">
              <li class="list-group-item">
                Experts
                <span class="badge bg-secondary">{{ $item['expert_count']}}</span>
              </li>
              <li class="list-group-item">
                Biophysical Conditions Score
                <span class="badge bg-primary">{{ $item['the_biophysical_conditions_score']}}</span>
              </li>
              <li class="list-group-item">
                Tradeoff Intensity Score
                <span class="badge bg-primary">{{ $item['tradeoff_intensity_score']}}</span>
              </li>
              <li class="list-group-item">
                Institutional Response Score
                <span class="badge bg-primary">{{ $item['institutional_response_score']}}</span>
              </li>
              <li class="list-group-item">
                @if ($loop->last)
                Total Score
                @else
                Region Score
                @endif
                <span class="badge bg-success">{{ $item['total_score']}}</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>



</section>
@endsection