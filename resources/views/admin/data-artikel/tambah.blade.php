@extends('admin.layouts.main')

@section('content')
    <section class="section">
        <div class="section-header d-flex justify-content-between align-items-center">
            @if ($kategori_halaman === 'tambah')
                <div class="">
                    <button class="btn btn-outline-primary btn-back"><i class="fas fa-arrow-left mr-2"></i>Back</button>
                    <h1 class="ml-3">Tambah Artikel</h1>
                </div>
            @else
                <div class="d-flex align-items-center">
                    <button class="btn btn-outline-primary btn-back"><i class="fas fa-arrow-left mr-2"></i>Back</button>
                    <h1 class="ml-3">Detail Artikel</h1>
                </div>
                <div class="">
                    <button class="btn btn-primary editBtn"><i class="fas fa-edit mr-2"></i>Edit Artikel</button>
                    <a href="{{ route('data-detail-artikel-user', [$detail->slug])  }}" class="btn btn-info"><i class="fas fa-globe mr-2"></i>Lihat Artikel</a>
                </div>
            @endif
        </div>
        <div class="section-body">
            @if ($kategori_halaman === 'tambah')
                <form id="postForm">
                    <div class="row mb-3">
                        <div class="col-6 mb-3">
                            <label for="" class="form-label">Judul</label>
                            <input type="text" name="post_id" id="post_id" class="form-control d-none" required>
                            <input type="text" name="judul" id="judul" class="form-control" required>
                        </div>
                        <div class="col-3 mb-3">
                            <label for="" class="form-label">Kategori Artikel</label>
                            <select name="kategori" id="kategori" class="select2 w-100">
                                <option selected disabled value="0">Pilih Kategori</option>
                                @foreach ($kategori as $data)
                                    <option value="{{ $data->id }}">{{ $data->kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3 mb-3">
                            <label for="" class="form-label">Thumbnail</label>
                            <input type="file" name="foto" id="foto" class="form-control" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="" class="form-label">Rangkuman</label>
                            <textarea id="deskripsi" cols="30" rows="10" maxlength="140" name="summary" class="form-control" required></textarea>
                            <p class="text-muted">Maksimal 140 Karakter</p>
                        </div>
                        <div class="col-12 mb-3">
                            <textarea name="isi" id="editor" required></textarea>
                        </div>
                        <div class="col-12 ">

                            <button type="submit" class="btn btn-primary float-right" id="btn-save">Simpan</button>
                        </div>
                    </div>
                </form>
            @else
                <form id="postForm">
                    <div class="row mb-3">
                        <div class="col-md-9 col-sm-12">
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label for="" class="form-label">Judul</label>
                                    <input type="text" name="post_id" id="post_id" value="{{ $detail->id }}" class="form-control d-none"
                                        value="{{ $detail->id }}" required>
                                    <input type="text" name="judul" id="judul" class="form-control"
                                        value="{{ $detail->judul }}" required readonly>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="" class="form-label">Penulis</label>
                                    <input type="text" name="author" id="author" class="form-control"
                                        value="{{ $detail->author->name }}" readonly>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="" class="form-label">tanggal</label>
                                    <input type="text" name="tanggal" id="tanggal" class="form-control"
                                        value="{{ DateToText::dateToText($detail->tanggal) }}" readonly>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="" class="form-label">Kategori Artikel</label>
                                    <select name="kategori" id="kategori" class="select2 w-100" disabled>
                                        <option disabled value="0">Pilih Kategori</option>
                                        @foreach ($kategori as $data)
                                            <option {{ $data->id == $detail->master_kategori_id ? 'selected' : '' }}
                                                value="{{ $data->id }}">{{ $data->kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div id="imgDiv" class="col-md-3 col-sm-12 mb-3 d-flex flex-column">
                            <label for="" class="form-label">Thumbnail</label>
                            <img src="{{ asset('storage/foto/' . $detail->img) }}" class="rounded" alt="">
                        </div>
                        <div class="col-3 mb-3">
                            <label for="" class="form-label">Ubah Thumbnail</label>
                            <input type="file" name="foto" id="foto" class="form-control" disabled>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="" class="form-label">Rangkuman</label>
                            <textarea id="deskripsi" cols="30" rows="10" maxlength="140" name="summary" class="form-control"
                                required readonly>{{ $detail->summary }}</textarea>
                            <p class="text-muted">Maksimal 140 Karakter</p>
                        </div>
                        <div class="col-12 mb-3 d-none divEditor">
                            <textarea name="isi" id="editor" required>{{ $detail->isi}}</textarea>
                        </div>
                        <div class="col-12 mb-3 divIsi">
                            {!! $detail->isi !!}
                        </div>
                        <div class="col-12 mb-3">
                            <h3 class="font-weight-bold mb-4">{{ $detail->komentar->count() }} Komentar</h3>
                            @foreach ($detail->komentar as $komentar)
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
                        <div class="col-12 ">
                            <button class="d-none btn btn-outline-primary float-right cancel-edit"
                                id="btn-save">Cancel</button>
                            <button type="submit" class="d-none btn btn-primary float-right save-edit"
                                id="btn-save">Simpan</button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </section>
@endsection
@section('custom-js')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script>
        $(function() {
            'use strict';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.btn-back').click(function() {
                window.location.href =
                    "{{ route('data-artikel') }}";
            });
            $('.editBtn').click(function(){
                $('.save-edit').removeClass('d-none');
                $('.cancel-edit').removeClass('d-none');
                $(this).addClass('d-none');
                $('.form-control').removeAttr('readonly');
                $('.form-control').removeAttr('disabled');
                $('.divEditor').removeClass('d-none');
                $('.divIsi').addClass('d-none');
                $('.select2').removeAttr('disabled');
            });
            $('.cancel-edit').click(function(e){
                e.preventDefault();
                $('.save-edit').addClass('d-none');
                $('.editBtn').removeClass('d-none');
                $(this).addClass('d-none');
                $('.form-control').attr('readonly','true');
                $('.form-control').attr('disabled','true');
                $('.divEditor').addClass('d-none');
                $('.divIsi').removeClass('d-none');
                $('.select2').attr('disabled','true');
            });
            ClassicEditor
                .create(document.querySelector('#editor'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
            $('body').on('click', '.hapusKomentar', function(e) {
                e.preventDefault();
                // alert();
                var post_id = $(this).attr('data-id');
                // console.log(post_id);
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Anda tidak akan dapat membatalkan perintah ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus!',
                    customClass: {
                        confirmButton: 'btn btn-primary',
                        cancelButton: 'btn btn-outline-danger ml-1'
                    },
                    buttonsStyling: false
                }).then(function(result) {
                    if (result.value) {
                        $.ajax({
                            type: "DELETE",
                            url: "{{ url('delete-komentar') }}" + '/' +
                                post_id,
                            success: function(data) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Terhapus!',
                                    text: 'Data sudah berhasil terhapus.',
                                    customClass: {
                                        confirmButton: 'btn btn-success'
                                    },
                                    buttonsStyling: false
                                }).then(function(result) {
                                    if (result.value) {
                                        location.reload();
                                    }
                                });
                            },
                            error: function(data) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Terhapus!',
                                    text: 'Data sudah berhasil terhapus.',
                                    customClass: {
                                        confirmButton: 'btn btn-success'
                                    },
                                    buttonsStyling: false
                                }).then(function(result) {
                                    if (result.value) {
                                        location.reload();
                                    }
                                });
                            }
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire({
                            title: 'Dibatalkan',
                            text: 'Data dibatalkan untuk dihapus',
                            icon: 'error',
                            customClass: {
                                confirmButton: 'btn btn-success'
                            }
                        });
                    }
                });
            });
            $('body').on('click', '.hapusKomentarChild', function(e) {
                e.preventDefault();
                // alert();
                var post_id = $(this).attr('data-id');
                // console.log(post_id);
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Anda tidak akan dapat membatalkan perintah ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus!',
                    customClass: {
                        confirmButton: 'btn btn-primary',
                        cancelButton: 'btn btn-outline-danger ml-1'
                    },
                    buttonsStyling: false
                }).then(function(result) {
                    if (result.value) {
                        $.ajax({
                            type: "DELETE",
                            url: "{{ url('delete-komentar-child') }}" + '/' +
                                post_id,
                            success: function(data) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Terhapus!',
                                    text: 'Data sudah berhasil terhapus.',
                                    customClass: {
                                        confirmButton: 'btn btn-success'
                                    },
                                    buttonsStyling: false
                                }).then(function(result) {
                                    if (result.value) {
                                        location.reload();
                                    }
                                });
                            },
                            error: function(data) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Terhapus!',
                                    text: 'Data sudah berhasil terhapus.',
                                    customClass: {
                                        confirmButton: 'btn btn-success'
                                    },
                                    buttonsStyling: false
                                }).then(function(result) {
                                    if (result.value) {
                                        location.reload();
                                    }
                                });
                            }
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire({
                            title: 'Dibatalkan',
                            text: 'Data dibatalkan untuk dihapus',
                            icon: 'error',
                            customClass: {
                                confirmButton: 'btn btn-success'
                            }
                        });
                    }
                });
            });
            if ($("#postForm").length > 0) {
                $("#postForm").validate({
                    submitHandler: function(form) {
                        var fd = new FormData($('#postForm')[0]);
                        $('#btn-save').html('Sending..');
                        $.ajax({
                            type: "POST",
                            data: fd,
                            url: "{{ route('post-edit-artikel') }}",
                            processData: false,
                            contentType: false,
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
@section('custom-css')
    <style>
        .ck-file-dialog-button {
            display: none;
        }
    </style>
@endsection
