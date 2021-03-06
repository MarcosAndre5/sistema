@extends('layouts.admin')

@section('title', 'Entradas > Fornecedores > CADASTRAR NOVO FORNECEDOR')

@section('conteudo')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Novo Fornecedor</h3>
			@if(count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
		</div>
	</div>

	{!! Form::open(array('url'=>'entrada/fornecedor', 'method'=>'POST', 'autocomplete'=>'off')) !!}
		{{ Form::token() }}
		<div class="row">
			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="nome">Nome</label>
					<input type="text" name="nome" required value="{{ old('nome') }}" class="form-control" placeholder="Nome do Fornecedor...">
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="telefone">Telefone</label>
					<input type="text" name="telefone" id="telefone" class="form-control" placeholder="Telefone do Fornecedor...">
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label>Tipo Documento</label>
					<select name="tipo_documento" class="form-control">
						<option value="CPF">CPF</option>
						<option value="RG">RG</option>
						<option value="RG">CNPJ</option>
					</select>
				</div>
			</div>
			
			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="numero_documento">Número Documento</label>
					<input type="text" name="numero_documento" required value="{{ old('numero_documento') }}" class="form-control" placeholder="Número do documento do Fornecedor...">
				</div>
			</div>
			
			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" name="email" class="form-control" placeholder="Email do Fornecedor...">
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="endereco">Endereço</label>
					<input type="text" name="endereco" required value="{{ old('endereco') }}" class="form-control" placeholder="Endereço do Fornecedor...">
				</div>
			</div>
		</div>

		<div class="form-group">
			<button class="btn btn-primary" type="submit">
				<i class="fa fa-floppy-o" aria-hidden="true"></i>
				Salvar Fornecedor
			</button>
			<a class="btn btn-danger" href="{{ url('entrada/fornecedor') }}" role="button">
				<i class="fa fa-ban" aria-hidden="true"></i>
				Cancelar
			</a>
		</div>
	{!!Form::close()!!}
	<script>
		$("#telefone").mask("(99) 99999-9999");
	</script>
@stop
