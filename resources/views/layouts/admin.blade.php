<!DOCTYPE html>
<html>
	<head>
		<title>AÇAÍ DO RIO</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="shortcut icon" href="{{asset('img/logo.png')}}">
		<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
		<link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
		<link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
		<link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
	</head>
	<body class="hold-transition skin-purple sidebar-mini">
		<div class="wrapper">
			<header class="main-header">
				<a href="{{ url('/') }}" class="logo">
					<span class="logo-mini">
						<b>ADR</b>
					</span>
					<span class="logo-lg">
						<b>AÇAÍ DO RIO</b>
					</span>
				</a>
				<nav class="navbar navbar-static-top" role="navigation">
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
						<span class="sr-only">
							Navegação
						</span>
					</a>
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<li class="dropdown user user-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<img src="{{ asset('img/logo.png') }}" alt="Logo FUNPEC" class="user-image">
									<span class="hidden-xs">{{ Auth::user()->name }}</span>
									<small class="bg-green">
										@if(Auth::user()->id_cargo == 1)
											Administrado do Sistema
										@elseif(Auth::user()->id_cargo == 2)
											Gerente
										@else
											Vendedor Interno/Externo
										@endif
									</small>
									&nbsp;<i class="fa fa-sort-desc" aria-hidden="true"></i>
								</a>
								<ul class="dropdown-menu">
									<li class="user-header">
										<img src="{{ asset('img/logo.png') }}" class="img-circle" alt="Logo FUNPEC">
										<p>
											{{ Auth::user()->name }}
											<small>
												<b>Email:</b> {{ Auth::user()->email }}.<br>
											</small>
										</p>
									</li>
									<li class="user-footer">
										<div class="pull-right">
											<a href="{{ url('logout') }}" class="btn btn-danger btn-flat"
												onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
												Sair <i class="fa fa-sign-out" aria-hidden="true"></i>
											</a>
											<!--a href="{{ route('logout') }}"
                                            	onclick="event.preventDefault();
													document.getElementById('logout-form').submit();">
												Logout
											</a-->
											<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
												{{ csrf_field() }}
											</form>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
			</header>
			<aside class="main-sidebar">
				<section class="sidebar">
					<ul class="sidebar-menu">
						<li class="header"></li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-user"></i>
								<span>
									USUÁRIOS
								</span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="{{ url('colaborador') }}">
										<i class="fa fa-users" aria-hidden="true"></i>
										Colaboradores
									</a>
								</li>
								<li>
									<a href="{{ url('cargo') }}">
										<i class="fa fa-sitemap" aria-hidden="true"></i>
										Cargos
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-th"></i>
								<span>Produtos</span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="{{ url('estoque/categoria') }}">
										<i class="fa fa-circle-o"></i>
										Categorias
									</a>
								</li>
								<li>
									<a href="{{ url('estoque/produto') }}">
										<i class="fa fa-circle-o"></i>
										Estoque
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-shopping-cart"></i>
								<span>
									Saídas
								</span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="{{ url('saida/cliente') }}">
										<i class="fa fa-circle-o"></i>
										Clientes
									</a>
								</li>
								<li>
									<a href="{{ url('saida/venda') }}">
										<i class="fa fa-circle-o"></i>
										Registro de Saídas
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-truck"></i>
								<span>
									Entradas
								</span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="{{ url('entrada/fornecedor') }}">
										<i class="fa fa-circle-o"></i>
										Fornecedores
									</a>
								</li>
								<li>
									<a href="{{ url('entrada/compra') }}">
										<i class="fa fa-circle-o"></i>
										Registro de Entradas
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="/">
								<i class="fa fa-file-pdf-o"></i>
								<span>
									Ajuda
								</span>
								<small class="label pull-right bg-red">
									PDF
								</small>
							</a>
						</li>
						<li>
							<a href="/">
								<i class="fa fa-info-circle"></i>
								<span>
									Sobre...
								</span>
								<small class="label pull-right bg-yellow">
									SISTEMA
								</small>
							</a>
						</li>
					</ul>
				</section>
			</aside>
			<div class="content-wrapper">
				<section class="content">
					<div class="row">
						<div class="col-md-12">
							<div class="box">
								<div class="box-header with-border">
									<h3 class="box-title">
										<!-- Sistema Gerenciador de Vendas > --> 
										@yield('title')
									</h3>
									<div class="box-tools pull-right">
										<button class="btn btn-box-tool" data-widget="collapse">
											<i class="fa fa-minus"></i>
										</button>
										<button class="btn btn-box-tool" data-widget="remove">
											<i class="fa fa-times"></i>
										</button>
									</div>
								</div>
								<div class="box-body">
									<div class="row">
										<div class="col-md-12">
											@yield('conteudo')
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Versão</b> 0.0.1
			</div>
			<strong>
				Copyright &copy; 2024 - {{ date('Y') }} |
				<a href="https://www.instagram.com/acaidorio_distribuidora?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank">Açaí do Rio</a>.
			</strong>
			Todos os direitos reservados. |
			<a href="https://github.com/MarcosAndre5" target="_blank">Marcos André Azevedo de Assis</a>. 🇧🇷
		</footer>
		<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
		@stack('scripts')
		<script src="{{asset('js/bootstrap.min.js')}}"></script>
		<script src="{{asset('js/app.min.js')}}"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
	</body>
</html>
