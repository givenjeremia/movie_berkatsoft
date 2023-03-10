@extends('layouts.dashboard')

@section('content')
<h1>Master Category</h1>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambah Category
  </button>
  <br>
<table class="table table-dark table-hover">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($categories as $item)
    <tr>
      <th scope="row">1</th>
      <td>{{ $item->name }}</td>
      <td>
        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalEdit" onclick="getEditForm({{$item->id}})">
            Edit
          </button>
          <form action="{{ route('category.destroy', $item->id ) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger" onclick="if(!confirm('Apakah Anda Yakin Ingin Menghapus Category')) return false;">DELETE</button>
          </form>
      </td>
    </tr>
    @endforeach
  
    </tbody>
  </table>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-dark" id="exampleModalLabel">Tambah Categori</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('category.store')}} " method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <label for="" class="col-form-label">Nama Category</label>
            <select class="form-control"  name="category" >
              <option value="Now Playing">Now Playing</option>
              <option value="Popular">Popular</option>
              <option value="Latest">Latest</option>
              <option value="Upcoming">Upcoming</option>
              <option value="Top Rated">Top Rated</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" id="modalContent">
  
      </div>
    </div>
  </div>
@endsection

@section('js')
<script>
function getEditForm(id){
  $.ajax({
    type:'POST',
    url:'{{route("category.edit" )}}',
    data:{'_token':'<?php echo csrf_token() ?>',
        'id':id
 },
    success: function(data){
      $('#modalContent').html(data.msg)
    }
  });
}
$(document).ready(function() {
 $('#myTable').DataTable();
} );
</script>

@endsection

