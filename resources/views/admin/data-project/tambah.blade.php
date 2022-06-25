@extends('admin.layouts.main')
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
                            <h4>Gallery</h4>
                        </div>
                        <div class="card-body">
                            <div class="gallery">
                                <div class="gallery-item" data-image="{{ asset('assets/img/news/img01.jpg') }}"
                                    data-title="Image 1" href="{{ asset('assets/img/news/img01.jpg') }}" title="Image 1"
                                    style="background-image: url(&quot;{{ asset('assets/img/news/img01.jpg') }}&quot;);">
                                </div>
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
