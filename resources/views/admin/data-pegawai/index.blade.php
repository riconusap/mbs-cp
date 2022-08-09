@extends('admin.layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kelola Pegawai</h1>
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
                                <table class="table dataTables table-tranparent" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>
                                                No
                                            </th>
                                            <th>Foto</th>
                                            <th>Nama Pegawai</th>
                                            <th>Tempat, Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Jabatan</th>
                                            <th>Deskripsi</th>
                                            <th>Nomor Telepon </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pegawai_list as $key => $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><img class="rounded-circle" src="{{ asset('img/'. $data->foto) }}" alt="avatar" height="40" width="40">
                                                </td>
                                                <td>{{ $data->nama }}</td>
                                                
                                                <td>{{ $data->tempat_lahir }}, {{ $data->tanggal_lahir }}</td>
                                                <td>{{ $data->jenis_kelamin == 1 ? "Laki-Laki" : 'Perempuan' }}</td>
                                                <td>{{ $data->jabatan['jabatan'] }}</td>
                                                <td>{{ $data->deskripsi }}</td>
                                                <td>
                                                    {{ $data->no_telp }}
                                                </td>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-icon rounded-circle btn-outline-primary editButton"
                                                        data-id="{{$data->id}}"
                                                        data-deskripsi="{{$data->deskripsi}}"
                                                        data-nama="{{$data->nama}}"
                                                        data-tempat-lahir="{{$data->tempat_lahir}}"
                                                        data-tanggal-lahir="{{$data->tanggal_lahir}}"
                                                        data-jabatan="{{$data->jabatan['id']}}"
                                                        data-no-telp="{{$data->no_telp}}"
                                                        data-jk="{{$data->jenis_kelamin}}"
                                                        data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-icon rounded-circle btn-outline-danger delete"
                                                        data-toggle="tooltip" data-id="{{ $data->id }}" data-placement="top" title="Hapus">
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
                    <h5 class="modal-title">Input Pegawai</h5>
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
                                <input type="text" class="form-control" placeholder="Masukan Nama" name="nama"
                                    id="nama_pegawai" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="ttl" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" placeholder="Masukan Tempat Lahir"
                                    name="tempat_lahir" id="tempat_lahir" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="ttl" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control bg-white"
                                    placeholder="Masukan Tanggal Lahir" name="tanggal_lahir" id="tanggal_lahir" required>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label class="form-label">Jenis Kelamin </label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" 
                                                id="jk_1" value="1">
                                            <label class="form-check-label" for="inlineRadio1">Laki - Laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                id="jk_2" value="2">
                                            <label class="form-check-label" for="inlineRadio1">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="namapegawai" class="form-label">Jabatan</label>
                                <select name="jabatan" id="jabatan" class="select2 form-control w-100" required>
                                    <option value="0" selected disabled>Pilih Jabatan</option>
                                    @foreach ($jabatan as $data)
                                        <option value="{{ $data->id }}">{{ $data->jabatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="namapegawai" class="form-label">No Telpon</label>
                                <input placeholder="Masukan Nomor Telepon" name="no_telp" id="no_telp" maxlength="15"
                                    class="form-control input-phone" type="tel" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="namapegawai" class="form-label">Input Foto</label>
                                <button id="input-button" class="btn-block btn btn-primary">Pilih Foto</button>
                                <input type="file" type="button" name="foto" id="file" class="form-control d-none"
                                    value="">
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="namapegawai" class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" id="deskripsi" cols="30" rows="10"></textarea>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"
integrity="sha512-KaIyHb30iXTXfGyI9cyKFUIRSSuekJt6/vqXtyQKhQP6ozZEGY8nOtRS6fExqE4+RbYHus2yGyYg1BrqxzV6YA=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/addons/cleave-phone.id.js"
integrity="sha512-U479UBH9kysrsCeM3Jz6aTMcWIPVpmIuyqbd+KmDGn6UJziQQ+PB684TjyFxaXiOLRKFO9HPVYYeEmtVi/UJIw=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
         
        $(function() {
            'use strict';
            var cleave = new Cleave('.input-phone', {
              phone: true,
              phoneRegionCode: 'ID',
              placeholder: 'Masukan Nomor Telepon'
          });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
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
                var deskripsi = $(this).data('deskripsi');
                var nama = $(this).data('nama');
                var tempat_lahir = $(this).data('tempat-lahir');
                var tanggal_lahir = $(this).data('tanggal-lahir');
                var jabatan = $(this).data('jabatan');
                var no_telp = $(this).data('no-telp');
                var jk = $(this).data('jk');

                $('#post_id').val(id);
                $('#deskripsi').val(deskripsi);
                $('#nama_pegawai').val(nama);
                $('#tempat_lahir').val(tempat_lahir);
                $('#tanggal_lahir').val(tanggal_lahir);
                $('#tanggal_lahir').val(tanggal_lahir);
                if (jk === 1) {
                    $('#jk_1').prop('checked', 'true');
                } else {
                    $('#jk_2').prop('checked', 'true');
                }
                $('#jabatan').val(jabatan).trigger('change');
                $('#no_telp').val(no_telp);

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
                            url: "{{ url('/admin/data-pegawai/delete-pegawai') }}" + '/' + post_id,
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
                        url: "{{ route('post-edit-pegawai') }}",
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
