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
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex ">
                                            @foreach ($note->fighters as $fighter)
                                                @if ($loop->first)
                                                <img class="fighter --note" src="{{ asset('/storage/' .$fighter->image_path) }}" alt="{{ $fighter->name }}">
                                                <div>
                                                @elseif($loop->index == 1)
                                                    <div>
                                                        <img class="fighter --a1" src="{{ asset('/storage/' .$fighter->image_path) }}" alt="{{ $fighter->name }}">
                                                        <span class="assist">{{ $fighter->assist }}</span>                                                    
                                                    </div>

                                                @elseif($loop->index == 2)
                                                    <div>
                                                        <img class="fighter --a2" src="{{ asset('/storage/' .$fighter->image_path) }}" alt="{{ $fighter->name }}">
                                                        <span class="assist">{{ $fighter->assist }}</span>
                                                    </div>
                                                @endif    
                                            @endforeach
                                                </div>
                                        </div>
                                        <div class="details">
                                            <div class="categories">
                                                @foreach ($note->categories as $category)
                                                    <span>
                                                        {{ $category->name }}
                                                    </span>
                                                @endforeach
                                            </div>
                                            <div class="text-right">
                                                <span>
                                                    {{ $note->damage }}
                                                </span>
                                                <span class="text-uppercase">
                                                    dmg
                                                </span>
                                            </div>
                                            
                                            <div class="d-flex">
                                                <div>
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
                                                <div>
                                                    <span>
                                                        {{ $note->ki_end }}
                                                    </span>
                                                    <span class="">
                                                        Ki&nbsp;(end)
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="d-flex">
                                            <h2 class="card-title">
                                                {{ $note->name }}
                                            </h2>
                                            <button class="btn --play">Play preview</button>
                                        </div>
                                        
                                        <div class="notation">
                                            {{ $note->notation }}
                                        </div>
                                    </div>
                                    <div class="pt-4">
                                        <div class="d-flex justify-content-between">
                                            <div class="">
                                                <span>
                                                    {{ $note->user->name }}
                                                </span>
                                                <span>
                                                    {{ date("m / d / y", strtotime($note->created_at)) }}
                                                </span>
                                            </div>
                                                <div>
                                                    @foreach ($note->likes as $key=>$like)
                                                    @if ($loop->last)
                                                        <div>{{ $loop->count }} likes</div>
                                                    @endif
                                                    @endforeach 
                                                </div>
                                            @if (isset(Auth::user()->id) && Auth::user()->id == $note->user_id)
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="pr-4">
                                                        <a href="/note/{{ $note->id }}/edit" class="text-uppercase card-link">
                                                            Edit
                                                        </a>
                                                    </div>
                                                    <div>
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
                            <div class="card --vod">
                                <div class="card-body --vod">
                                    <iframe 
                                        class="vod"
                                        src="{{ url($note->youtube_url) }}" 
                                        title="YouTube video player" 
                                        frameborder="0" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                        allowfullscreen
                                    ></iframe>
                                    <button class="btn-close" aria-label="Close" ></button>
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