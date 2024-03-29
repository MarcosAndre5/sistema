@extends('layouts.admin')

@section('title', 'Saídas > Registro de Saídas > CADASTRAR NOVA SAÍDA DE PRODUTOS')

@section('conteudo')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nova Saída de Produtos</h3>
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

	{!! Form::open(array('url'=>'saida/venda', 'method'=>'POST', 'autocomplete'=>'off')) !!}
		{{ Form::token() }}
		<div class="row">
			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="nome">CLiente</label>
					<select name="id_cliente" id="id_cliente" class="form-control selectpicker" data-live-search="true" required>
						<option value="">Selecione...</option>
						@foreach ($clientes as $cliente)
							<option value="{{ $cliente->id_cliente }}">
								{{ $cliente->nome_cliente }}
							</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label>Tipo Comprovante</label>
					<select name="tipo_comprovante" id="tipo_comprovante" class="form-control" required>
						<option value="">Selecione...</option>
						<option value="Dinheiro">Dinheiro</option>
						<option value="Boleto">Boleto</option>
						<option value="Cartão">Cartão</option>
					</select>
				</div>
			</div>
			
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="num_doc">Série Comprovante</label>
					<input type="number" name="serie_comprovante" required value="{{ old('serie_comprovante') }}" class="form-control" placeholder="Série do comprovante...">
				</div>
			</div>
				
			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="num_doc">Número Comprovante</label>
					<input type="number" name="numero_comprovante" required value="{{ old('numero_comprovante') }}" class="form-control" placeholder="Número do comprovante...">
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="panel panel-primary">
				<div class="panel-body">
					<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
						<div class="form-group">
							<label for="nome">Produto</label>
							<select name="id_produto" id="id_produto" class="form-control selectpicker" data-live-search="true">
								<option value="">Selecione...</option>
								@foreach ($produtos as $produto)
									<option value="{{ $produto->id_produto }}.{{ $produto->estoque_produto }}.{{ $produto->preco_medio }}">
										{{ $produto->nome_produto }} # Cod.{{ $produto->codigo_produto }}
									</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
						<div class="form-group">
							<label for="estoque">Quantidade em Estoque</label>
							<input type="number" name="estoque" min="0" value="{{ old('estoque') }}" id="estoque" class="form-control" placeholder="Quantidade em Estoque..." disabled>
						</div>
					</div>

					<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
						<div class="form-group">
							<label for="preco_venda">Preço do Produto na Venda</label>
							<input type="number" name="preco_venda" min="0" value="{{ old('preco_venda') }}" id="preco_venda" class="form-control" placeholder="Preço de Venda..." disabled>
						</div>
					</div>

					<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
						<div class="form-group">
							<label for="quantidade">Quantidade</label>
							<input type="number" name="quantidade" min="1" value="{{ old('quantidade') }}" id="quantidade" class="form-control" placeholder="Quantidade de Produtos...">
						</div>
					</div>

					<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
						<div class="form-group">
							<label for="desconto">Desconto</label>
							<input type="number" name="desconto" min="0" value="{{ old('desconto') }}" id="desconto" class="form-control" placeholder="Desconto no Produto...">
						</div>
					</div>

					<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
						<div class="form-group">
							<button type="button" id="botaoAdicionar" class="btn btn-primary">
								<i class="fa fa-plus" aria-hidden="true"></i>	
								Adicionar na Tabela
							</button>
						</div>
					</div>

					<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
						<table id="detalhes" class="table table-striped table-bordered table-condensed table-hover">
							<thead style="background-color:#A9D0F5">
								<th>Deletar Linha</th>
								<th>Produto</th>
								<th>Quantidade</th>
								<th>Preço do Produto na Venda</th>
								<th>Desconto</th>
								<th>Total</th>
							</thead>
							<tfoot>
								<th>Total</th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th id="total">0,00 R$
									<input type="hidden" name="total_saida" id="total_saida">
								</th>
							</tfoot>
						</table>
					</div>
				</div>
			</div>

			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
				<div class="form-group">
					<input name="_token" value="{{ csrf_token() }}" type="hidden">
					<button class="btn btn-primary" id="botaoSalvar" type="submit">
						<i class="fa fa-floppy-o" aria-hidden="true"></i>
						Salvar
					</button>
					<a class="btn btn-danger" href="{{ url('saida/venda') }}" role="button">
						<i class="fa fa-ban" aria-hidden="true"></i>
						Cancelar
					</a>
				</div>
			</div>
		</div>
	{!! Form::close() !!}
	@push('scripts')
		<script>
			$(document).ready(function(){
				$('#botaoAdicionar').click(function(){
					adicionarLinhaTabela()
				})
			})

			$("#botaoSalvar").hide()

			$("#id_produto").change(mostrarValores)

			function mostrarValores(){
				dadosProduto = document.getElementById('id_produto').value.split('.')

				$("#estoque").val(dadosProduto[1])
				$("#preco_venda").val(dadosProduto[2])
			}

			var contador = valorTotalSaida = 0
			subTotal = []
			produtosNaLista = []
			
			function adicionarLinhaTabela(){
				idproduto = parseInt($("#id_produto").val())
				produto = $("#id_produto option:selected").text()
				quantidade = parseInt($("#quantidade").val())
				estoque = parseInt($("#estoque").val())
				preco_venda = parseFloat($("#preco_venda").val())
				desconto = parseFloat($("#desconto").val())
				
				if(!idproduto)
					alert('Erro! Produto não selecionado.')
				else if(!quantidade || quantidade <= 0)
					alert('Erro! Quantidade de Produtos não especificada.')
				else if(quantidade > estoque)
					alert('Erro! Quantidade vendida não pode ser maior que a Quantidade em Estoque.')
				else if(produtosNaLista.includes(idproduto))
					alert('Erro! O Produto já esta na lista.')
				else {
					desconto = desconto ? desconto : 0
					subTotal[contador] = quantidade * preco_venda - desconto
					valorTotalSaida += subTotal[contador]
					produtosNaLista[contador] = idproduto
					
					var linhaTabela = 
						'<tr class="selected" id="linhaTabela' + contador + '">' +
							'<td>' +
								'<button type="button" class="btn btn-danger" onclick="apagar(' + contador + ')">' +
									'X' +
								'</button>' +
							'</td>' +
							'<td>' +
								'<input type="hidden" name="idproduto[]" value="' + idproduto + '">' +
								produto +
							'</td>' +
							'<td>' +
								'<input type="hidden" name="quantidade[]" value="' + quantidade + '">' +
								quantidade +
							'</td>' +
							'<td>' +
								'<input type="hidden" name="preco_venda[]" value="' + preco_venda + '">' +
								preco_venda + ' R$' +
							'</td>' +
							'<td>' +
								'<input type="hidden" name="desconto[]" value="' + desconto + '">' +
								desconto + ' R$' +
							'</td>' +
							'<td>' +
								subTotal[contador] + ' R$' +
							'</td>' +
						'</tr>'
					
					contador++
					
					limparCampos()
					
					$("#total").html(valorTotalSaida.toFixed(2) + ' R$')
					$("#total_saida").val(valorTotalSaida)
					
					ocultarBotaoSalvar()
					
					$('#detalhes').append(linhaTabela)
				}
			}

			function limparCampos(){
				$("#quantidade").val('')
				$("#desconto").val('')
			}

			function ocultarBotaoSalvar(){
				valorTotalSaida > 0 ? $("#botaoSalvar").show() : $("#botaoSalvar").hide()
			}

			function apagar(index){
				valorTotalSaida -= subTotal[index]
				
				$("#total").html("R$: " + valorTotalSaida)
				$("#total_saida").val(valorTotalSaida)
				$("#linhaTabela" + index).remove()
				
				ocultarBotaoSalvar()
			}
		</script>
	@endpush
@stop
