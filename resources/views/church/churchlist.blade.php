<table>
<tr>
<th>Name</th>
<th>Description</th>
<th>Image</th>
<th>Address</th>
<th>Location</th>
</tr>
<tbody>
<tr>
@foreach($churches as $church)
<td>{{$church->name}}</td>
<td>{{$church->description}}</td>
<td>{{$church->image_id}}</td>
<td>{{$church->address}}</td>
<td>{{$church->location}}</td>
@endforeach
</tr>
</tbody>
</table>