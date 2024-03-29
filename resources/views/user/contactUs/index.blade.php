@extends('user.layouts.main')

@section('content')
    <!-- Page Header Start -->
    <!-- Page Header Start -->
    <div class="container-fluid page-header d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5 mb-5">
        <h1 class="display-4 text-white mb-3 mt-0 mt-lg-5">Contact</h1>
        <div class="d-inline-flex text-white">
            <p class="m-0"><a class="text-white" href="">Home</a></p>
            <p class="m-0 px-2">/</p>
            <p class="m-0">Contact</p>
        </div>
    </div>
    <!-- Page Header Start -->


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center">
                <small class="bg-primary text-white text-uppercase font-weight-bold text-center px-1">Get In Touch</small>
                <h1 class="mt-2 mb-5">Contact For Any Queries</h1>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="d-flex align-items-center border mb-3 p-4">
                        <i class="fa fa-2x fa-envelope-open text-primary mr-3"></i>
                        <div class="d-flex flex-column">
                            <h5 class="font-weight-bold">Email Us</h5>
                            <p class="m-0">{{ $tp->email }}</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center border mb-3 p-4">
                        <i class="fa fa-2x fa-map-marker-alt text-primary mr-3"></i>
                        <div class="d-flex flex-column">
                            <h5 class="font-weight-bold">Office</h5>
                            <p class="m-0">{{ $tp->alamat_perusahaan }}</p>
                        </div>
                    </div>
                    @if ($tp->alamat2_perusahaan !== '' || $tp->alamat2_perusahaan != null)
                        <div class="d-flex align-items-center border mb-3 p-4">
                            <i class="fa fa-2x fa-map-marker-alt text-primary mr-3"></i>
                            <div class="d-flex flex-column">
                                <h5 class="font-weight-bold">Office</h5>
                                <p class="m-0">{{ $tp->alamat2_perusahaan }} </p>
                            </div>
                        </div>
                    @endif
                    <div class="d-flex align-items-center border mb-3 mb-md-0 p-4">
                        <i class="fas fa-2x fa-phone-alt text-primary mr-3"></i>
                        <div class="d-flex flex-column">
                            <h5 class="font-weight-bold">No. Telpon</h5>
                            <p class="m-0">{{ $tp->no_telp_perusahaan }}</p>
                        </div>
                    </div>
                    @if ($tp->no_telp2_perusahaan !== '' || $tp->no_telp2_perusahaan != null)
                        <div class="d-flex align-items-center border mb-3 mb-md-0 p-4">
                            <i class="fas fa-2x fa-phone-alt text-primary mr-3"></i>
                            <div class="d-flex flex-column">
                                <h5 class="font-weight-bold">No. Telpon ( Lainnya )</h5>
                                <p class="m-0">{{ $tp->no_telp2_perusahaan }}</p>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-md-7">
                    <div class="contact-form">
                        <div id="success"></div>
                        <form name="sentMessage" id="postForm" novalidate="novalidate">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="control-group">
                                        <input type="text" class="form-control p-4" id="name" name="name"
                                            placeholder="Your Name" required="required"
                                            data-validation-required-message="Please enter your name" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="control-group">
                                        <input type="email" class="form-control p-4" id="email"
                                            placeholder="Your Email" required="required" name="email"
                                            data-validation-required-message="Please enter your email" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control p-4" id="subject" placeholder="Subject"
                                    name="subject" required="required"
                                    data-validation-required-message="Please enter a subject" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control" rows="5" id="message" placeholder="Message" required="required" name="message"
                                    data-validation-required-message="Please enter your message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;"
                                    type="submit" id="sendMessageButton">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
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
        if ($("#postForm").length > 0) {
            $("#postForm").validate({
                submitHandler: function(form) {
                    var fd = new FormData($('#postForm')[0]);
                    $('#btn-save').html('Sending..');
                    $.ajax({
                        type: "get",
                        data: $('#postForm').serialize(),
                        url: "{{ route('sendEmail') }}",
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
