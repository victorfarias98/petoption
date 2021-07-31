@extends('include.app')
@section('title', 'Pets')

@section('content')
    <div class="row">
        @foreach ($pets as $pet)
        <div class="col-xl-3 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-content">
                    <img src="{{ $pet->thumb  }}" class="card-img-top img-fluid"
                        alt="singleminded">
                    <div class="card-body">
                        <h5 class="card-title">{{ $pet->nickname }}</h5>
                        <p class="card-text">
                            {{ $pet->description }}

                        </p>
                    </div>
                </div>
                <ul class="list-group list-group-flush">

                </ul>
            </div>
        </div>
        @endforeach
    </div>
@endsection
