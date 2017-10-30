@extends('admin.layout')
@section('content')

<div class="container-fluid">
		<div class="col-lg-12">
			<div class="col-lg-6">
				<h3>Editar cuota Igss</h3>	
			</div>

			<div class="col-lg-6">
			<br>
				<a href="{{route('cuotas.index')}}" class="btn btn-info pull-right"> <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Regresar</a>
			</div>		
		</div>

			{{-- Form para crear nuevoa cuota Igss --}}	
		<div class="col-lg-12">
			<hr>
		</div>

	<div class="col-lg-12">
		<div class="center-block" style="width:50%;">
				
			<form data-parsley-validate class="form-horizontal" action="{{ route ('cuotas.update',$igss_edit->id_igss) }}" method="POST" autocomplete="off">
			<input name="_method" type="hidden" value="PATCH">
    		{{csrf_field()}}
				
				<div class="form-group">
					<small>* Campos obligatorios.</small>
				</div>
					
				{{-- Rango de años 2016 al 2018 y aumenta en 1--}}
				<div class="form-group {{ $errors-> has('periodo') ? 'has-error' : '' }}">
					<label for="año">Año *:</label>
					<select name="periodo" id="periodo" class="form-control" required="required">
						<option value="">--año--</option>
						@php
							for ($anio=(date('Y')+1); 2016 <= $anio; $anio--) {
								if ($anio == $igss_edit->year) {
	                                echo "<option selected=\"selected\" value=$anio>".$anio."</option>";
	                            }else{
	                                echo "<option value=$anio>".$anio."</option>";
	                            }							
							}
						@endphp
					</select>
					<span class="text-danger">{{ $errors->first('periodo') }}</span>
				</div>

				{{--Cuota--}}
				<div class="form-group {{ $errors->has('cuota') ? 'has-error' : '' }}">
					<label for="cuota">Cuota Igss:</label>
					<input type="number" step="0.01" min="1.00" id="cuota" class="form-control" name="cuota" placeholder="4.83" value="{{ $igss_edit->quota }}" required="required">
					<span class="text-danger">{{ $errors->first('cuota') }}</span>
				</div>
				
				<div class="form-group">
					<span>
	                	<button type="submit" class="btn btn-primary btn-sm pull-right" value="validate">
	                  		<span class="glyphicon glyphicon-save" aria-hidden="true"></span> Guardar
	                	</button>
	              	</span>
				</div>				
			</form>
				
		</div>
	</div> <!-- col-lg-12 -->
</div>

@stop
