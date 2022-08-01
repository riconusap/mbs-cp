@extends('user.layouts.main')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5 mb-5">
        <h1 class="display-4 text-white mb-3 mt-0 mt-lg-5">Artikel</h1>
        <div class="d-inline-flex text-white">
            <p class="m-0"><a class="text-white" href="{{ route('dashboard-user') }}">Home</a></p>
            <p class="m-0 px-2">/</p>
            <p class="m-0">Artikel</p>
        </div>
    </div>
    <!-- Page Header Start -->


    <!-- Detail Start -->
    <div class="container py-5">
        <div class="row">
            <!-- Blog Detail Start -->
            <div class="col-lg-12">
                <div class="position-relative">
                    <img class="img-fluid w-100" src="{{ asset('storage/foto/' . $selected->img) }}" alt="">
                    <div class="position-absolute bg-primary d-flex flex-column align-items-center justify-content-center"
                        style="width: 80px; height: 80px; bottom: 0; left: 0;">
                        <h6 class="text-uppercase mt-2 mb-n2">{{ date('M', strtotime($selected->tanggal)) }}</h6>
                        <h1 class="m-0">{{ date('d', strtotime($selected->tanggal)) }}</h1>
                    </div>
                </div>
                <div class="pt-4 pb-2">
                    <div class="d-flex mb-3">
                        <div class="d-flex align-items-center">
                            <i class="far fa-bookmark text-primary"></i>
                            <a class="text-muted ml-2"
                                href="{{ route('data-artikel-user-by-kategori', [$selected->kategori->kategori]) }}">{{ $selected->kategori->kategori }}</a>
                            <p class="text-muted ml-2">{{ $selected->tanggal }}</p>
                        </div>
                    </div>
                    <h2 class="font-weight-bold">{{ $selected->judul }}</h2>
                </div>

                <div class="mb-5">
                    {!! $selected->isi !!}
                </div>

                <!-- Comment List Start -->
                <div class="mb-5">
                    <h3 class="font-weight-bold mb-4">{{ $selected->komentar->count() }} Comments</h3>
                    @foreach ($selected->komentar as $komentar)
                        <div class="media mb-4">
                            <img src="{{ asset('assets/img/avatar/avatar-1.png') }}" alt="Image"
                                class="img-fluid mr-3 mt-1" style="width: 45px;">
                            <div class="media-body">
                                <h6>{{ $komentar->email }}<small><i
                                            class="ml-2">{{ DateToText::dateToText($komentar->tanggal) }}</i></small>
                                </h6>
                                <p>{{ $komentar->isi_komentar }}</p>
                                <button data-id="{{ $komentar->id }}"
                                    class="btn btn-sm btn-outline-danger font-weight-semi-bold hapusKomentar">Hapus
                                    Komentar</button>
                                @foreach ($komentar->komentarChild as $komentarChild)
                                    <div class="media mt-4">
                                        <img src="{{ asset('assets/img/avatar/avatar-1.png') }}" alt="Image"
                                            class="img-fluid mr-3 mt-1" style="width: 45px;">
                                        <div class="media-body">
                                            <h6>{{ $komentarChild->email }}<small><i>{{ DateToText::dateToText($komentarChild->tanggal) }}</i></small>
                                            </h6>
                                            <p>{{ $komentarChild->isi_komentar }}</p>
                                            <button data-id="{{ $komentar->id }}"
                                                class="btn btn-sm btn-outline-danger font-weight-semi-bold hapusKomentarChild">Hapus
                                                Komentar</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Comment List End -->

                <!-- Comment Form Start -->
                @if ($selected->komentar->count() < 1)
                    <div class="border p-5">
                        <h3 class="font-weight-bold mb-4">Leave a comment</h3>
                        <form id="postForm">
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Message *</label>
                                <textarea id="message" cols="30" rows="5" name="isi" class="form-control"></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary float-right save"
                                    id="btn-save">Simpan</button>
                            </div>
                        </form>
                    </div>
                @endif
                <!-- Comment Form End -->
            </div>
            <!-- Blog Detail End -->

            <!-- Sidebar Start -->
            <!-- Sidebar End -->
        </div>
    </div>
    <!-- Detail End -->
@endsection
@section('custom-js')
    <script>
        $(function() {
            'use strict';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if ($("#postForm").length > 0) {
                $("#postForm").validate({
                    submitHandler: function(form) {
                        var fd = new FormData($('#postForm')[0]);
                        $('#btn-save').html('Sending..');
                        $.ajax({
                            type: "POST",
                            data: $('#postForm').serialize(),
                            url: "{{ route('post-edit-artikel') }}",
                            success: function(data) {
                                $('#postForm').trigger("reset");
                                $('#add').modal('hide');
                                Swal.fire({
                                    title: 'Berhasil!!!',
                                    // text: 'Data Berhasil Ditambah!',
                                    icon: 'success',
                                    customClass: {
                                        confirmButton: 'btn btn-primary'
                                    },
                                    buttonsStyling: false
                                }).then(function(result) {
                                    if (result.value) {
                                        window.location.href =
                                            "{{ route('data-artikel') }}";
                                    }
                                });
                            },
                            error: function(data) {
                                Swal.fire({
                                    title: 'Gagal Menambah Data!!!',
                                    text: data.responseJSON.error,
                                    icon: 'error',
                                    customClass: {
                                        confirmButton: 'btn btn-primary'
                                    },
                                    buttonsStyling: false
                                }).then(function(result) {
                                    if (result.value) {
                                        // location.back();
                                    }
                                });
                            }
                        });
                    }
                })
            }
        })
    </script>
@endsection
