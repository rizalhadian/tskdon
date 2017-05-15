@extends('layouts.alte')

@section('content')
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Produk</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ URL::to('/shop/addproduk') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                          <div class="panel-heading">
                            <center>
                              <img src="{{ asset('public/noimage200.gif') }}" class="img-thumbnail" alt="Responsive image" name="profileimage" id="profileimage" height="200" width="200">
                              <input type="file" name="imagefile" id="image" style="display:none" >
                              <!-- <input type="text" value="{{Auth::user()->photo}}"> -->
                            </center>
                          </div>

                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nama</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama" value="" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Harga</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="harga" value="" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Deskripsi</label>
                            <div class="col-md-6">
                                <textarea class= "form-control" rows="3" name="deskripsi">
                                </textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-4">
                                <button type="submit" class="btn btn-primary ">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
