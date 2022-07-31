@extends('user.layouts.main')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5 mb-5">
        <h1 class="display-4 text-white mb-3 mt-0 mt-lg-5">Articles</h1>
        <div class="d-inline-flex text-white">
            <p class="m-0"><a class="text-white" href="{{ route('dashboard-user') }}">Home</a></p>
            <p class="m-0 px-2">/</p>
            <p class="m-0">Articles</p>
        </div>
    </div>
    <!-- Page Header Start -->


    <!-- Blog Start -->
    <div class="container py-5">
        <div class="row">
            <!-- Sidebar Start -->
            <div class="col-lg-4 mt-5 mt-lg-0">
                <!-- Search Form Start -->
                <div class="mb-5">
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-lg" placeholder="Keyword">
                            <div class="input-group-append">
                                <span class="input-group-text bg-transparent text-primary"><i
                                        class="fa fa-search"></i></span>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Search Form End -->

                <!-- Category Start -->
                <div class="mb-5">
                    <h3 class="font-weight-bold mb-4">Categories</h3>
                    <ul class="list-group">
                        @foreach ($kategori as $data)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a class="font-weight-semi-bold text-decoration-none" href="{{route('data-artikel-user-by-kategori', [$data->kategori])}}"><i
                                    class="fa fa-angle-right mr-2"></i>{{$data->kategori}}</a>
                            <span class="badge badge-primary badge-pill">{{$data->jumlah}}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Category End -->

                <!-- Recent Post Start -->
                <div class="mb-5">
                    <h3 class="font-weight-bold mb-4">Recent Post</h3>
                    @foreach ($latestArtikel as $data)
                    <div class="d-flex mb-3">
                        <img class="img-fluid" src="{{asset('storage/foto/'.$data->img)}}" style="width: 80px; height: 80px;" alt="">
                        <div class="d-flex align-items-center border border-left-0 px-3" style="height: 80px;">
                            <a class="text-secondary font-weight-semi-bold" href="{{ route('data-detail-artikel-user', [$data->slug]) }}">{{ $data->judul }}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Recent Post End -->
            </div>
            <!-- Sidebar End -->
            <!-- Blog Grid Start -->
            <div class="col-lg-8">
                <div class="row">
                    @foreach ($artikel as $data)
                    <div class="col-md-6 mb-5">
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
                                <!-- <div class="d-flex align-items-center">
                                <img class="rounded-circle" style="width: 40px; height: 40px;" src="img/user.jpg" alt="">
                                <a class="text-muted ml-2" href="">John Doe</a>
                            </div> -->
                                <div class="d-flex align-items-center">
                                    <i class="far fa-bookmark text-primary"></i>
                                    <a class="text-muted ml-2" href="">{{$data->kategori->kategori}}</a>
                                </div>
                            </div>
                            <a class="h5 font-weight-bold" href="{{ route('data-detail-artikel-user', [$data->slug]) }}">{{$data->judul}}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12">
                        {{ $artikel->links() }}
                    </div>
                </div>
            </div>
            <!-- Blog Grid End -->
        </div>
    </div>
    <!-- Blog End -->
@endsection
