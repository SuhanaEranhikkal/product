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
@if (\Session::has('message'))
    <div class="alert alert-success">
       <p>{{ \Session::get('message') }}</p>
    </div>
@endif
@if (\Session::has('success'))
    <div class="alert alert-success">
       <p>{{ \Session::get('success') }}</p>
    </div>
@endif
<div class="container">
<a href="{{ route('export_excel') }}" class="btn btn-primary"> Excel export </a>
<a href="{{route('export_pdf')}}" class="btn btn-primary"> Pdf export</a>
      
<!-- <a href="{{route('export_pdf')}}" class="btn btn-primary">view pdf</a>             -->
<a href="{{route('create')}}" class="btn btn-primary">add product</a>
<table class="table">
  <thead>
    
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">price</th>
      <th scope="col">description</th>
      <th scope="col">image</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $product)
   
    
    <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$product->name}}</td>
      <td>{{$product->price}}</td>
      <td>{{$product->description}}</td>
      <td>
      <img height="40"  src="{{asset('storage/'.$product->image)}}">  
      </td>
      <td>
        <a href="{{route('product_edit',['product'=>$product->id])}}" class="btn btn-primary">edit</a>
        <form style="display:inline" action="{{route('delete',['product'=>$product->id])}}" method="post">   
          
          @csrf       
          @method('DELETE')
        <button onclick="return confirm('do you want to delete?')" type="submit" class="btn btn-danger">delete</button>
      </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>

</body>
</html>
