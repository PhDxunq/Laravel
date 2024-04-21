@extends('admin.layouts.master')
@section('main')
<div class="d-flex justify-content-between">
    <h2 class="m-0">{{ $title }}</h2> <a href="{{ route('admin.product.create') }}" class="btn btn-primary">Add new</a>
</div>
   @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-responsive">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Category</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lstPrd as $key => $prd)
                <tr>
                    <td>{{ $prd->id }}</td>
                    <td>{{ $prd->name }}</td>
                    <td>{{ $prd->price }}</td>
                    <td>
                        <img src="{{ asset('uploads/' . $prd->image) }}" alt="{{ $prd->name }}" width="100">
                    </td>
                    <td>{{ $prd->category->name }}</td>
                    <td>{{ $prd->created_at }}</td>
                    <td>{{ $prd->updated_at }}</td>
                    <td>
                        <a href="{{ route('admin.product.edit', $prd->id) }}" class="btn btn-primary">Edit</a>
                        <a  href="{{ route('admin.product.delete', $prd->id) }}" class="btn btn-danger btn-delete">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $lstPrd->links() }}
    <script>
        $('.btn-delete').on('click', (e) => {
            e.preventDefault();
            const link = e.target.href;
            let cf = confirm('Ban co chac chan muon xoa khong?');
            if(cf){
                window.location.href = link;
            }
        });
    </script>
@endsection
