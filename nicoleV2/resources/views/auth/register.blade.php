@extends('layouts.app')

@section('content')
<!--<div class="container">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register your initial profile here!') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="usertype" class="col-md-4 col-form-label text-md-right">{{ __('User type') }}</label>

                            <div class="col-md-6">
                                <select id="usertype" type="text" class="form-control @error('usertype') is-invalid @enderror" name="usertype" value="{{ old('usertype') }}" required autocomplete="usertype" autofocus onchange="change_type()">
                                    <option selected>Select which user you are</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Event Staff">Event Staff</option>
                                    <option value="Client">Client</option>
                                </select>
                                @error('usertype')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="forEventStaff" id="forEventStaff">
                            <div class="form-group row">
                                <label for="stafftype" class="col-md-4 col-form-label text-md-right">{{ __('Type of Client Staff') }}</label>

                                <div class="col-md-6">
                                    <select id="stafftype" type="text" class="form-control @error('stafftype') is-invalid @enderror" name="stafftype" value="{{ old('stafftype') }}" required autocomplete="stafftype" autofocus onchange="specify_value()">
                                        <option selected>Select which Event Staff you are</option>
                                        <option value="Event Organizer">Event Organizer</option>
                                        <option value="Host">Host</option>
                                        <option value="Event Place">Event Place</option>
                                        <option value="Foods">Foods</option>
                                        <option value="Entertainer">Entertainer</option>
                                        <option value="Light and Sounds">Light and Sounds</option>
                                        <option value="Invitation and Stationary">Invitation and Stationary</option>
                                        <option value="Video and Photography">Video and Photography</option>
                                        <option value="Decorations">Decorations</option>
                                    </select>
                                    @error('stafftype')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row" id="specify">
                                <label for="specify" class="col-md-4 col-form-label text-md-right">{{ __('Specify') }}</label>

                                <div class="col-md-6">
                                    <input id="specify" type="text" class="form-control @error('specify') is-invalid @enderror" name="specify" value="{{ old('specify') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fee" class="col-md-4 col-form-label text-md-right">{{ __('Talent Fee') }}</label>

                                <div class="col-md-6">
                                    <input id="fee" type="number" class="form-control @error('fee') is-invalid @enderror" name="fee" value="{{ old('fee') }}">

                                </div>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Complete Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="contact" class="col-md-4 col-form-label text-md-right">{{ __('Contact Number') }}</label>

                            <div class="col-md-6">
                                <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}" required autocomplete="contact" autofocus>

                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->


<div class="container">
    <h3>Register here!</h3><h5><b><i>weHunt</i></b> would like to know you more...</h5>
    <hr>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
              <label for="name">Complete Name</label>
              <input type="text" class="form-control" id="name" placeholder="Firstname, Middlename, Lastname" name="name" required>
            </div>
            <div class="form-group col-md-6">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="usernmae" placeholder="ex: twoJoINt$" name="username" required>
            </div>
        </div>
        <div class="form-group">
          <label for="inputAddress">Address</label>
          <input type="text" class="form-control" id="address" name="address" placeholder="Mabatang Abucay Bataan">
        </div>
        <div class="form-group">
            <label for="contact">Contact Details</label>
            <input type="text" class="form-control" id="contact" name="contact" placeholder="09123456781" required>
          </div>
        <div class="form-group">
          <label for="usertype">User Type</label>
          <select id="usertype" type="text" class="form-control" name="usertype" required autocomplete="usertype" autofocus onchange="change_type()">
            <option selected>Select which user you are</option>
            <option value="Admin">Admin</option>
            <option value="Event Supplier">Event Supplier</option>
            <option value="Client">Client</option>
          </select>
        </div>

        <div class="forEventSupplier" id="forEventSupplier">
            <div class="form-group">
                <label for="stafftype">Type of Event Supplier</label>
                <select id="stafftype" type="text" class="form-control" name="stafftype" required autocomplete="stafftype" autofocus onchange="specify_value()">
                    <option selected>Select which Event Supplier you are</option>
                    <option value="Organizer">Organizer</option>
                    <option value="Host">Host</option>
                    <option value="Venue">Venue</option>
                    <option value="Foods and Beverages">Foods and Beverages</option>
                    <option value="Entertainer">Entertainer</option>
                    <option value="Lights and Sounds">Lights and Sounds</option>
                    <option value="Invitations and Stationary">Invitations and Stationary</option>
                    <option value="Photographers and Artists">Photographers and Artists</option>
                    <option value="Equipments and Decorations">Equipments and Decorations</option>
                </select>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6" id="specify">
                  <label for="specify">Specify</label>
                  <input type="text" class="form-control" id="specify" name="specify" placeholder="ex: DJ, Catering, etc">
                </div>
                <div class="form-group col-md-6">
                  <label for="fee">Service Fee</label>
                  <input type="text" class="form-control" id="fee" name="fee" placeholder="ex: 17,432">
                </div>
            </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="email">Email Address</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="twojoints@gmail.com" required>
          </div>
          <div class="form-group col-md-4">
            <label for="inputState">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="**********" required>
          </div>
          <div class="form-group col-md-4">
            <label for="inputZip">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="**********" required>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
      </form>
</div>



    <script>
    function change_type(){
        var type =$("#usertype").val();
        if (type == "Event Supplier"){
            $("#forEventSupplier").show();
        } else {
            $("#forEventSupplier").hide();
        }

    }

    function specify_value(){
        var type =$("#stafftype").val();
        if (type == "Foods" || type == "Entertainer" || type == "Light and Sounds"){
            $("#specify").show();
        } else {
            $("#specify").hide();
        }
    }
    </script>

@endsection
