@extends('layouts.app')
@section('content')

<table class="table table-striped">
	<thead class="thead thead-dark">
	<tr>
		<th>#</th>
		<th>department</th>
		<th>country</th>
		<th>Action</th>
	</tr>
	</thead>
	<tbody>
	 @foreach($departments as $dpto)	
		<tr>
			<td><?=$dpto->id?></td>
			<td><?=$dpto->name?></td>
			<td><?=$dpto->country->name?></td>
			<td>
			  <a href=""><span class="far fa-trash-alt"></span></a>
			  <a href=""><span class="far fa-edit"></span></a>
		    </td>
		</tr>
	  @endforeach
	</tbody>
</table>
@endsection