@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>Edit User {{ $user->name }}<a style="float:right;" href="{{ route('admin.users.index') }}">
                                     Back to User management
                        </a></h4></div>

                <div class="card-body">
                    <form action="{{ route('admin.users.update',$user) }}" method="POST">
                        <div class="form-group row">
                            <label for="firstname" class="col-md-2 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ $user->firstname }}" required  autofocus>

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                         <div class="form-group row">
                            <label for="middlename" class="col-md-2 col-form-label text-md-right">{{ __('Middle Name') }}</label>

                            <div class="col-md-6">
                                <input id="middlename" type="text" class="form-control @error('middlename') is-invalid @enderror" name="middlename" value="{{ $user->middlename }}" required  autofocus>

                                @error('middlename')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                         <div class="form-group row">
                            <label for="lastname" class="col-md-2 col-form-label text-md-right">{{ __('Last Name') }} *</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ $user->lastname }}" required autocomplete="lastname" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        

                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autofocus readonly="true">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                         <div class="form-group row">
                            <label for="username" class="col-md-2 col-form-label text-md-right">{{ __('Username') }} *</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user->username }}" required autocomplete="username" readonly="true">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="clientname" class="col-md-2 col-form-label text-md-right">{{ __('Client Name') }} *</label>

                            <div class="col-md-6">
                                <input id="clientname" type="text" class="form-control @error('clientname') is-invalid @enderror" name="clientname" value="{{ $user->clientname }}" required autocomplete="clientname" autofocus>

                                @error('clientname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                         <div class="form-group row">
                            <label for="dob" class="col-md-2 col-form-label text-md-right">{{ __('DOB') }} *</label>

                            <div class="col-md-6">
                                
                                <div class="input-group date" data-provide="datepicker-inline">
                                    <input type="text" id="dob" name="dob"  class="form-control" value="{{ $user->dob }}">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
			        </div>
                                
                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                           
                            </div>
                             
                        </div>
                        
                        <div class="form-group row">
                            <label for="address" class="col-md-2 col-form-label text-md-right">{{ __('Address') }} *</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="country" class="col-md-2 col-form-label text-md-right">{{ __('Country') }} *</label>

                            <div class="col-md-6">
                               <select id="country" name="country" class="form-control" style="width:350px" >
                                <option value="" selected disabled>Select</option>
                                  @foreach($countries as $country)
                                  <option value="{{$country->country_code}}"> {{$country->country_name}}</option>
                                  @endforeach
                                  </select>
                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                       
                         <div class="form-group row">
                            <label for="state" class="col-md-2 col-form-label text-md-right">{{ __('State') }} *</label>

                            <div class="col-md-6">
                                 <select name="state" id="state" class="form-control" style="width:350px">
                                     <option value="TN">Tamil Nadu</option>
                                     <option value="AP">Andera Pradesh</option>
                                     <option value="DL">Delhi</option>
                                     <option value="UP">Uttar Pradesh</option>
                               </select>
                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="pincode" class="col-md-2 col-form-label text-md-right">{{ __('Pincode') }} *</label>

                            <div class="col-md-6">
                                <input id="pincode" type="text" class="form-control @error('pincode') is-invalid @enderror" name="pincode" value="{{ $user->pincode }}" required autocomplete="pincode" autofocus>

                                @error('pincode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        @csrf
                        {{ method_field('PUT')}}
                        <div class="form-group row">
                            <label for="roles" class="col-md-2 col-form-label text-md-right">{{ __('Roles') }}</label>
                            <div class="col-md-6">
                        @foreach($roles as $role)
                        <div class="form-check">
                            <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                                   @if($user->roles->Pluck('id')->contains($role->id)) checked @endif>
                            <label>{{ $role->name }}</label>
                        </div>
                        @endforeach
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
