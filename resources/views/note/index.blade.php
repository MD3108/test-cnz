@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <h1 class="text-hide">
                Combo NoteZ
            </h1>
            @if(session()->has('message'))
                <div class="alert alert-success mb-3" role="alert">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="card-title">
                                Filter
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">   
                    <div class="grid --notes">
                        @foreach ($notes as $note)
                        <div class="grid-item">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-body__header d-flex justify-content-between">
                                        <div class="cb-header__fighter d-flex ">
                                            @foreach ($note->fighters as $fighter)
                                            @if ($loop->first)
                                            <img class="fighter --main" src="{{ asset('/storage/' .$fighter->image_path) }}" alt="{{ $fighter->name }}">
                                            <div>
                                                @elseif($loop->index == 1)
                                                <div>
                                                    <img class="fighter --a1" src="{{ asset('/storage/' .$fighter->image_path) }}" alt="{{ $fighter->name }}">
                                                    <!-- --a --b --c for the 3 diffrent assist & depoending which was chosen-->
                                                    <span class="assist">{{ $fighter->assist }}</span>                                                    
                                                </div>

                                                @elseif($loop->index == 2)
                                                    <div>
                                                        <img class="fighter --a2" src="{{ asset('/storage/' .$fighter->image_path) }}" alt="{{ $fighter->name }}">
                                                        <!-- --a --b --c for the 3 diffrent assist & depoending which was chosen-->
                                                        <span class="assist">{{ $fighter->assist }}</span>
                                                    </div>
                                                @endif    
                                                @endforeach
                                            </div><!--cb-header__fighter End-->
                                        </div>
                                        <div class="cb-header__details">
                                            <div class="details__categories">
                                                @foreach ($note->categories as $category)
                                                    <span>
                                                        {{ $category->name }}
                                                    </span>
                                                @endforeach
                                            </div>
                                            <div class="details__damage text-right">
                                                <span>
                                                    {{ $note->damage }}
                                                </span>
                                                <span class="text-uppercase">
                                                    dmg
                                                </span>
                                            </div>
                                            
                                            <div class="details__ki d-flex">
                                                <div class="ki__start">
                                                    <span>
                                                        {{ $note->ki_start }}
                                                    </span>
                                                    <span class="">
                                                        Ki&nbsp;(start)
                                                    </span>
                                                </div>
                                                <span>
                                                    &nbsp;-&nbsp;
                                                </span>
                                                <div class="ki__end">
                                                    <span>
                                                        {{ $note->ki_end }}
                                                    </span>
                                                    <span class="">
                                                        Ki&nbsp;(end)
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- cb-header__details End -->
                                    </div>
                                    <div class="card-body__combo">
                                        <div class="cb-combo d-flex justify-content-between">
                                            <h2 class="cb-combo__name card-title">
                                                {{ $note->name }}
                                            </h2>
                                            <button class="cb-combo__btn --vod btn ">
                                                <svg class="icon icon-play">
                                                    <use xlink:href="#icon-play"></use>
                                                </svg>
                                            </button>
                                        </div>
                                        
                                        <div class="cb-combo__notation">
                                            {{ $note->notation }}
                                        </div>
                                    </div><!-- card-body__combo End -->
                                    <div class="card-body__footer pt-4">
                                        <div class="d-flex justify-content-between">
                                            <div class="cb-footer__user-date">
                                                <span class="ud__username">
                                                    {{ $note->user->name }}
                                                </span>
                                                <span class="ud__date">
                                                    {{ date("m / d / y", strtotime($note->created_at)) }}
                                                </span>
                                            </div>
                                            <div class="cb-footer__interactions">
                                                <div class="interactions__favorites">
                                                    @if (isset(Auth::user()->id) && Auth::user()->id == $note)
                                                        {{  }}
                                                    @endif
                                                </div>
                                                <div class="interactions__likes">
                                                    @foreach ($note->likes as $key=>$like)
                                                        @if ($loop->last)
                                                            <div class="likes__count">
                                                                {{ $loop->count }} likes
                                                            </div>
                                                        @endif
                                                    @endforeach 
                                                </div>
                                                @if (isset(Auth::user()->id) && Auth::user()->id == $note->user_id)
                                                    <div class="interactions__update d-flex justify-content-between align-items-center">
                                                        <div class="update__edit pr-4">
                                                            <a href="/note/{{ $note->id }}/edit" class="text-uppercase card-link">
                                                                Edit
                                                            </a>
                                                        </div>
                                                        <div class="update__delete">
                                                            <form
                                                                action="/note/{{ $note->id }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="text-uppercase btn btn-danger" type="submit">
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card --vod hide">
                                <div class="card-body --vod">
                                    <iframe 
                                        class="vod"
                                        src="{{ url($note->youtube_url) }}" 
                                        title="YouTube video player" 
                                        frameborder="0" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                        allowfullscreen
                                    ></iframe>
                                    <button class="btn-close --vod" aria-label="Close" >
                                        <svg class="icon icon-close">
                                            <use xlink:href="#icon-close"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                    <div class="page-load-status">
                        <div class="loader-ellips infinite-scroll-request">
                          <span class="loader-ellips__dot"></span>
                          <span class="loader-ellips__dot"></span>
                          <span class="loader-ellips__dot"></span>
                          <span class="loader-ellips__dot"></span>
                        </div>
                        <p class="infinite-scroll-last text-md-center">You have seen all notes, create some more!</p>
                        <p class="infinite-scroll-error text-md-center">No more pages to load</p>
                      </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('cdn')
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script>
    <script src="{{ URL('/js/masonry.js') }}"></script>
    <!--<script src="{{ URL('/js/vod.js') }}"></script>-->
@endsection