@extends('layouts.alte')

@section('content')
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8">
          <div class="col-md-12" >
            <div class="panel panel-default">
                <div class="panel-heading"><b>{{ $nama }}</b></div>
                <div class="panel-body box-primary">
                  <center>
                    <img src="{{ asset('public/noimage200.gif') }}" class="img-responsive" alt="Responsive image">
                  </center>
                </div>
            </div>
          </div>
          <div class="col-md-12" >
            <div class="panel panel-default">
                <div class="panel-body box-primary">
                      <p><b>Deskripsi : </b></p>
                      <p>{{$deskripsi}}</p>
                </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="col-md-12">
            <div class="panel panel-default">
                <!-- <div class="panel-heading">Harga</div> -->
                <div class="panel-body box-primary">
                      <p><center><h2 style="text-decoration: none; color: orange"><b>Rp </b>{{$harga}}</h2></center></p>
                      <p><center><h4>Stock : {{$stock}}</h4></center></p>
                </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Toko</div>
                <div class="panel-body box-primary">
                  <center>
                    <img src="{{ asset('public/noimage200.gif') }}" class="img-circle" alt="Responsive image">
                  </center>
                </div>
            </div>
          </div>
        </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Map</div>
            <div class="panel-body box-primary">
                  tes
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
