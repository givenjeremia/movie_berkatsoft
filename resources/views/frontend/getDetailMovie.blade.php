
<div class="modal-header">
    <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">
        <a href="{{ $responseBody->homepage }}" >
            {{ $responseBody->original_title }}
        </a>
    </h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <img style="display: block;
    margin-left: auto;
    margin-right: auto;
    width: 30%;" src="https://image.tmdb.org/t/p/w500{{ $responseBody->poster_path }}" alt="">
    <br>
    <h3>Release Date : {{ date('d-m-Y', strtotime($responseBody->release_date)) }}</h3>
    <h3>Overview : {{ $responseBody->overview }}</h3>
    <h3>
        Genre :
        <ul>
        @foreach ($responseBody->genres as $item)
            <li>{{ $item->name }}</li>
        @endforeach
        </ul>
    </h3>
    <h3>Runtime : {{ $responseBody->runtime}}</h3>
    <h3>Popularity : {{ $responseBody->popularity }}</h3>


</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
</div>