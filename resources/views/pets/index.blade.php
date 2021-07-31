@extends('include.app')
@section('title', 'Pets')

@section('content')
    <div class="row">
        @foreach ($pets as $pet)
        <div class="col-xl-3 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-content">
                    <img src="pet_thumbs/{{$pet->thumb}}" class="card-img-top img-fluid"
                        alt="Imagem do pet- {{ $pet->nickname }}">
                    <div class="card-body">
                        <a href="{{ route('pets.show', $pet->id ) }}"><h5 class="card-title">{{ $pet->nickname }}</h5></a>
                        <p class="card-text">
                            {{ $pet->description }}
                        </p>
                        <div class="row">
                            <div class="col-md-2 mx-auto">
                                <a href="{{ route('pets.show', $pet->id ) }}"><button class="btn btn-primary mb-5">Ver</button></a>
                            </div>
                            </div>
                        </div>

                </div>
                <ul class="list-group list-group-flush">

                </ul>
            </div>
        </div>
        @endforeach
        <div class="d-flex justify-content-center">
            {!! $pets->links() !!}
        </div>
    </div>
@endsection
