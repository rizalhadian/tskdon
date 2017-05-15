@extends('layouts.alte')

@section('content')
<br>
<br>

<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Produk Terbaru</div>
                <div class="panel-body box-primary">

                    @foreach ($products as $produk)
                      <a href = "/tskdon/produk/{{ $produk->id }}" >
                      <div class="col-md-2 ">
                          <div class="box box-primary">
                              <div class="panel-heading">
                                <center>
                                  @if( $produk->foto == null)
                                    <img src="{{ asset('public/noimage200.gif') }}"  alt="Responsive image" height="125" width="125">
                                  @else
                                    <img src="{{ asset('public/pict-product/hd') }}/{{ $produk->foto }}" alt="Responsive image" height="125" width="125">
                                  @endif

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
