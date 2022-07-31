@extends('admin.layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kelola Client</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-primary" id="addButton"><i
                                    class="fas fa-plus mr-2"></i>Tambah</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table dataTables table-tranparent">
                                    <thead>
                                        <tr>
                                            <th>
                                                No
                                            </th>
                                            <th>Nama Client</th>
                                            <th>Logo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($client as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->nama_client }}</td>
                                                <td>
                                                    <img class="rounded-circle" width="35" data-toggle="tooltip"
                                                        title="{{$data->nama_client}} Logo" src="{{ asset('storage/foto/' . $data->logo) }}"
                                                        alt="{{$data->nama_client}} Logo">
                                                </td>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-icon rounded-circle btn-outline-primary editButton"
                                                        data-toggle="tooltip" data-placement="top" title="Edit"
                                                        data-id="{{ $data->id }}" data-nama="{{ $data->nama_client }}">
                                                        <i class="fas fa-edit" style="width: 100%"></i>
                                                    </button>
                                                    <button type="button"
                                                    data-id="{{ $data->id }}"
                                                        class="btn btn-icon rounded-circle btn-outline-danger delete"
                                                        data-toggle="tooltip" data-placement="top" title="Hapus">
                                                        <i class="fas fa-trash" style="width: 100%"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="add" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" id="postForm">
                        <div class="row">
                            {{-- <div class="col-md-6">
                                <label for="namapegawai" class="form-label">Nip Pegawai</label>
                                <input type="text" class="form-control" value="" id="nip_pegawai" >
                            </div> --}}
                            <div class="editForm">
                                <input type="hidden" name="post_id" id="post_id">
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="namapegawai" class="form-label">Nama</label>
                                <input type="text" class="form-control" placeholder="Masukan Nama Client" name="nama"
                                    id="nama_client" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="namapegawai" class="form-label">Input Logo</label>
                                <button id="input-button" class="btn-block btn btn-primary">Pilih Logo</button>
                                <input type="file" type="button" name="foto" id="file"
                                    class="form-control d-none" value="">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btn-save">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
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

            $('#input-button').click(function(event) {
                event.preventDefault();
                $('#file').click();
            });

            $('#addButton').click(function() {
                $('#add').modal('show');
                $('#postForm').trigger('reset');
            });
            
            $('.editButton').click(function() {
                $('#postForm').trigger('reset');

                var id = $(this).data('id');
                var jenis = $(this).data('jenis');
                var nama = $(this).data('nama');

                $('#post_id').val(id);
                $('#nama_client').val(nama);

                $('#add').modal('show');
            });

            $('body').on('click', '.delete', function() {
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
                            url: "{{ url('data-client/delete-client') }}" + '/' +
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
        });
        if ($("#postForm").length > 0) {
            $("#postForm").validate({
                submitHandler: function(form) {
                    var fd = new FormData($('#postForm')[0]);
                    $('#btn-save').html('Sending..');
                    $.ajax({
                        type: "POST",
                        data: fd,
                        url: "{{ route('post-edit-client') }}",
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
