@extends('layouts.admin')


@section('content')

    <a href="{{route('admin.users.index')}}">Back to users</a>

    <h1>Edit User</h1>

    <div class="row">
        <div class="col-sm-3">
            <img src="{{$user->photo ? $user->photo->file : \App\Photo::getPlaceholder()}}" alt=""
                 class="img-responsive img-rounded">
        </div>
        <div class="col-sm-9">

            {!! Form::model($user,['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control', 'required'=>'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::email('email', null, ['class'=>'form-control', 'required'=>'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id', 'Role:') !!}
                {!! Form::select('role_id', $roles, null, ['class'=>'form-control', 'required'=>'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('is_active', 'Status:') !!}
                {!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), null, ['class'=>'form-control', 'required'=>'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'File:') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class'=>'form-control']) !!}
            </div>

            <div class="row">

            <div class="form-group col-sm-6">
                {!! Form::submit('Update User', ['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

            {{-- DELETE THE USER --}}

            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]], ['class'=>'col-sm-6']) !!}

                <div class="form-group text-right">
                    {!! Form::submit('Delete user', ['class'=>'btn btn-danger']) !!}
                </div>

            {!! Form::close() !!}
            </div>

            @include('includes.form_error')
        </div>
    </div>

@endsection