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