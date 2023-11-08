<!DOCTYPE html>
<html lang="en">
<head>
  <title>demo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

  <form action="{{route('store')}}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
      <label for="name">name</label>
      <input type="text" class="form-control" value="{{old('name')}}"id="name"  name="name">
    </div>
    <div class="form-group">
      <label for="price">price</label>
      <input type="text" class="form-control" value="{{old('price')}}"id="price"  name="price">
    </div>
    <div class="form-group">
      <label for="description">description</label>
      <input type="text" class="form-control"value="{{old('description')}}" id="description"  name="description">
    </div>
    <div>
    <label class="form-label" for="customFile">upload file</label>
    <input type="file" class="form-control" value="{{old('image')}}"name='image' id="customFile" />

    </div>
   
    <button type="submit" class="btn btn-default">Submit</button>    
    
  </form>
</div>

</body>
</html>
