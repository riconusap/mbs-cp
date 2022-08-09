@extends('user.layouts.main')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5 mb-5">
    <h1 class="display-4 text-white mb-3 mt-0 mt-lg-5">{{$title}}</h1>
    <div class="d-inline-flex text-white">
        <p class="m-0"><a class="text-white" href="{{route('dashboard-user')}}">Home</a></p>
        <p class="m-0 px-2">/</p>
        <p class="m-0">{{$title}}</p>
    </div>
</div>
<!-- Page Header Start -->


<!-- Blog Start -->
<div class="container py-5">
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-4">
            <img src="{{ asset('img/'. $selected->foto) }}" class="w-100 rounded shadow" alt="">
        </div>
        <div class="col-lg-8 d-flex flex-column justify-content-around">
            <div class="people-name d-flex flex-column text-center justify-content-center align-items-center">
                <h4>{{$selected->jabatan['jabatan']}}</h4>
                <h4>{{$selected->nama}}</h4>
            </div>
            <p>
                {{$selected->deskripsi}}
            </p>
        </div>
    </div>
    <div class="row mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-5">
                    <div class="owl-carousel team-carousel" data-aos="fade-right" data-aos-duration="2000">
                        @foreach ($attorney as $data)
                        <div class="team-item">
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="{{ asset('img/'. $data->foto) }}" alt="">
                                <div class="team-overlay position-absolute d-flex align-items-center justify-content-center m-3">
                                    <div class="d-flex align-items-center justify-content-start">
                                        <a class="btn btn-outline-secondary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="{{ route('data-detail-attorney', [$data->id]) }}"><i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="Detail"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-top-0 text-center" style="padding: 30px;">
                                <h5 class="font-weight-bold">{{$data->nama}}</h5>
                                <span>{{$data->jabatan['jabatan']}}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->
@endsection
