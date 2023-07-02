
<button>
  <a href="{{route("productos")}}"> volver a los productos </a>
</button>
<div>
  <p>id: {{$producto[0]->id}}</p>
  <p>producto:{{$producto[0]->columnaproductos}}</p>
  <p>creado en:{{$producto[0]->created_at}}</p>
  <p>actualizado el:{{$producto[0]->updated_at}}</p> 
</div>