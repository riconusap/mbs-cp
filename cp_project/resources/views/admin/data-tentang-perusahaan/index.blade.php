@extends('admin.layouts.main')

@section('custom-css')

@endsection

@section('content')
    <section class="section">
        <div class="section-header">
          <img width="35px" class="mr-3" src="{{ asset('assets/img/client-1.png') }}" alt="">
            <h1>Kelola Data Perusahaan</h1>
        </div>
        <div class="section-body">
            <div class="card">
              <div class="card-header">
                <button type="button" class="btn btn-primary" id="editButton"><i
                        class="fas fa-edit mr-2"></i>Edit
                </button>
                <h3 id="title-header" class="d-none">Edit Data Perusahaan</h3>
              </div>
              <div class="card-body">
                <form class="d-none" id="formPost" action="">
                  <div class="row">
                    <div class="col-md-9">
                      <label for="">Nama Perusahaan</label>
                      <input type="text" class="form-control">
                    </div>
                    <div class="col-md-3">
                      <label for="">Inisial Perusahaan</label>
                      <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                      <label for="">Nomor Telepon Perusahaan</label>
                      <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                      <label for="">Email Perusahaan</label>
                      <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                      <label for="">Alamat Perusahaan</label>
                      <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                      <label for="">Logo Perusahaan</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <label for="">Tentang Perusahaan</label>
                      <textarea type="text" class="form-control" rows="9"></textarea>
                    </div>
                  </div>
                </form>
                <div class="showData" id="showData">
                  <div class="row">
                    <div class="col-md-9">
                      <label for="">Nama Perusahaan</label>
                      <input type="text" class="form-control" readonly>
                    </div>
                    <div class="col-md-3">
                      <label for="">Inisial Perusahaan</label>
                      <input type="text" class="form-control" readonly>
                    </div>
                    <div class="col-md-6">
                      <label for="">Nomor Telepon Perusahaan</label>
                      <input type="text" class="form-control" readonly>
                    </div>
                    <div class="col-md-6">
                      <label for="">Email Perusahaan</label>
                      <input type="text" class="form-control" readonly>
                    </div>
                    <div class="col-md-6">
                      <label for="">Alamat Perusahaan</label>
                      <input type="text" class="form-control" readonly>
                    </div>
                    <div class="col-md-6">
                      <label for="">Logo Perusahaan</label>
                      <br>
                      <img width="35px" class="mr-3" src="{{ asset('assets/img/client-1.png') }}" alt="">
                    </div>
                    <div class="col-md-12">
                      <label for="">Tentang Perusahaan</label>
                      <textarea type="text" class="form-control" rows="9" readonly></textarea>
                    </div>
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
                $('#formPost').removeClass('d-none')
            });

            $('#cancelButton').click(function(){
                $(this).addClass('d-none');
                $('#saveButton').addClass('d-none');
                $('#title-header').addClass('d-none');
                $('#showData').removeClass('d-none');
                $('#editButton').removeClass('d-none');
                $('#formPost').addClass('d-none');
                $('#formPost').trigger('reset');
            })

        });
    </script>
@endsection
