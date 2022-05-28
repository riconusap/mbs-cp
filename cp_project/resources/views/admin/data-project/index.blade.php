@extends('admin.layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kelola Project</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{route('data-project-detail-tambah')}}" class="btn btn-primary"><i
                                    class="fas fa-plus mr-2"></i>Tambah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-tranparent" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>
                                                No
                                            </th>
                                            <th>Nama Project</th>
                                            <th>Tanggal</th>
                                            <th>Lokasi</th>
                                            <th>Client</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Create a mobile app</td>
                                            <td>2018-01-20</td>
                                            <td>Bandung</td>
                                            <td><img class="rounded-circle" width="35" data-toggle="tooltip" title="DISHUB"
                                                    src="{{ asset('assets/img/client-1.png') }}" alt="Dishub"></td>
                                            <td>
                                              <a href="{{route('data-project-detail')}}" class="btn btn-icon rounded-circle btn-outline-info detail"
                                                data-toggle="tooltip" data-placement="top" title="Hapus">
                                                <i class="fas fa-eye" style="width: 100%"></i>
                                              </a>
                                              <button type="button"  class="btn btn-icon rounded-circle btn-outline-primary editButton"
                                                data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fas fa-edit" style="width: 100%"></i>
                                              </button>
                                              <button type="button" class="btn btn-icon rounded-circle btn-outline-danger delete"
                                                data-toggle="tooltip" data-placement="top" title="Hapus">
                                                <i class="fas fa-trash" style="width: 100%"></i>
                                              </button>
                                            </td>
                                        </tr>
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
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
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
            $('#addButton').click(function() {
                $('#add').modal('show');
            });

        });
    </script>
@endsection
