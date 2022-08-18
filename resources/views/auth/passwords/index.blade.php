@extends('admin.layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kelola User</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('register') }}" type="button" class="btn btn-primary" id="addButton"><i
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
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->name}}</td>
                                                <td>{{ $data->email }}</td>
                                                <td>
                                                    @if (Auth::user()['email'] === $data->email)
                                                        
                                                    <button type="button"
                                                    data-id="{{ $data->id }}"
                                                        class="btn btn-icon rounded-circle btn-outline-info delete editButton"
                                                        data-toggle="tooltip" data-placement="top" title="Ubah Password">
                                                        <i class="fas fa-edit" style="width: 100%"></i>
                                                    </button>
                                                    @endif
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
                    <h5 class="modal-title">Ubah Password</h5>
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
                                <label for="passwordOld" class="form-label">Masukan Password Lama</label>
                                <input type="password" class="form-control" placeholder="Masukan password" name="passwordOld"
                                    id="password" required>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="password" class="form-label">Masukan Password Baruf</label>
                                <input type="password" class="form-control" placeholder="Masukan password" name="password"
                                    id="password" required>
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.editButton').click(function() {
                $('#postForm').trigger('reset');

                var id = $(this).data('id');

                $('#post_id').val(id);

                $('#add').modal('show');
            });

            if ($("#postForm").length > 0) {
            $("#postForm").validate({
                submitHandler: function(form) {
                    var fd = new FormData($('#postForm')[0]);
                    $('#btn-save').html('Sending..');
                    $.ajax({
                        type: "POST",
                        data: fd,
                        url: "{{ route('reset') }}",
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
                                title: 'Gagal!!!',
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
        });

    </script>
@endsection
