


<tr>
    <th scope="row">{{++$number}}</th>
    <td>{{$item->name}}</td>
    <td>{{$item->created_at}}</td>
    <td>{{$item->updated_at}}</td>
    <td class="d-flex"> 
      <form action="{{route( "$deleteRoute" , $item)}}" method="post">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger bg-danger">Delete</button>
      </form>
       | <a 
          href="{{ route("$editRoute", $item) }}"
        class="btn btn-info">Edit</a>
      </td>
  </tr>