@extends('layouts/nav')

@section('konten') 
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Form Categories</h3>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      @if (isset($category))
      <form class="forms-sample" action="{{route('categories.update', $category)}}" method="post">
      	{{ csrf_field() }}
        <div class="form-group">
          <label for="exampleInputName1">Name</label>
          <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name" isset($category) ? value="{{$category->name}}" : '' >
        </div>
        <div class="form-group">
          <label for="exampleInputName1">Type</label>
          	<select class="form-control form-control-sm" id="exampleFormControlSelect3" name="type">
	          <option value="income" {{$category->type}} == "income" ? 'selected' : ''>Income</option>
	          <option value="expense" {{$category->type}} == "expense" ? 'selected' : ''>Expense</option>
	        </select>
        </div>
        <button type="submit" class="btn btn-primary mr-2">Save</button>
        <a href="{{ route('categories.index') }}" class="btn btn-light">Cancel</button>
      </form>
      @else
      <form class="forms-sample" action="{{route('categories.store')}}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="exampleInputName1">Name</label>
          <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name (ex : Gaji)">
        </div>
        <div class="form-group">
          <label for="exampleInputName1">Type</label>
            <select class="form-control form-control-sm" id="exampleFormControlSelect3" name="type">
            <option value="income">Income</option>
            <option value="expense">Expense</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary mr-2">Save</button>
        <a href="{{ route('categories.index') }}" class="btn btn-light">Cancel</button>
      </form>
      @endif
    </div>
  </div>
</div>
<!-- content-wrapper ends -->
@endsection