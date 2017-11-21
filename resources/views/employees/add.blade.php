@extends('layouts.main')

@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="progress" id="progress-employee" style="margin-bottom: 10px; display: none;">
  			<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%; ">Cargando...</div>
		</div>
		<form method="POST" id="new-employee">
			<h3>Registrar Empleado</h3>
			{{ csrf_field() }}
			<div class="form-group">
			    <label for="name">Nombre Completo</label>
			    <input type="text" class="form-control" id="name" name="name" required>
  			</div>
  			<div class="form-group">
			    <label for="name">Correo Electrónico</label>
			    <input type="email" class="form-control" id="email" name="email" required>
  			</div>
  			<div class="form-group">
			    <label for="name">Fecha de Nacimiento</label>
			    <input type="date" class="form-control" id="dob" name="dob" required>
  			</div>
  			<button type="submit" class="btn btn-primary">Enviar</button>
		</form>
	</div>
	<div class="col-md-6">
		<div class="progress" id="progress-address" style="margin-bottom: 10px; display: none;">
  			<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%; ">Cargando...</div>
		</div>
		<form id="address-form" style="display: none;">
			<h3>Agregar Dirección para :name</h3>
			{{ csrf_field() }}
			<input type="hidden" id="employee-id" name="employee" hidden>
			<div class="form-group">
			    <label for="alias">Alias</label>
			    <input type="text" class="form-control" id="alias" name="alias" value="principal" required>
  			</div>
  			<div class="form-group">
			    <label for="street">Calle y Número</label>
			    <input type="text" class="form-control" id="street" name="street" required>
  			</div>
  			<div class="form-group">
			    <label for="interior">Número Interior</label>
			    <input type="text" class="form-control" id="interior" name="interior">
  			</div>
  			<div class="form-group">
			    <label for="neighborhood">Colonia</label>
			    <input type="text" class="form-control" id="neighborhood" name="neighborhood">
  			</div>
  			<div class="form-group">
			    <label for="municipality">Municipio / Delegación</label>
			    <input type="text" class="form-control" id="municipality" name="municipality">
  			</div>
  			<div class="form-group">
			    <label for="zip_code">Código Postal</label>
			    <input type="text" class="form-control" id="zip_code" name="zip_code" required>
  			</div>
  			<div class="form-group">
			    <label for="city">Ciudad</label>
			    <input type="text" class="form-control" id="city" name="city">
  			</div>
  			<div class="form-group">
			    <label for="state">Estado</label>
			    <input type="text" class="form-control" id="state" name="state" required>
  			</div>
  			<button type="submit" class="btn btn-primary">Enviar</button>
		</form>
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('js/add.employee.js') }}"></script>
@endsection