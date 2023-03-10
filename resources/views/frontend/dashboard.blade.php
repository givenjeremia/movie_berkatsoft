<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Given Movie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body class=" bg-dark" data-bs-theme="dark">
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Given Movie</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @if (Request::is('/'))
                    @foreach ($category as $item)
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#" id="{{ $item->slug }}" onclick="getMovie('{{ $item->slug }}')">{{ $item->name }}</a>
                    </li>
                    @endforeach
                    @endif
                </ul>
                <span class="navbar-text">
                    <a class="btn  btn-success text-white" href="{{ route('login') }}">{{ __('Login') }}</a>

                    @if (Route::has('register'))
                    <a class="btn btn-dark btn-outline-ligh" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                </span>
            </div>
        </div>
    </nav>
    <div class="container-fluid p-3">
        <div id="movies">

        </div>
        @yield('content')
    </div>

    <!-- Modal -->

    <div class="modal fade" id="exampleModalContent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
          <div class="modal-content" id="modalContent">
            
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
    <script>
        @if(Request::is('/'))
        var fist = '#'+"{{ $category_first_klik->slug }}";
        $(fist).addClass('active');
        $(fist).trigger('click');
        var active = fist;
        $(".nav-link").on('click', function() {
            var id = '#'+$(this).attr('id');
            $(active).removeClass('active');
            active = id;
            $(id).addClass('active');
        });
        @endif
 
        function getMovie(slug) {
            $.ajax({
                type: 'POST'
                , url: '{{route("category.movie" )}}'
                , data: {
                    '_token': '<?php echo csrf_token() ?>'
                    , 'slug': slug
                }
                , success: function(data) {
                    $('#movies').html(data.msg)
                }
            });
        }

        function getDetailMovie(id) {
            $.ajax({
                type: 'POST'
                , url: '{{route("movie.detail" )}}'
                , data: {
                    '_token': '<?php echo csrf_token() ?>'
                    , 'id': id
                }
                , success: function(data) {
                    $('#modalContent').html(data.msg)
                }
            });
        }

    </script>
    @yield('js')
</body>

</html>
