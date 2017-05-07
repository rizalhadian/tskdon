@extends('layouts.alte')

@section('content')
<br>
<br>
@if ($privilege == 0)
  <!-- Anda Belum Login -->
@elseif($privilege == 1)
  <!-- Anda Admin -->
@elseif ($privilege == 2)
  <!-- Anda User -->
@endif
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Produk-Produk</div>
                <div class="panel-body box-primary">

                    @foreach ($products as $produk)
                      <a href = "/tadony/produk/{{ $produk->id }}" >
                      <div class="col-md-2 ">
                          <div class="box box-primary">
                              <div class="panel-heading">
                                <center>
                                  <img src="{{ asset('public/noimage200.gif') }}" class="img-responsive" alt="Responsive image">
                                </center>
                              </div>
                              <div class="box-body">
                               <ul class="list-group list-group-unbordered">
                                 <li class="list-group-item">
                                   <a style="text-decoration: none; color: black">{{ $produk->nama }}</a>
                                 </li>
                                 <li class="list-group-item">
                                   <b>Rp</b> <a class="pull-right" style="text-decoration: none; color: orange">{{ $produk->harga }}</a>
                                 </li>
                               </ul>
                              </div>
                          </div>
                      </div>
                      </a>
                    @endforeach


                </div>
            </div>
        </div>



    </div>
</div>
@endsection
