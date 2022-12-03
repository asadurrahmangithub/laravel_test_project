@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card mt-3">
                    <div class="card-header">
                        <h3>Manage Category</h3>
                    </div>
                    @if(session()->has('massage'))
                        <div class="alert alert-success">
                            {{session()->get('massage')}}
                        </div>
                    @endif
                    <div class="card-body">
                        <table class="table table-hover table-bordered table-striped">

                            <tr>
                                <th>sl</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Acton</th>
                            </tr>
                            @foreach($categories as $category)
                                <tr>
                                    <th>{{$category->id}}</th>
                                    <th>{{$category->category}}</th>
                                    <th>
                                        @if($category->publication_status==1)
                                            Public
                                        @else
                                            UnPublic
                                        @endif
                                    </th>
                                    <th>
                                        <a href="" class="btn btn-outline-primary">Edit</a>
                                        @if($category->publication_status==1)
                                            <a href="" class="btn btn-outline-success">Public</a>
                                        @else
                                            <a href="" class="btn btn-outline-warning">UnPublic</a>
                                        @endif
{{--                                                                            <a href="" class="btn btn-outline-danger" onclick="return confirm('Are you sure to Delete this!!')">Delete</a>--}}
{{--                                        <form >--}}
{{--                                            @csrf--}}
{{--                                            <input type="hidden" value="" name="delete_id">--}}
{{--                                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure to Delete this!!')">Delete</button>--}}
{{--                                        </form>--}}
                                    </th>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
