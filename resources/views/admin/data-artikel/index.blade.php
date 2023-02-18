@extends('admin.layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kelola Artikel</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('data-artikel-tambah') }}" type="button" class="btn btn-primary" id="addButton"><i
                                    class="fas fa-plus mr-2"></i>Tambah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table dataTables table-tranparent">
                                    <thead>
                                        <tr>
                                            <th>
                                                No
                                            </th>
                                            <th>Judul</th>
                                            <th>Rangkuman</th>
                                            <th>tanggal</th>
                                            <th>kategori</th>
                                            <th>Penulis</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($artikel as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->judul }}</td>
                                                <td>{{ $data->summary }}</td>
                                                <td>{{ DateToText::DateToText($data->tanggal) }}</td>
                                                <td>{{ $data->kategori->kategori }}</td>
                                                <td>{{ $data->penulis }}</td>
                                                <td>
                                                    <a type="button"
                                                    href="{{ route('data-artikel-detail',[$data->id]) }}"
                                                        class="btn btn-icon rounded-circle btn-outline-primary editButton"
                                                        data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="fas fa-edit" style="width: 100%"></i>
                                                    </a>
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
                            url: "{{ url('/berita-tambah/delete') }}" + '/' + post_id,
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

    </script>
@endsection
