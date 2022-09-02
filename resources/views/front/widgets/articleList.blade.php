@if(count($articles)>0)
@foreach($articles as $article)
<!-- Post preview-->
<div class="post-preview">
    <a href="{{route('single',[$article->getCategory->slug,$article->slug])}}">
        <h2 class="post-title">{{$article->title}}</h2>
        <h3 class="post-subtitle">{!! str_limit($article->content,75) !!}</h3>
    </a>
    <p class="post-meta">Kategori :
    <a href="#!">{{ $article->getCategory->name}}</a>
    <span class="text-danger float-end">Okunma Sayısı : <b>"{{$article->hit}}"</b>&nbsp&nbsp
    <span class="float-end text-muted">{{$article->created_at->diffForHumans()}}</span>
    </span>
    </p>
</div>
<!-- Divider-->
@if(!$loop->last)
<hr>
@endif
@endforeach
<div class="float-end">
    {{$articles->links()}}
</div>
@else
    <div class="alert alert-danger">
        <h2>Bu Kategoriye Ait Yazı Bulunamadı.</h2>
    </div>
@endif