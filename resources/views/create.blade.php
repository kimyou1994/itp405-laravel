<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Add new tracks</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>
<body>
  <div class="row">
    <div class="col">
      <form action="/tracks" method="post">
        @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text"  name="name" class="form-control" value="{{old('name')}}">
          <small class="text-danger">{{$errors->first('name')}}</small>
        </div>
        <div class="form-group">
          <label for="album">Album</label>
          <select name="album">
            @foreach($albums as $album)
              <option value="{{$album->AlbumId}}" {{$album->AlbumId == old("album") ? "selected":""}}>
                {{$album->Title}}
              </option>
            @endforeach
          </select> 
        </div>
        <div class="form-group">
          <label for="media">Media</label>
          <select name="media">
            @foreach($medias as $media)
              <option  value="{{$media->MediaTypeId}}" {{$media->MediaTypeId == old("media") ? "selected":""}}>
                {{$media->Name}}
              </option>
            @endforeach
          </select> 
        </div>
        <div class="form-group">
          <label for="genres">Genre</label>
          <select name="genre">
            @foreach($genres as $genre)
              <option  value="{{$genre->GenreId}}" {{$genre->GenreId == old("genre") ? "selected":""}}>
                {{$genre->Name}}
              </option>
            @endforeach
          </select> 
        </div>
        <div class="form-group">
          <label for="composer">Composer</label>
          <input type="text" id="composer" name="composer" class="form-control" value="{{old('composer')}}">
          <small class="text-danger">{{$errors->first('composer')}}</small>
        </div>
        <div class="form-group">
          <label for="millisecond">Milliseconds</label>
          <input type="number" id="millisecond" name="millisecond" class="form-control" value="{{old('millisecond')}}">
          <small class="text-danger">{{$errors->first('millisecond')}}</small>
        </div>
        <div class="form-group">
          <label for="byte">Bytes</label>
          <input type="number" id="byte" name="byte" class="form-control" value="{{old('byte')}}">
          <small class="text-danger">{{$errors->first('byte')}}</small>
        </div>
        <div class="form-group">
          <label for="price">Unit Price</label>
          <input type="number" id="price" name="price" class="form-control" value="{{old('price')}}">
          <small class="text-danger">{{$errors->first('price')}}</small>
        </div>
        <button type="submit" class="btn btn-primary">
          Save
        </button>
      </form>
    </div>
  </div>
</body>
</html>