@extends('admin.layouts.master')

@section('page')
    Edit BIN/EIN Providers
@endsection

@section('content')

<div class="row">

    <div class="col-md-12">

        <div class="card col-md-8">
            <div class="card-body">

                @include('admin.layouts.message')
 
                @if ( $errors->any() )

                    <div class="alert alert-success">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif
                    <br>
                    <div class="jumbotron">
                <form action="/updateissuer/{{$issuer->id}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <input type="hidden" id="id" name="id" value="{{$issuer->id}}">

                    <div class="form-group">
                        <label><b>Provider Name:</b></label>
                        <input type="text" name="provider_name" value="{{ $issuer->provider_name}}" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label><b>CID Number:</b></label>
                        <input type="text" name="cid" value="{{ $issuer->cid}}"class="form-control">
                    </div>

					<div class="form-group">
						<label><b>Designation:</b></label>
							<input  type="text" class="form-control" name="designation" value="{{ $issuer->designation}}"> 
						</div>

					<div class="form-group">
						<label><b>Phone Number :</b></label>
							<input id="phone" type="text" class="form-control " name="phone" value="{{ $issuer->phone}}"> 
						</div>
					
					<div class="form-group">
						<label><b>Email Address:</b></label>
							<input id="email" type="email" class="form-control " name="email" value="{{ $issuer->email}}">
						 </div>
					
					<div class="form-group">
						<label><b>Password</b></label>
							<input id="password" type="password" class="form-control " name="password" value="{{ $issuer->password}}">
						 </div>

					<div class="form-group">
						<label><b>Confirm Password</b></label>
							<input id="confirm_password" type="password" class="form-control" name="confirm_password" value="{{ $issuer->confirm_password}}"> 
						</div>
                    
                        <div class="form-group mb-5">
                            <button type="submit" name="submit" class="btn btn-primary" style="margin-bottom: 20px"> Update</button>
                        </div>

                </form>
            </div>

            </div>
        </div>

    </div>

</div>


@endsection
    
