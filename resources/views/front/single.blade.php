@extends('front.layouts.master')
@section('title',$article->title)
@section('bg',$article->image)
@section('content')
<div class="col-md-10 col-lg-8 col-xl-7">
    {!! $article->content !!}
    <br><br>
    <span class="text-danger">Okunma Sayısı : <b>{{$article->hit}}</b></span>
</div>
@include('front.widgets.categoryWidget')

@endsection