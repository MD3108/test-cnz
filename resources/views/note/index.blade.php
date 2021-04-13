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
                <div class="col-4">
                    <h2>
                        Filter
                    </h2>
                </div>
                <div class="col-8">   
                    @foreach ($notes as $note)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <span>
                                        {{ $note->fighter }}
                                    </span>
                                </div>
                                <div>
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
                                <h2 class="card-title">
                                    {{ $note->name }}
                                </h2>
                                <p class="card-text">
                                    {{ $note->notation }}
                                </p>
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
                    @endforeach
                </div>
                
            </div>
        </div>
    </section>
@endsection