<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Edit Genre</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>
<body>
  <div class="row">
    <div class="col">
      <form action="/genres" method="post">
        @csrf
        <input type="hidden" name="genreId" value="{{$genre->GenreId}}">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text"  name="name" class="form-control" value="{{$genre->Name}}">
          <small class="text-danger">{{$errors->first('name')}}</small>
        </div>
        <button type="submit" class="btn btn-primary">
          Save
        </button>
      </form>
    </div>
  </div>
</body>
</html>