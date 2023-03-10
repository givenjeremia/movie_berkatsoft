<div class="modal-header">
    <h5 class="modal-title text-dark" id="exampleModalLabel">Edit Category</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  <form action="{{ route('category.update',$data->id) }}" method="post">
    @csrf
    @method('PUT')

  <div class="modal-body">
    <input type="hidden" name="id" value="{{ $data->id }}"
    <label for="" class="col-form-label">Nama Category</label>
    <select class="form-control"  name="category" >

      <option value="Now Playing" {{ $data->name == "Now Playing" ? 'selected' : ''}}>Now Playing</option>
      <option value="Popular" {{ $data->name == "Popular" ? 'selected' : ''}}>Popular</option>
      <option value="Latest" {{ $data->name == "Latest" ? 'selected' : ''}}>Latest</option>
      <option value="Upcoming" {{ $data->name == "Upcoming" ? 'selected' : ''}}>Upcoming</option>
      <option value="Top Rated" {{ $data->name == "Top Rated" ? 'selected' : ''}}>Top Rated</option>
    </select>


  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save</button>
  </div>
</form>
