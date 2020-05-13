@extends('layouts.app')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
@section('content')
    <h1>Список статей</h1>
    @foreach ($articles as $article)
        <a href="{{route('articles.show', ['id' => $article->id])}}"><h2>{{$article->name}}</h2></a>
        <div>{{Str::limit($article->body, 200)}}</div>
        <small><a href="{{ route('articles.edit', ['id' => $article->id]) }}">Edit</a></small>
    @endforeach
@endsection