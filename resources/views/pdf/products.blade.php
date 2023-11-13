<html>
  <head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>
  <table class="table">
  <thead>
    
    <tr>
      <th >#</th>
      <th >name</th>
      <th >price</th>
      <th >description</th>
      <th >image</th>
    
    </tr>
  </thead>
  <tbody>
    @foreach($lists as $list)
   
    
    <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$list->name}}</td>
      <td>{{$list->price}}</td>
      <td>{{$list->description}}</td>
      <td>
 
      <img height="40"  src="storage{{$list->image}}">
      </td>
      
    </tr>
    @endforeach
  </tbody>
</table>



  </body>
</html>
