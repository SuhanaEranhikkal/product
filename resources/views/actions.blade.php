          <td>
          <a href="{{route('products.edit',['product'=>$row->id])}}" class="btn btn-secondary">edit</a>
        <form style="display:inline" action="{{route('products.destroy',['product'=>$row->id])}}" method="post">   
          
          @csrf       
          @method('DELETE')
        <button onclick="return confirm('do you want to delete?')" type="submit" class="btn btn-danger">delete</button>
      </form>

          </td>

       