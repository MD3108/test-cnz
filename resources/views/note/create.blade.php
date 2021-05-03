<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <main class="py-4">
            <section class="section --form">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h1 class="title --main text-center">
                                Create your Combo Note
                            </h1>
                            @if ($errors->any())
                                <div class="mb-3">
                                     @foreach ($errors->all() as $error)
                                     <div>
                                         <span>
                                            {{ $error }}
                                         </span>
                                     </div>
                                    @endforeach
                                </div>
                               
                            @endif
                            <form class="form"
                                action="/note" 
                                method="POST">
                                @csrf
                                <div class="form__part --fighter">
                                    <div>
                                        <h2 class="title --form">
                                            Who’s your fighter
                                        </h2>
                                    </div>
                                    <div class="form__fighters mb-3">
                                        <div class="fighters__select">
                                            @foreach ($fighters as $fighter)
                                            <label class="f-select__fighter" for="{{ $fighter->id }}" >
                                                <img src="{{ asset('/storage' .$fighter->image_path) }}" alt="{{ $fighter->name }}">
                                            </label>
                                            <input type="checkbox" name="fighter" id="{{ $fighter->id }}">
                                            @endforeach
                                        </div>
                                       

                                        <div class="fighters__chosen">
                                            <h2 class="title --form">
                                                Your chosen Fighter(s)
                                            </h2>
                                            <div class="f-chosen">
                                                <div class="f-chosen__el --main">
                                                    <label class="f-select__fighter" for="chosen-1" >
                                                        <img src="#" alt="user select 1">
                                                    </label>
                                                    <input type="checkbox" name="chosen" id="chosen-1">
                                                </div>
                                                <div class="f-chosen__el --a1">
                                                    <label class="f-select__fighter" for="chosen-2" >
                                                        <img src="#" alt="user select 2">
                                                    </label>
                                                    <input type="checkbox" name="chosen" id="chosen-2">
                                                </div>
                                                <div class="f-chosen__el --a2">
                                                    <label class="f-select__fighter" for="chosen-3" >
                                                        <img src="#" alt="user select 3">
                                                    </label>
                                                    <input type="checkbox" name="chosen" id="chosen-3">
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary mb-3" type="submit">
                                            Next
                                        </button>
                                    </div>
                                </div>
                                <div class="form__part --combo">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">
                                            Give your note a Name
                                        </label>
                                        <input name="name" type="text" class="form-control" id="name" placeholder="My first Combo Note">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Enter your combo - press <span class="text-uppercase">them buttons</span>
                                        </label>
                                        <div class="notation form-control" id="notation">
                                            <img src="{{ asset('/storage'. '/images/buttons/L.png') }}" alt="L">
                                        </div>
                                    </div>
                                </div>
                                <div class="form__part --details">
                                    <div class="mb-3">
                                        <label for="damage" class="form-label">
                                            How  much Damage is inflicted
                                        </label>
                                        <input name="damage" type="number" min="0" max="1000000" class="form-control" id="damage" placeholder="2620">
                                    </div>
                                    <div class="d-flex justify-content-md-between">
                                        <div class="mb-3">
                                            <label for="ki-start" class="form-label">
                                                How many Ki-bar(s) at start
                                            </label>
                                            <input name="ki-start" type="number" step=".1" min="0" max="7" class="form-control" id="ki-start" placeholder="0">
                                        </div>
                                        <div class="mb-3">
                                            <label for="ki-end" class="form-label">
                                                How many Ki-bar(s) at end
                                            </label>
                                            <input name="ki-end" type="number" step=".1" min="-7" max="7" class="form-control" id="ki-end" placeholder="0.5">
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            @foreach ($categories as $category)
                                            <label class="" for="{{ $category->name }}" >
                                                {{ $category->name }}
                                            </label>
                                            <input type="checkbox" name="category" id="{{ $category->name }}">
                                            @endforeach
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <!--
                                            <label class="" for="{# $difficulty->name }}" >
                                                {# $difficulty->name }}
                                            </label>
                                            <input type="checkbox" name="category" id="{# $difficulty->name }}">
                                        -->
                                        </div>
                                    </div>
                                </div>

                                <div class="form__part --check">
                                    
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary mb-3">Publish</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <script src="{{ URL('/js/form.js') }}" ></script>
</body>
</html>