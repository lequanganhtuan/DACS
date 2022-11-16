@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <a href="{{route('movie.index')}}" class="btn btn-primary">Liệt kê phim</a>
                <div class="card-header">Quản lí phim</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (!isset($movie))
                    {!! Form::open(['route'=>'movie.store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                    @else
                    {!! Form::open(['route'=>['movie.update',$movie->id],'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
                    @endif
                        <div class="group-form">
                            {!! Form::label('title', 'Title', []) !!}
                            {!! Form::text('title', isset($movie) ? $movie->title : '', ['class'=>'form-control','placeholder'=>'Điền dữ liệu vào...','id'=>'slug', 'onkeyup'=>'ChangeToSlug()']) !!}
                        </div>
                        <div class="group-form">
                            {!! Form::label('slug', 'Slug', []) !!}
                            {!! Form::text('slug', isset($movie) ? $movie->slug : '', ['class'=>'form-control','placeholder'=>'Điền dữ liệu vào...','id'=>'convert_slug']) !!}
                        </div>
                        <div class="group-form">
                            {!! Form::label('desciption', 'Description', []) !!}
                            {!! Form::textarea('description', isset($movie) ? $movie->description : '', ['class'=>'form-control','placeholder'=>'Điền dữ liệu vào...']) !!}
                        </div>
                        <div class="group-form">
                            {!! Form::label('status', 'Status', []) !!}
                            @if (!isset($movie))
                            {!! Form::select('status',['1'=>'Hiển thị','0'=>'Không hiển thị'], null, ['class'=>'form-control']) !!}
                            @else
                            {!! Form::select('status',['1'=>'Hiển thị','0'=>'Không hiển thị'], $movie->status, ['class'=>'form-control']) !!}
                            @endif
                        </div>
                        <div class="group-form">
                            {!! Form::label('Category', 'Category', []) !!}
                            {!! Form::select('category_id',$category, isset($movie) ? $movie->category_id : '', ['class'=>'form-control']) !!}
                        </div>
                        <div class="group-form">
                            {!! Form::label('Country', 'Country', []) !!}
                            {!! Form::select('country_id',$country, isset($movie) ? $movie->country_id : '', ['class'=>'form-control']) !!}
                        </div>
                        <div class="group-form">
                            {!! Form::label('Genre', 'Genre', []) !!}
                            {!! Form::select('genre_id',$genre, isset($movie) ? $movie->genre_id : '', ['class'=>'form-control']) !!}
                        </div>
                        <div class="group-form">
                            {!! Form::label('Hot', 'Hot', []) !!}
                            {!! Form::select('hot',['1'=>'Hiển thị','0'=>'Không hiển thị'], isset($movie) ? $movie->hot : '', ['class'=>'form-control']) !!}
                        </div>
                        <div class="group-form">
                            {!! Form::label('res', 'Resolution', []) !!}
                            @if (!isset($movie))
                            {!! Form::select('resolution',['1'=>'SD','0'=>'HD'], null, ['class'=>'form-control']) !!}
                            @else
                            {!! Form::select('resolution',['1'=>'SD','0'=>'HD'], $movie->resolution, ['class'=>'form-control']) !!}
                            @endif
                        </div>
                        <div class="group-form">
                            {!! Form::label('Image', 'Image', []) !!}
                            <br>
                            {!! Form::file('anh', ['class'=>'form-control-file']) !!}
                            <br>
                            @if (isset($movie))
                                <img width ="10%" src="{{asset('uploads/movie/'.$movie->image)}}" alt="">
                            @endif
                        </div>
                        @if (!isset($movie))
                        {!! Form::submit('Thêm', ['class'=>'btn btn-success']) !!}
                        @else
                        {!! Form::submit('Cập nhật', ['class'=>'btn btn-success']) !!}
                        @endif
                    {!! Form::close() !!}
                </div>
            </div>
            {{-- <table class="table" id="phim">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Decription</th>
                        <th scope="col">SLug</th>
                        <th scope="col">Active/Inactive</th>
                        <th scope="col">Category</th>
                        <th scope="col">Country</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Manage</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($list as $key => $cate)
                        <tr>
                            <th scope="row">{{$key}}</th>
                            <td>{{$cate -> title}}</td>
                            <td><img width ="10%" src="{{asset('uploads/movie/'.$cate->image)}}" alt=""></td>
                            <td>{{$cate -> description}}</td>
                            <td>{{$cate -> slug}}</td>
                            <td>
                                @if($cate -> status )
                                    Hiển thị
                                @else
                                    Không hiển thị
                                @endif
                            </td>
                            <td>{{$cate -> category->title}}</td>
                            <td>{{$cate -> country->title}}</td>
                            <td>{{$cate -> genre->title}}</td>
                            <td>
                                {!! Form::open([
                                    'method' =>'DELETE',
                                    'route' =>['movie.destroy',$cate->id],
                                    'onsubmit' => 'return confirm("Delete?")'
                                ]) !!}
                                    {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}
                                <a href="{{route('movie.edit',$cate->id )}}" class="btn btn-warning">Sửa</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table> --}}
        </div>
    </div>
</div>
@endsection
