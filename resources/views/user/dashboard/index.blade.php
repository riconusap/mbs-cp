@extends('user.layouts.main')

@section('content')
    <section id="home" data-aos-duration="1000" data-aos="fade-down">
        <div class="container-fluid p-0 mb-5">
            <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                    <!-- <li data-target="#header-carousel" data-slide-to="1"></li>
                    <li data-target="#header-carousel" data-slide-to="2"></li> -->
                </ol>
                <div class="carousel-inner ">
                    <div class="carousel-item active">
                        <img class="img-fluid w-100" style="height: 100vh;" src="{{asset('user/img/bg1.jpg')}}" alt="Image">
                        <div class="carousel-caption d-flex align-items-center justify-content-center">
                            <div class="p-5" style="width: 100%; max-width: 900px;">
                                <h5 class="text-white text-uppercase mb-md-3">R .PRAMA WIJAWA & PARTNERS</h5>
                                <h1 class="display-3 text-white mb-md-4">COMMITTED TO EXCELLENCE</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Carousel End -->


    <!-- About Start -->
    <section data-aos="fade-right" data-aos-duration="1000" data-aos-easing="ease-in-sine" id="about">
        <div class="container-fluid py-5">
            <div class="container">
                <div class="row align-items-center pb-1">
                    <div data-aos="fade-right" data-aos-duration="1000" class="col-lg-5 border-0">
                        <img class="img-thumbnail border-0 h-100" src="{{asset('user/img/about.png')}}" alt="">
                    </div>
                    <div data-aos="fade-left" data-aos-duration="1000" class="col-lg-7 mt-5 mt-lg-0">
                        <h1 class="mt-2 mb-3">About Our Firm</h1>
                        <h4>{{$tp->nama_perusahaan}}</h4>
                        <p class="mb-4">
                            {!! $tp->tentang_perusahaan !!}
                        </p>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- About End -->


    <!-- Services Start -->
    @if ($expertise->count() > 0)
    <section data-aos="fade-right" data-aos-duration="1000" id="service">
        <div class="container-fluid pt-5 pb-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mb-5" data-aos="fade-right" data-aos-duration="1500">
                        <h1 class="mt-2 mb-3">OUR EXPERTISE</h1>
                        <h4 class="font-weight-normal text-muted mb-4">Besides providing legal services from set up
                            a new company, contract drafting and
                            negotiation, we also provide legal advice and represent company in securing its business
                            deals and resolve their legal problem</h4>
                    </div>
                    <div class="col-lg-12" data-aos="fade-right" data-aos-duration="2000">
                        <div class="row">
                            <div class="col-md-6 mb-5">
                                @foreach ($expertise as $data)
                                <div class="d-flex">
                                    <img src="{{ asset('storage/foto/'. $data->img) }}" width="150px" class="rounded" alt="Corprate Law">
                                    <div class="d-flex flex-column ml-3">
                                        <h5 class="font-weight-bold mb-3">{{$data->expertise}}</h5>
                                        <p>{{$data->deskripsi}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- Services End -->

    <!-- Team Start -->
    <section data-aos="fade-right" data-aos-duration="1000" id="teams">
        <div class="container-fluid pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-5" data-aos="fade-right" data-aos-duration="1000">
                        <h1 class="mt-2 mb-3">Meet Experts of Behind Work</h1>
                        <h4 class="font-weight-normal text-muted mb-4">We provide comprehensive and integrated
                            answers, so it will eliminate doubts for individuals,
                            business people and even companies to be able to take strategic steps legally</h4>
                        <a href="{{ route('data-attorney') }}" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold">Meet All
                            Experts</a>
                    </div>
                    <div class="col-lg-8 mb-5">
                        <div class="owl-carousel team-carousel" data-aos="fade-right" data-aos-duration="2000">
                            @foreach ($pegawai as $data)
                            <div class="team-item">
                                <div class="position-relative">
                                    <img class="img-fluid w-100" src="{{ asset('storage/foto/'. $data->foto) }}" alt="">
                                    <div
                                        class="team-overlay position-absolute d-flex align-items-center justify-content-center m-3">
                                        <div class="d-flex align-items-center justify-content-start">
                                            <a class="btn btn-outline-secondary rounded-circle text-center mr-2 px-0"
                                                style="width: 38px; height: 38px;" href="{{route('data-detail-attorney', [$data->id])}}"><i
                                                    class="fas fa-eye" data-toggle="tooltip" data-placement="top"
                                                    title="Detail"></i></a>
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
    </section>
    <!-- Team End -->

    <!-- Blog Start -->
    <section id="project" data-aos="fade-up" data-aos-duration="1000">
        <div class="container-fluid pt-5">
            <div class="container">
                <div class="text-center">
                    <h1 class="mt-2 mb-5">Articles</h1>
                </div>
                <div class="row">
                    @foreach ($artikel as $data)
                    <div class="col-md-4 mb-5">
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="{{asset('storage/foto/'.$data->img)}}" alt="">
                            <div class="position-absolute bg-primary d-flex flex-column align-items-center justify-content-center"
                                style="width: 80px; height: 80px; bottom: 0; left: 0;">
                                <h6 class="text-uppercase mt-2 mb-n2">{{date("M",strtotime($data->tanggal))}}</h6>
                                <h1 class="m-0">{{date("d",strtotime($data->tanggal))}}</h1>
                            </div>
                        </div>
                        <div class="border border-top-0" style="padding: 30px;">
                            <div class="d-flex mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="far fa-bookmark text-primary"></i>
                                    <a class="text-muted ml-2" href="{{ route('data-artikel-user-by-kategori', [$data->kategori->kategori]) }}">{{ $data->kategori->kategori }}</a>
                                </div>
                            </div>
                            <a class="h5 font-weight-bold" href="{{ route('data-detail-artikel-user', [$data->slug]) }}">{{$data->judul}}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section data-aos="fade-right" data-aos-duration="1000" data-aos-easing="ease-in-sine">
        <div class="container-fluid py-5">
            <div class="container">
                <div data-aos="fade-right" class="row mt-4">
                    <div class="col-md-4">
                        <div class="card border-0">
                            <div class="card-header bg-transparent border-0 ">
                                <h5 class="font-weight-bold">Email</h5>
                            </div>
                            <div class="card-body d-flex align-items-center">
                                <i class="fa fa-2x fa-envelope-open text-primary mr-3"></i>
                                <div class="d-flex flex-column">
                                    <p class="m-0">{{$tp->email_perusahaan}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0">
                            <div class="card-header bg-transparent border-0 ">
                                <h5 class="font-weight-bold">Phone</h5>
                            </div>
                            <div class="card-body d-flex align-items-center">
                                <i class="fa fa-2x fa-phone-alt text-primary mr-3"></i>
                                <div class="d-flex flex-column">
                                    <p class="m-0">{{$tp->no_telp_perusahaan}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0">
                            <div class="card-header bg-transparent border-0 ">
                                <h5 class="font-weight-bold">Office</h5>
                            </div>
                            <div class="card-body d-flex align-items-center">
                                <i class="fas fa-2x fa-building text-primary mr-3"></i>
                                <div class="d-flex flex-column">
                                    <p class="m-0">{{$tp->alamat_perusahaan}} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
