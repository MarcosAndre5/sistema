@extends('layouts.admin')

@section('conteudo')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Novo Produto</h3>
			
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
		</div>
	</div>

	{!! Form::open(array('url'=>'estoque/produto', 'method'=>'POST', 'autocomplete'=>'off', 'files'=>'true')) !!}
		{{ Form::token() }}
		<div class="row">
			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="nome">Nome</label>
					<input type="text" name="nome" required value="{{ old('nome') }}" class="form-control" placeholder="Nome...">
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label>Categoria</label>
					<select name="idcategoria" class="form-control">
						@foreach ($categorias as $categoria)
							<option value="{{ $categoria->id_categoria }}">
								{{ $categoria->nome_categoria }}
							</option>
						@endforeach
					</select>
				</div>
			</div>
			
			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="codigo">Código</label>
					<input type="text" name="codigo" required value="{{ old('codigo') }}" class="form-control" placeholder="Código do Produto...">
				</div>
			</div>
			
			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="estoque">Quantidade</label>
					<input type="text" name="estoque" required value="{{ old('estoque') }}" class="form-control" placeholder="Estoque...">
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="descricao">Descrição</label>
					<div class="form-floating">
						<textarea class="form-control" name="descricao" placeholder="Descrição..." style="height: 100px; resize: none;" maxlength="100"></textarea>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-xs-12">
					<div class="form-group">
					<label for="imagem">Imagem</label>
					<input type="file" name="imagem" class="form-control">
				</div>
			</div>
		</div>

		<div class="form-group">
			<button class="btn btn-primary" type="submit">
				<i class="fa fa-floppy-o" aria-hidden="true"></i>
				Salvar Produto
			</button>
			<a class="btn btn-danger" href="{{ url('estoque/produto') }}" role="button">
				<i class="fa fa-ban" aria-hidden="true"></i>
				Cancelar
			</a>
		</div>
	{!! Form::close() !!}
@stop
