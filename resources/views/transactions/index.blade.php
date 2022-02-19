@extends('layouts/nav')

@section('konten') 
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-9 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Manage Transaction</h3>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
	  	<a href="{{ route('transactions.create') }}" class="btn btn-primary">Add Transactions</a>
	  </div>
  </div>
</div>
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
    <p>Your Balance : {{$balance}}</p>
      <div class="table-responsive">
      	@if ($transactions->count() > 0)
	        <table class="table table-striped">
	          <thead>
	            <tr>
	              <th>Type</th>
	              <th>Category</th>

	              <th></th>
	            </tr>
	          </thead>
	          <tbody>
		          	@foreach ($transactions as $key => $transaction)
		            <tr>
		              <td>{{$transaction->transaction_type}}</td>
		              <td>{{$transaction->category->name}}</td>
		              <td>{{$transaction->amount}}</td>
		              <td>{{$transaction->description}}</td>
		              <td width="40">
		              	<a href="{{route('transactions.edit', $transaction->id)}}" class="btn btn-outline-warning btn-fw">Edit</a>
		              	<a href="{{route('transactions.destroy', $transaction->id)}}" class="btn btn-outline-danger btn-fw">Delete</a>
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