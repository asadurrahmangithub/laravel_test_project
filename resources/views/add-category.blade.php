@extends('master')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Add Blog Form</div>
                    @if(session()->has('massage'))
                        <div class="alert alert-success">
                            {{session()->get('massage')}}
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{route('new-category')}}" method="POST">
                            @csrf
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <input type="text" name="category" required  placeholder="Enter Your Category Name" class="form-control">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10 mt-1">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="publication_status" checked id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Publish</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="publication_status" id="inlineRadio2" value="2">
                                        <label class="form-check-label" for="inlineRadio2">UnPublish</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-3">
                                    <input type="submit" value="Submit" class="form-control btn btn-outline-success">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
