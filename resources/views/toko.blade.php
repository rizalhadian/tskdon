@extends('layouts.alte')



@section('content')
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- Form Profile -->
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ URL::to('/profile/update') }}" enctype="multipart/form-data">
                      @foreach ($user as $u)

                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                          <div class="panel-heading">
                            <center>

                                @if($u->photo == null)
                                <img src="{{ asset('public/noimage200.gif') }}" class="img-thumbnai" alt="Responsive image" name="profileimage" id="profileimage" height="200" width="200">
                                @else
                                <img src="{{ asset('public/pict-profile/hd') }}/{{ $u->photo }}" class="img-thumbnail" alt="Responsive image" name="profileimage" id="profileimage" height="200" width="200">
                                @endif



                              <input type="file" name="imagefile" id="image" style="display:none" >
                              <!-- <input type="text" value="{{Auth::user()->photo}}"> -->
                            </center>
                          </div>

                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" disabled type="text" class="form-control" name="name" value="{{ $u->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" disabled type="email" class="form-control" name="email" value="{{ $u->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Personal Phone</label>
                            <div class="col-md-6">
                                <input id="phone" disabled type="text" class="form-control" name="phone" value="{{ $u->phone }}" required autofocus>
                            </div>
                        </div>
                        @endforeach
                    </form>
                </div>
            </div>
            <!-- End of Form Profile -->

            <!-- Form Toko -->
            <div class="panel panel-default">
                <div class="panel-heading" id="toko">Toko</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ URL::to('/profile/updatetoko') }}" enctype="multipart/form-data">
                      {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">City</label>
                            <div class="col-md-6">
                                <!-- <input id="city" type="text" class="form-control" name="city" > -->
                                <input id="phone" disabled type="text" class="form-control" name="phone" value="{{ $u->phone }}" required autofocus>

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Postal Code</label>
                            <div class="col-md-6">
                              @if($flagtoko == 1)
                              <input id="postalcode" disabled type="text" class="form-control" name="postalcode" value="{{ $toko[0]->postalcode }}">
                              @else
                              <input id="postalcode" disabled type="text" class="form-control" name="postalcode" value="">
                              @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Address</label>
                            <div class="col-md-6">
                              @if($flagtoko == 1)
                              <input id="address" disabled type="text" class="form-control" name="address" value="{{ $toko[0]->address }}">
                              @else
                              <input id="address" disabled type="text" class="form-control" name="address" value="">
                              @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Phone</label>
                            <div class="col-md-6">
                              @if($flagtoko == 1)
                              <input id="phone" disabled type="text" class="form-control" name="phone" value="{{ $toko[0]->phone }}" required autofocus>
                              @else
                              <input id="phone" disabled type="text" class="form-control" name="phone" value="" required autofocus>
                              @endif
                            </div>
                        </div>
                        <input id="lng" type="hidden" class="form-control" name="lng" value="" required autofocus >
                        <input id="lat" type="hidden" class="form-control" name="lat" value="" required autofocus >



                        <div class="panel panel-default">
                            <div class="panel-heading">Maps</div>
                            <div class="panel-body" id="map"></div>
                            <script>
                              // Note: This example requires that you consent to location sharing when
                              // prompted by your browser. If you see the error "The Geolocation service
                              // failed.", it means you probably did not give permission for the browser to
                              // locate you.

                              function initMap() {
                                var map = new google.maps.Map(document.getElementById('map'), {
                                  center: {lat: -34.397, lng: 150.644},
                                  zoom: 17
                                });
                                var infoWindow = new google.maps.InfoWindow({map: map});

                                // Try HTML5 geolocation.
                                if (navigator.geolocation) {
                                  navigator.geolocation.getCurrentPosition(function(position) {

                                    $('#lat').val(position.coords.latitude);
                                    $('#lng').val(position.coords.longitude);

                                    var pos = {
                                      lat: position.coords.latitude,
                                      lng: position.coords.longitude
                                    };

                                    infoWindow.setPosition(pos);
                                    infoWindow.setContent('Location found.');
                                    map.setCenter(pos);
                                  }, function() {
                                    handleLocationError(true, infoWindow, map.getCenter());
                                  });
                                } else {
                                  // Browser doesn't support Geolocation
                                  handleLocationError(false, infoWindow, map.getCenter());
                                }
                              }

                              function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                                infoWindow.setPosition(pos);
                                infoWindow.setContent(browserHasGeolocation ?
                                                      'Error: The Geolocation service failed.' :
                                                      'Error: Your browser doesn\'t support geolocation.');
                              }
                            </script>
                            <script async defer
                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPgTtILFO13qAPkmX24vFNw1jJwbR8Aaw&callback=initMap">
                            </script>
                        </div>

                        <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary">
                                  Update
                              </button>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End of Form Toko -->
        </div>
    </div>
</div>

@endsection
