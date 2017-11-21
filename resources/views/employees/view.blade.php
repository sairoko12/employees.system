@extends('layouts.main')

@section('content')
		<table class="table table-condensed" style="border-collapse:collapse;">
  			<thead>
			    <tr>
			      <th>&nbsp;</th>
			      <th scope="col">#</th>
			      <th scope="col">Nombre</th>
			      <th scope="col">Correo</th>
			      <th scope="col">Fecha de Nacimiento</th>
			      <th scope="col">Fecha de Registro</th>
			    </tr>
  			</thead>
  			<tbody>
  				@foreach($employees as $employee)
  					<tr>
  						<td>
  							<button style="cursor: pointer;" class="btn btn-info btn-sm" data-toggle="collapse" data-target="#demo-{{ $employee->id }}" class="accordion-toggle">
  								<i class="fa fa-home" aria-hidden="true"></i>
  							</button>
  							<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#add-address" data-employee="{{ $employee->id }}" data-nombre="{{ $employee->name }}">
  								<i class="fa fa-plus" aria-hidden="true"></i>
  							</button>
  						</td>
              			<td>{{ $employee->id }}</td>
              			<td>{{ $employee->name }}</td>
              			<td>{{ $employee->email }}</td>
              			<td>{{ $employee->date_of_birthday }}</td>
              			<td>{{ $employee->created_date }}</td>
  					</tr>
  					<tr>
  						<td colspan="12" class="hidden">
  							<div class="accordian-body collapse" id="demo-{{ $employee->id }}">
	              				<table class="table table-striped">
	                      			<thead>
	                        			<tr>
	                        				<td>Alias</td>
	                        				<td>Calle</td>
	                        				<td>Número Interior</td>
	                        				<td>Colonia</td>
	                        				<td>Municipio</td>
	                        				<td>Código Postal</td>
	                        				<td>Ciudad</td>
	                        				<td>Estado</td>
	                        			</tr>
	                      			</thead>
	                      			<tbody>
	                      				@foreach($employee->addresses as $address)
		                        			<tr>
		                        				<td>{{ $address->alias }}</td>
		                        				<td>{{ $address->address->street_name }}</td>
		                        				<td>{{ $address->address->interior_number }}</td>
		                        				<td>{{ $address->address->neighborhood }}</td>
		                        				<td>{{ $address->address->municipality }}</td>
		                        				<td>{{ $address->address->zip_code }}</td>
		                        				<td>{{ $address->address->city }}</td>
		                        				<td>{{ $address->address->state }}</td>
		                  					</tr>
	                  					@endforeach
	                      			</tbody>
	               				</table>
              				</div>
              			</td>
  					</tr>
  				@endforeach
  			</tbody>
  		</table>

  		<!-- Modal -->
		<div class="modal fade" id="add-address" tabindex="-1" role="dialog" aria-labelledby="add-address" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <form id="add-address-form">
				<div class="modal-header">
					<h5 class="modal-title"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					{{ csrf_field() }}
					<input type="hidden" name="employee" id="employee-id" value="" />
					<div class="form-group">
					    <label for="alias">Alias</label>
					    <input type="text" class="form-control" id="alias" name="alias" required>
		  			</div>
		  			<div class="form-group">
					    <label for="street">Calle y Número</label>
					    <input type="text" class="form-control" id="street" name="street" required>
		  			</div>
		  			<div class="form-group">
					    <label for="interior">Número Interiro</label>
					    <input type="text" class="form-control" id="interior" name="interior">
		  			</div>
		  			<div class="form-group">
					    <label for="neighborhood">Colonia</label>
					    <input type="text" class="form-control" id="neighborhood" name="neighborhood">
		  			</div>
		  			<div class="form-group">
					    <label for="municipality">Municipio</label>
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
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
		      </form>
		    </div>
		  </div>
		</div>
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('js/view.employee.js') }}"></script>
@endsection