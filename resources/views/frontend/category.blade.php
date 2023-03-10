<div class="container overflow-hidden text-center ">
    <div class="row gy-5">
      @foreach ($responseBody->results as $item)
      <div class="col-6 ">
        <a class=" btn-block text-decoration-none" onclick="getDetailMovie({{ $item->id }})" data-bs-toggle="modal" data-bs-target="#exampleModalContent">
            <div class="card " style="">
                <img src="https://image.tmdb.org/t/p/w500{{ $item->backdrop_path }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title text-white">{{ $item->original_title }}</h5>
                </div>
             </div>
        </a>
      </div>
          
      @endforeach
    </div>
</div>

