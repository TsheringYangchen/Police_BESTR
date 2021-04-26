@extends('admin.layouts.master')
@section('content')
@section('page')
  View BIN/EIN Providers
@endsection      

<form action="{{URL::to('/searchIR')}}" method="get" role="search" style="width: 43%">
  {{ csrf_field() }}
  <div class="input-group">
      
      <input type="text" class="form-control mr-2 border-input" name="q" placeholder="Search providers">
        <span class="input-group-btn mr-1">
          <button class="btn btn-info" type="submit">
              <span class="fa fa-search mt-2"></span>
          </button>
      </span>
  </div>
</form>
<br>
<div class="row">
    <div class="col-md-8 offset-2">
<table class="table table-responsive table-bordered">
    <thead class="table-dark text-center">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">CID Number</th>
        <th scope="col">Name</th>
        <th scope="col">Designation</th>
        <th scope="col">Phone #</th>
        <th scope="col">Email Address</th>
        <th scope="col">EDIT</th>
        <th scope="col">DELETE</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($issuers as $issuer)
        <tr>
          <td>{{ $issuer->id }}</td>
          <td>{{ $issuer->cid }}</td>
          <td>{{ $issuer->provider_name }}</td>
          <td>{{ $issuer->designation }}</td>
          <td>{{ $issuer->phone }}</td>
          <td>{{ $issuer->email }}</td>
          <td class="text-center">
            <a href="#" class="btn btn-primary">EDIT</a>
          </td>
          <td>  
            <a href="/deleteIR/{{$issuer->id}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">DELETE</a>
          </td>
        </tr>
        @endforeach
      
    </tbody>
  </table>
</div>

</div>
@endsection



                