@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quản lí danh mục</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (!isset($episode))
                    {!! Form::open(['route'=>'episode.store','method'=>'POST']) !!}
                    @else
                    {!! Form::open(['route'=>['episode.update',$episode->id],'method'=>'PUT']) !!}
                    @endif
                        <div class="group-form">
                            {!! Form::label('Movie', 'Movie', []) !!}
                            {!! Form::select('movie_id',$movie,  isset($episode) ? $episode->movie_id : '', ['class'=>'form-control']) !!}
                        </div>
                        <div class="group-form">
                            {!! Form::label('Link', 'Link', []) !!}
                            {!! Form::text('linkphim', isset($episode) ? $episode->linkphim : '', ['class'=>'form-control','placeholder'=>'Điền dữ liệu vào...']) !!}
                        </div>
                        <div class="group-form">
                            {!! Form::label('Episode', 'Episode', []) !!}
                            {!! Form::text('episode', isset($episode) ? $episode->episode : '', ['class'=>'form-control','placeholder'=>'Điền dữ liệu vào...']) !!}
                        </div>
                        @if (!isset($episode))
                        {!! Form::submit('Thêm', ['class'=>'btn btn-success']) !!}
                        @else
                        {!! Form::submit('Cập nhật', ['class'=>'btn btn-success']) !!}
                        @endif
                    {!! Form::close() !!}
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Movie</th>
                        <th scope="col">Link</th>
                        <th scope="col">Episode</th>
                        <th scope="col">Manage</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($list as $key => $cate)
                        <tr>
                            <th scope="row">{{$key}}</th>
                            <td>{{$cate -> movie -> title}}</td>
                            <td>{{$cate -> linkphim}}</td>
                            <td>{{$cate -> episode}}</td>
                            <td>
                                {!! Form::open([
                                    'method' =>'DELETE',
                                    'route' =>['episode.destroy',$cate->id],
                                    'onsubmit' => 'return confirm("Delete?")'
                                ]) !!}
                                    {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}
                                <a href="{{route('episode.edit',$cate->id )}}" class="btn btn-warning">Sửa</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection
