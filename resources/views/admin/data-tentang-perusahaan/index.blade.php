@extends('admin.layouts.main')

@section('custom-css')
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <img width="35px" class="mr-3" src="{{ asset('img/' . $tp->logo_perusahaan) }}" alt="">
            <h1>Kelola Data Perusahaan</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary" id="editButton"><i class="fas fa-edit mr-2"></i>Edit
                    </button>
                    <h3 id="title-header" class="d-none">Edit Data Perusahaan</h3>
                </div>
                <div class="card-body">
                    <form class="d-none" id="postForm" action="">
                        <div class="row">
                            @foreach ($data_tp as $data)
                                <div class="col-md-9">
                                    <label for="">Nama Perusahaan</label>
                                    <input type="hidden" name="post_id" value="{{ $data->id }}" id="post_id">
                                    <input type="text" value="{{ $data->nama_perusahaan }}" name="nama_perusahaan"
                                        class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Inisial Perusahaan</label>
                                    <input type="text" value="{{ $data->inisial_perusahaan }}" name="inisial_perusahaan"
                                        class="form-control">

                                </div>
                                <div class="col-md-6">
                                    <label for="">Nomor Telepon Perusahaan</label>
                                    <input type="number" maxlength="13" value="{{ $data->no_telp_perusahaan }}" class="form-control"
                                        name="no_telp_perusahaan">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Nomor Telepon Perusahaan ( Lainnya )</label>
                                    <input type="number" maxlength="13" value="{{ $data->no_telp2_perusahaan }}" class="form-control"
                                        name="no_telp2_perusahaan">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Email Perusahaan</label>
                                    <input type="text" value="{{ $data->email_perusahaan }}" name="email_perusahaan"
                                        class="form-control">

                                </div>
                                <div class="col-md-6">
                                    <label for="">Alamat Perusahaan</label>
                                    <input type="text" value="{{ $data->alamat_perusahaan }}" name="alamat_perusahaan"
                                        class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Alamat Perusahaan ( Lainnya )</label>
                                    <input type="text" value="{{ $data->alamat2_perusahaan }}" name="alamat2_perusahaan"
                                        class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Logo Perusahaan</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="foto" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Tentang Perusahaan</label>
                                    @php
                                        $tentang_perusahaan = $data->tentang_perushaan;
                                    @endphp
                                    <textarea type="text" name="tentang_perusahaan" class="form-control" rows="9">{{ $data->tentang_perusahaan }}</textarea>
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-success d-none" id="submitButton"><i
                                    class="fas fa-save  mr-2"></i>save
                            </button>
                        </div>
                    </form>
                    <div class="showData" id="showData">
                        <div class="row">
                            @foreach ($data_tp as $data)
                                <div class="col-md-9">
                                    <label for="">Nama Perusahaan</label>
                                    <input type="text" value="{{ $data->nama_perusahaan }}" class="form-control"
                                        readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Inisial Perusahaan</label>
                                    <input type="text" value="{{ $data->inisial_perusahaan }}" class="form-control"
                                        readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Nomor Telepon Perusahaan</label>
                                    <input type="text" value="{{ $data->no_telp_perusahaan }}" class="form-control"
                                        readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Nomor Telepon Perusahaan ( Lainnya )</label>
                                    <input type="text" value="{{ $data->no_telp2_perusahaan }}" class="form-control"
                                        readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Email Perusahaan</label>
                                    <input type="text" value="{{ $data->email_perusahaan }}" class="form-control"
                                        readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Alamat Perusahaan</label>
                                    <input type="text" value="{{ $data->alamat_perusahaan }}" class="form-control"
                                        readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Alamat Perusahaan ( Lainnya )</label>
                                    <input type="text" value="{{ $data->alamat2_perusahaan }}" class="form-control"
                                        readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Logo Perusahaan</label>
                                    <br>
                                    <img width="35px" class="mr-3"
                                        src="{{ asset('img/' . $data->logo_perusahaan) }}" alt="">
                                </div>
                                <div class="col-md-12">
                                    <label for="">Tentang Perusahaan</label>
                                    <textarea type="text" class="form-control" rows="9" readonly>{{ $data->tentang_perusahaan }}</textarea>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-success d-none" id="saveButton"><i
                            class="fas fa-save  mr-2"></i>save
                    </button>
                    <button type="button" class="btn btn-danger d-none" id="cancelButton"><i
                            class="fas fa-window-close  mr-2"></i>Cancel
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('custom-js')
    <script>
        $(function() {
            'use strict';
        })
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {

            $('#editButton').click(function() {
                $(this).addClass('d-none');
                $('#saveButton').removeClass('d-none');
                $('#cancelButton').removeClass('d-none');
                $('#title-header').removeClass('d-none');
                $('#showData').addClass('d-none');
                $('#postForm').removeClass('d-none')
            });

            $('#cancelButton').click(function() {
                $(this).addClass('d-none');
                $('#saveButton').addClass('d-none');
                $('#title-header').addClass('d-none');
                $('#showData').removeClass('d-none');
                $('#editButton').removeClass('d-none');
                $('#postForm').addClass('d-none');
                $('#postForm').trigger('reset');
            });
            $("#saveButton").click(function() {
                $('#submitButton').click();
            })
        });
        if ($('#postForm').length > 0) {
            $("#postForm").validate({
                submitHandler: function(form) {
                    var fd = new FormData($('#postForm')[0]);
                    $('#btn-save').html('Sending..');
                    $.ajax({
                        type: "POST",
                        data: fd,
                        url: "{{ route('post-edit-tentang-perusahaan') }}",
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
                                    location.reload();
                                }
                            });
                        },
                        error: function(data) {
                            Swal.fire({
                                title: 'Gagal Menambah Data!!!',
                                // text: 'Data Berhasil Ditambah!',
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
    </script>
@endsection
