@extends('layout')@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Basic form</h4>
                <p class="card-description"> Basic form elements </p>
                <form class="forms-sample" action="{{route('Admin.orders.store')}}" method="post">
                    {{ csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail3">Code</label>
                        <input name="code" type="text" class="form-control" id="exampleInputEmail3" placeholder="code">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Status</label>
                        <input name="status" type="text" class="form-control" id="exampleInputPassword4" placeholder="status">
                    </div>
                    <div class="form-group">
                        <label for="inputText4" class="col-form-label">User_id</label>
                        <select  id="user_id" name="user_id" class="form-control dropdown-toggle">
                            @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->id }}: {{ $user->name }}</option>
                            @endforeach
                        </select>


                    </div>

                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection