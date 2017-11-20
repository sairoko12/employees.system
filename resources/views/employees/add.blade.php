@extends('layouts.main')

@section('content')
<div class="row">
	<div class="col-md-6">
		<form>
			<div class="form-group">
			    <label for="name">Nombre Completo</label>
			    <input type="text" class="form-control" id="name" name="name">
  			</div>
  			<div class="form-group">
			    <label for="name">Correo Electrónico</label>
			    <input type="email" class="form-control" id="email" name="email">
  			</div>
  			<div class="form-group">
			    <label for="name">Fecha de Nacimiento</label>
			    <input type="date" class="form-control" id="dob" name="dob">
  			</div>
		</form>
	</div>
	<div class="col-md-6">
		
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('js/add.employee.js') }}"></script>
@endsection