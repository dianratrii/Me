@extends('layouts/nav')

@section('konten') 
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Form Transactions</h3>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      @if (isset($transaction))
      <form class="forms-sample" action="{{route('transactions.update', $transaction)}}" method="post">
      	{{ csrf_field() }}
        <div class="form-group">
          <label for="exampleInputName1">Type</label>
          	<select class="form-control form-control-sm" id="exampleFormControlSelect3" name="transaction_type">
	          <option value="income" {{$transaction->transaction_type}} == "income" ? 'selected' : ''>Income</option>
	          <option value="expense" {{$transaction->transaction_type}} == "expense" ? 'selected' : ''>Expense</option>
	        </select>
        </div>
        <div class="form-group">
          <label for="exampleInputName1">Category</label>
          	<select class="form-control form-control-sm" id="exampleFormControlSelect3" name="category_id">
          		@foreach($categories as $category)
	          	<option value="{{$category->id}}" {{$category->id}} ==  {{$transaction->category_id}} ? 'selected' : ''>{{$category->name}}</option>
	          	@endforeach
	        </select>
        </div>
        <div class="form-group">
          	<label for="exampleInputName1">Amount</label>
          	<input type="number" name="amount" class="form-control" id="exampleInputName1" placeholder="amount" isset($transaction) ? value="{{$transaction->amount}}" : '' >
        </div>
        <div class="form-group">
          	<label for="exampleInputName1">Description</label>
          	<input type="text" name="description" class="form-control" id="exampleInputName1" placeholder="description" isset($transaction) ? value="{{$transaction->description}}" : '' >
        </div>
        <button type="submit" class="btn btn-primary mr-2">Save</button>
        <a href="{{ route('transactions.index') }}" class="btn btn-light">Cancel</button>
      </form>
      @else
      <form class="forms-sample" action="{{route('transactions.store')}}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="exampleInputName1">Type</label>
          	<select class="form-control form-control-sm" id="exampleFormControlSelect3" name="transaction_type">
	          <option value="income">Income</option>
	          <option value="expense">Expense</option>
	        </select>
        </div>
        <div class="form-group">
          <label for="exampleInputName1">Category</label>
          	<select class="form-control form-control-sm" id="exampleFormControlSelect3" name="category_id">
          		@foreach($categories as $category)
	          	<option value="{{$category->id}}">{{$category->name}}</option>
	          	@endforeach
	        </select>
        </div>
        <div class="form-group">
          	<label for="exampleInputName1">Amount</label>
          	<input type="number" name="amount" class="form-control" id="exampleInputName1" placeholder="amount" value="">
        </div>
        <div class="form-group">
          	<label for="exampleInputName1">Description</label>
          	<input type="text" name="description" class="form-control" id="exampleInputName1" placeholder="description">
        </div>
        <button type="submit" class="btn btn-primary mr-2">Save</button>
        <a href="{{ route('transactions.index') }}" class="btn btn-light">Cancel</button>
      </form>
      @endif
    </div>
  </div>
</div>
<!-- content-wrapper ends -->
@endsection