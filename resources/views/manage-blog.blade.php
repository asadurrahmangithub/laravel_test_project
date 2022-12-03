@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <h3>Manage Blog</h3>
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
                                <th>Title</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Acton</th>
                            </tr>
                            @foreach($blogs as $blog)
                            <tr>
                                <th>{{$blog->id}}</th>
                                <th>{{$blog->title}}</th>
                                <th>{{$blog->category}}</th>
                                <th>{{$blog->author}}</th>
                                <th>{!! substr($blog->description,0,40) !!}....</th>
                                <th>
                                    <img src="{{asset($blog->image)}}" alt="" style="height: 100px; width: 100px;">
                                </th>
                                <th>
                                    @if($blog->publication_status==1)
                                        Public
                                    @else
                                        UnPublic
                                    @endif
                                </th>
                                <th>
                                    <a href="{{route('edit-blog',['id'=>$blog->id])}}" class="btn btn-outline-primary">Edit</a>
                                    @if($blog->publication_status==1)
                                        <a href="{{route('publication-status',['id'=>$blog->id])}}" class="btn btn-outline-success">Public</a>
                                    @else
                                        <a href="{{route('publication-status',['id'=>$blog->id])}}" class="btn btn-outline-warning">UnPublic</a>
                                    @endif
{{--                                    <a href="{{route('delete-blog',['id'=>$blog->id])}}" class="btn btn-outline-danger" onclick="return confirm('Are you sure to Delete this!!')">Delete</a>--}}
                                    <form action="{{route('delete')}}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{$blog->id}}" name="delete_id">
                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure to Delete this!!')">Delete</button>
                                    </form>
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
