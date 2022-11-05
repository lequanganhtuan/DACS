@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Quản lí quốc gia</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['route'=>'country.store','method'=>'POST']) !!}
                        <div class="group-form">
                            {!! Form::label('title', 'Title', []) !!}
                            {!! Form::text('title', null, ['class'=>'form-control','placeholder'=>'Điền dữ liệu vào...']) !!}
                        </div>
                        <div class="group-form">
                            {!! Form::label('desciption', 'Description', []) !!}
                            {!! Form::textarea('description', null, ['class'=>'form-control','placeholder'=>'Điền dữ liệu vào...']) !!}
                        </div>
                        {!! Form::submit('Thêm', ['class'=>'btn btn-success']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
