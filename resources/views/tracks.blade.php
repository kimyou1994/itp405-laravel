<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Assignment 1</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>
<body>
  <table class="table">
    <tr>
      <th>Album Name</th>
      <th>Title</th>
      <th>Artist Name</th>
      <th>Price</th>
    </tr>
      @forelse($tracks as $track)
      <tr>
        <td>
           {{$track->Title}}
        </td>
        <td>
          {{$track->trackName}}
        </td>
        <td>
          {{$track->artistName}}
        </td>
        <td>
          {{$track->UnitPrice}}
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="4">No tracks found</td>
      </tr>
      @endforelse
  </table>
</body>
</html>