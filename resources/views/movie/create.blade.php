@extends('layouts.master')


@section('title')
    Movies Part
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <br/>
                <h3 style="alignment: center;padding-top: 20px">Add New Movie</h3>
            <br/>
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            @if(\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{\Session::get('success')}}</p>
                </div>
            @endif

            <form method="post" action="{{url('movie')}}" style="font-size: large">
                {{csrf_field()}}
                <div class="form-group" >
                    <input type="text" name="id" class="form-control" placeholder="Enter The Movie ID"/>
                </div>
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Enter The Movie Name"/>
                </div>
                <div class="form-group">
                    <input type="text" name="description" class="form-control" placeholder="Enter The Movie Description"/>
                </div>
                <div class="form-group">
                    <input type="text" name="rating" class="form-control" placeholder="Enter The Movie Rating"/>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary"/>
                </div>
            </form>

        </div>
    </div>
@endsection
