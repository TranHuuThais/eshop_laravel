@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-lg6"> <a href="{{route('Admin.products.create')}}" class="btn-default"> Create a New Products</a></div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Table</h4>
                <p class="card-description"> Add class <code>.table-hover</code> </p>
                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th>Img</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>price</th>
                            <th>Quantity</th>
                            <th>Edit</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productList as $product)
                        <tr>
                            <td>{{$product->img}}</td>
                            <td>{{$product->name}}</td>
                            <td class=" text-black text-wrap text-justify text-lowercase" >{{$product->description}} <i class="mdi mdi-arrow-down"></i>
                            </td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>
                                <a class="badge badge-danger" href="{{route('Admin.products.edit',$product ->id)}}"> Edit</a>
                            </td>
                            <td>
                                <form action="{{route('Admin.products.destroy',$product ->id)}}" method="post">
                                    {{csrf_field()}}

                                    {{method_field('DELETE')}}
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection