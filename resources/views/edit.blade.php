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
 
  <form action="{{route('update',($product->id))}}" method="post" enctype="multipart/form-data">
    @csrf
    
   <input type="hidden" name="id" value="{{$product->id}}">
    <div class="form-group">
      <label for="name">name</label>
      <input type="text" class="form-control" value="{{$product->name}}" id="name"  name="name">
    </div>
    <div class="form-group">
      <label for="price">price</label>
      <input type="text" class="form-control"  value="{{$product->price}}"id="price"  name="price">
    </div>
    <div class="form-group">
      <label for="description">description</label>
     
      <input type="text" class="form-control" id="description"   value="{{$product->description}}"name="description">
    </div>
    <div>
    <label class="form-label" for="customFile">change file</label>
      
    <input type="file" class="form-control" name='image'  id="customFile" />
    <img height="40"  src="{{asset('storage/'.$product->image)}}">  
<!-- <a href="{{asset('storage/'.$product->image)}}"  target="_blank" rel="noopener noreferrer">view uploaded image</a> -->
    </div>
   
    <button type="submit" class="btn btn-default">update</button>    
    
  </form>
</div>

</body>
</html>
