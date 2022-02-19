@extends('layouts/nav')

@section('konten') 
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-9 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Manage Categories</h3>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
	  	<a href="{{ route('categories.create') }}" class="btn btn-primary">Add Categories</a>
	  </div>
  </div>
</div>
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
      	@if ($categories->count() > 0)
	        <table class="table table-striped">
	          <thead>
	            <tr>
	              <th>Name</th>
	            </tr>
	          </thead>
	          <tbody>
		          	@foreach ($categories as $key => $category)
		            <tr>
		              <td>{{$category->name}}</td>
		              <td width="40">
		              	<a href="{{route('categories.edit', $category->id)}}" class="btn btn-outline-warning btn-fw">Edit</a>
		              	<a href="{{route('categories.destroy', $category->id)}}" class="btn btn-outline-danger btn-fw">Delete</a>
		              </td>
		            </tr>
		            @endforeach
	          </tbody>
	        </table>
	      @else
	      <table class="table table-striped">
	      	<thead>
	        	<tr>
	            <td><center>No data found</center></td>
	          </tr>
	        </thead>
        </table>
        @endif
      </div>
    </div>
  </div>
</div>
<!-- content-wrapper ends -->
@endsection