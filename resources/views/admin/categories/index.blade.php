@extends('admin.layout')

@section('content')
<div class="row">
    <!-- basic table -->
    @if(Session::has('message'))
    <h3>{{Session::get('message')}}</h3>
    @endif
    <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
    <div class="col-lg6"> <a href="{{route('Admin.categories.create')}}" class="btn-default"> Create a New Categories</a></div>
        <div class="card">
            <h5 class="card-header">Categories Table</h5>
          
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Img</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <th scope="row"> {{ $loop->index + 1 }}</th>
                            <td class="text-primary"><img src="{{Storage::url($category->img) }}" alt="" style="width: 150px; height: 150px;"></td>
                            <td class="text-primary">{{ $category->name }}</td>
                            <td class=" text-black text-wrap text-justify text-lowercase">{{$category->description}} <i class="mdi mdi-arrow-down"></i>
                            </td>
                            <td><a href="{{ route('Admin.categories.edit', $category->id) }}">Edit</td>
                            <td>
                                <form action=" {{ route('Admin.categories.destroy', $category->id ) }} " method="post">
                                    {{ csrf_field('') }}
                                    {{ method_field('DELETE') }}
                                    <button class="bg-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end basic table -->
</div>
@endsection