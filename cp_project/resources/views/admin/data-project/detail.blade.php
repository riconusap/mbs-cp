@extends('admin.layouts.main')
@section('custom-css')
<link rel="stylesheet" href="{{asset('node_modules/dropzone/dist/min/dropzone.min.css')}}">
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Detail Project Nama Project</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                          <h4>Data Kegiatan</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>Nama Kegiatan</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Select2</label>
                                        <select class="form-control select2">
                                          <option>Option 1</option>
                                          <option>Option 2</option>
                                          <option>Option 3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Gallery Kegiatan</h4>
                            <div class="card-header-action">
                                <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
                                <a class="btn btn-icon btn-primary" id="insert-foto" href="#"><i class="fas fa-plus"></i></a>
                                <a class="btn btn-icon btn-danger" id="hapus-foto" href="#"><i class="fas fa-trash"></i></a>
                            </div>
                        </div>
                        <div class="collapse show" id="mycard-collapse" style="">
                            <div class="card-body">
                                <div class="gallery">
                                    <div class="gallery-item" data-image="{{ asset('assets/img/news/img01.jpg') }}"
                                        data-title="Image 1"></div>
                                    <div class="gallery-item" data-image="{{ asset('assets/img/news/img02.jpg') }}"
                                        data-title="Image 2"></div>
                                    <div class="gallery-item" data-image="{{ asset('assets/img/news/img03.jpg') }}"
                                        data-title="Image 3"></div>
                                    <div class="gallery-item" data-image="{{ asset('assets/img/news/img04.jpg') }}"
                                        data-title="Image 4"></div>
                                    <div class="gallery-item" data-image="{{ asset('assets/img/news/img05.jpg') }}"
                                        data-title="Image 5"></div>
                                    <div class="gallery-item" data-image="{{ asset('assets/img/news/img06.jpg') }}"
                                        data-title="Image 6"></div>
                                    <div class="gallery-item" data-image="{{ asset('assets/img/news/img07.jpg') }}"
                                        data-title="Image 7"></div>
                                    <div class="gallery-item" data-image="{{ asset('assets/img/news/img08.jpg') }}"
                                        data-title="Image 8"></div>
                                </div>
                                <div class="form-edit-gallery d-none">
                                    <div class="form-group">
                                        <label class="form-label">Pilih foto yang ingin anda hapus</label>
                                        <div class="row gutters-sm">
                                            <div class="col-6 col-sm-4">
                                                <label class="imagecheck mb-4">
                                                    <input name="imagecheck" type="checkbox" value="1"
                                                        class="imagecheck-input">
                                                    <figure class="imagecheck-figure">
                                                        <img src="{{asset('assets/img/news/img01.jpg')}}" alt="}"
                                                            class="imagecheck-image">
                                                    </figure>
                                                </label>
                                            </div>
                                            <div class="col-6 col-sm-4">
                                                <label class="imagecheck mb-4">
                                                    <input name="imagecheck" type="checkbox" value="2"
                                                        class="imagecheck-input" checked="">
                                                    <figure class="imagecheck-figure">
                                                        <img src="{{asset('assets/img/news/img02.jpg')}}" alt="}"
                                                            class="imagecheck-image">
                                                    </figure>
                                                </label>
                                            </div>
                                            <div class="col-6 col-sm-4">
                                                <label class="imagecheck mb-4">
                                                    <input name="imagecheck" type="checkbox" value="3"
                                                        class="imagecheck-input">
                                                    <figure class="imagecheck-figure">
                                                        <img src="{{asset('assets/img/news/img03.jpg')}}" alt="}"
                                                            class="imagecheck-image">
                                                    </figure>
                                                </label>
                                            </div>
                                            <div class="col-6 col-sm-4">
                                                <label class="imagecheck mb-4">
                                                    <input name="imagecheck" type="checkbox" value="4"
                                                        class="imagecheck-input" checked="">
                                                    <figure class="imagecheck-figure">
                                                        <img src="{{asset('assets/img/news/img04.jpg')}}" alt="}"
                                                            class="imagecheck-image">
                                                    </figure>
                                                </label>
                                            </div>
                                            <div class="col-6 col-sm-4">
                                                <label class="imagecheck mb-4">
                                                    <input name="imagecheck" type="checkbox" value="5"
                                                        class="imagecheck-input">
                                                    <figure class="imagecheck-figure">
                                                        <img src="{{asset('assets/img/news/img05.jpg')}}" alt="}"
                                                            class="imagecheck-image">
                                                    </figure>
                                                </label>
                                            </div>
                                            <div class="col-6 col-sm-4">
                                                <label class="imagecheck mb-4">
                                                    <input name="imagecheck" type="checkbox" value="6"
                                                        class="imagecheck-input">
                                                    <figure class="imagecheck-figure">
                                                        <img src="{{asset('assets/img/news/img06.jpg')}}" alt="}"
                                                            class="imagecheck-image">
                                                    </figure>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="btn btn-icon btn-danger" href="#"><i class="fas fa-trash mr-2"></i><span class="">Hapus Terpilih</span></a>
                                    <a class="btn btn-icon btn-warning cancel-hapus-foto" href="#"><i class="fas fa-ban mr-2"></i><span>Cancel</span></a>
                                </div>
                                <div class="form-insert-gallery d-none">
                                    <form action="#" class="dropzone mb-4" id="mydropzone">
                                        <div class="fallback">
                                          <input name="file" type="file" multiple />
                                        </div>
                                      </form>
                                      <a class="btn btn-icon btn-success" href="#"><i class="fas fa-upload mr-2"></i><span class="">Upload</span></a>
                                      <a class="btn btn-icon btn-warning cancel-insert-foto" href="#"><i class="fas fa-ban mr-2"></i><span>Cancel</span></a>
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
<script src="{{asset('node_modules/dropzone/dist/min/dropzone.min.js')}}"></script>
<script src="{{asset('assets/js/page/components-multiple-upload.js')}}"></script>
<script src="{{asset('node_modules/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/page/forms-advanced-forms.js')}}"></script>
    <script>
        $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            'use strict';
            // $("#lightgallery").lightGallery();
            $('#addButton').click(function() {
                $('#add').modal('show');
            });
            $('#hapus-foto').click(function(){
                $('.form-edit-gallery').removeClass('d-none');
                $('.gallery').addClass('d-none');
                $('.form-insert-gallery').addClass('d-none');
                $('#hapus-foto').addClass('d-none');
            });
            $('.cancel-hapus-foto').click(function(){
                $('.form-edit-gallery').addClass('d-none');
                $('.gallery').removeClass('d-none');
                $('#hapus-foto').removeClass('d-none');
            });
            $('#insert-foto').click(function(){
                $('.form-edit-gallery').addClass('d-none');
                $('.gallery').addClass('d-none');
                $('.form-insert-gallery').removeClass('d-none');
                $('#hapus-foto').addClass('d-none');
                $('#insert-foto').addClass('d-none');
            });
            $('.cancel-insert-foto').click(function(){
                $('.form-edit-gallery').addClass('d-none');
                $('.form-insert-gallery').addClass('d-none');
                $('.gallery').removeClass('d-none');
                $('#insert-foto').removeClass('d-none');
                $('#hapus-foto').removeClass('d-none');
            });
        });
    </script>
@endsection
