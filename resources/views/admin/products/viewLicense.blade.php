@extends('admin.layouts.master')
@section('content')
@section('page')
  View License Holders
@endsection   

<form action="{{URL::to('/search')}}" method="get" role="search" style="width: 43%">
  {{ csrf_field() }}
  <div class="input-group">
      
      <input type="text" class="form-control mr-2 border-input" name="q" placeholder="Search by License number or name">
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
        <th>ID</th>
        <th>License No</th>
        <th>Name</th>
        <th>CID No</th>
        <th>Phone No</th>
        <th>Location</th>
        <th>License Type</th>
        <th>Image</th>
        <th>EDIT</th>
        <th>DELETE</th>
        
      </tr>
    </thead>

    @include('admin.layouts.message')
    
    <tbody>
        @foreach ($licenses as $license)
        <tr>
          <td>{{ $license->id }}</td>
          <td>{{ $license->license_no }}</td>
          <td>{{ $license->license_name }}</td>
          <td>{{ $license->cid }}</td>
          <td>{{ $license->phone }}</td>
          <td>{{ $license->location }}</td>
          <td>{{ $license->license_type }}</td>
          <td>
            <img src="{{ url('uploads').'/'.$license->image}}" alt="{{ $license->image }}" class="mx-auto d-block img-thumbnail" style="width: 120px; height : 100px">
          </td>
          <td class="text-center">
            <a href="license-edit/{{$license->id}}" class="btn btn-primary mt-4">EDIT</a>
          </td>
          <td>  
            <a href="/deleteLH/{{$license->id}}" class="btn btn-danger mt-4" onclick="return confirm('Are you sure you want to delete?')">DELETE</a>
          </td>
        </tr>
        @endforeach
      
    </tbody>
  </table>
 

  <!-- Pagination Links -->
  {{ $licenses->links() }}

</div>
</div>
@endsection



                