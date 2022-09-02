@extends('front.layouts.master')
@section('title','İletişim')
@section('bg','https://wallpapercave.com/wp/wp4863860.jpg')
@section('content')
<div class="col-md-8 mx-auto">
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
<p>Bizimle iletişime geçebilirsiniz.</p>
<div class="my-5">
    <form method="POST" action="{{route('contact.post')}}">
        @csrf
        <div>
            <label for="name">Ad Soyad</label>
            <input class="form-control" value="{{old('name')}}" name="name" type="text" placeholder="Ad Soyad yazınız." required/>
            <p class="help-block text-danger"></p>
        </div>
        <div>
            <label for="email">E-posta Adresi</label>
            <input class="form-control" value="{{old('email')}}" name="email" type="email" placeholder="E-posta adresinizi giriniz." required/>
            <p class="help-block text-danger"></p>
        </div>
        <div>
            <label>Konu</label>
            <select class="form-control" name="topic">
                <option @if(old('topic')=="Bilgi") selected @endif>Bilgi</option>
                <option @if(old('topic')=="Destek") selected @endif>Destek</option>
                <option @if(old('topic')=="Genel") selected @endif>Genel</option>
            </select>
        </div>
        <div>
            <label for="message">Mesajınız</label>
            <textarea class="form-control" name="message" placeholder="Mesajınız" style="height: 12rem" required>{{old('message')}}</textarea>
            <p class="help-block text-danger"></p>
        </div><br>
        <button class="btn btn-primary" id="submitButton" type="submit">Gönder</button>
    </form>
</div>
</div>
<div class="col-md-4 float-end">
    <div class="card card-default">
        <div class="card-body">PanelContent</div>
        Adres : ASDASDASDASDASD
    </div>
</div>
@endsection
