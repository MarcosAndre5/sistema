{!! Form::open(array('url'=>'estoque/categoria', 'method'=>'GET', 'autocomplete'=>'off', 'role'=>'search')) !!}
	<div class="form-group">
		<div class="input-group">
			<input type="text" class="form-control" name="buscaTexto" placeholder="Buscar Categoria por Nome..." value="{{ $buscaTexto }}">
			<span class="input-group-btn">
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-search" aria-hidden="true"></i>
					Buscar Categoria
				</button>
			</span>
		</div>
	</div>
{!! Form::close() !!}
