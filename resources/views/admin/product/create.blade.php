@extends('admin.layouts.master')
@section('main')
<div class="d-flex justify-content-between">
    <h2 class="m-0">{{ $title }}</h2> <a href="{{ route('admin.index') }}" class="btn btn-warning">Quay lai</a>
</div>
<div class="add-new">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="m-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" class="form-control">
        </div>
        <div class="form-group">
            <label for="category_id">Category</label>
            <select  name="category_id" id="category_id" class="form-control">
                <option value="">Select category</option>
                @foreach ($lstCate as $key => $cate)
                    <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="mt-3 btn btn-primary" type="submit">
            Add new
        </button>
    </form>
</div>
@endsection
