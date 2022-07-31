@extends('admin.layouts.main')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Dashboard - {{$tp->nama_perusahaan}}</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="fas fa-users"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Pegawai</h4>
              </div>
              <div class="card-body">
                10
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="fas fa-table"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Pekerjaan / Event</h4>
              </div>
              <div class="card-body">
                42
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-info">
              <i class="fas fa-address-book"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Client</h4>
              </div>
              <div class="card-body">
                42
              </div>
            </div>
          </div>
        </div>               
      </div>
    </div>
  </section>
  @endsection