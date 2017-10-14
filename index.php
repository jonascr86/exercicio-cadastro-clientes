<?php
	require 'app/FabricaDeClientes.php';
	
	if ($_GET) {

		$clientes[] = unserialize($_GET['cliente']);
	}
	elseif($_POST)
	{
		$clientes = [];

		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$endereco = $_POST['endereco'];
		$cpf = $_POST['cpf'];
		$telefone = $_POST['telefone'];
		
		for($i = 0; $i < count($nome); $i++)
		{
			$cliente = new Cliente(
				$nome[$i],
				$email[$i],
				$endereco[$i],
				$cpf[$i],
				$telefone[$i]
				);
				
				$clientes[] = $cliente;
		}

		krsort($clientes);
		
	}else
	{
		$fabricaDEClientes = new FabricaDeClientes();
		$clientes = $fabricaDEClientes->run();
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cadastro de clientes</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/jumbotron.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://localhost:8081/projetoOO/">Cadastro de clientes</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Bem vindo ao cadastro de clientes</h1>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
		  <form action="#" method="POST">
			<table border="1" class="table table-condensed">
			  <thead>
				<tr>
				  <th>Nome</th>
				  <th>Email</th>
				  <th>Telefone</th>
				  <th>Endereço</th>
				  <th>Cpf</th>
				</tr>
			  </thead>
			  <tbody>
				<?php $i = 0; ?>
				<?php foreach($clientes as $cliente) :?>
					<tr>
					   <td>
					   <!-- <a href='http://localhost:8081/projetoOO/?nome=<?= $cliente->getNome() ?>&email=<?= $cliente->getEmail() ?>&telefone=<?= $cliente->getTelefone() ?>&endereco=<?= $cliente->getEndereco() ?>&cpf=<?= $cliente->getCpf() ?>'>  -->
					   <a href= 'http://localhost:8081/projetoOO/?cliente=<?= serialize($cliente) ?>' >
					   <?= $cliente->getNome() ?> <input type="hidden" name="nome[<?= $i; ?>]" value="<?= $cliente->getNome() ?>"> </a> </td> 
					  <td><?= $cliente->getEmail() ?> <input type="hidden" name="email[<?= $i; ?>]" value="<?= $cliente->getEmail() ?>"> </td>
					  <td><?= $cliente->getTelefone() ?> <input type="hidden" name="telefone[<?= $i; ?>]" value="<?= $cliente->getTelefone() ?>"></td>
					  <td><?= $cliente->getEndereco() ?> <input type="hidden" name="endereco[<?= $i; ?>]" value="<?= $cliente->getEndereco() ?>"></td>
					  <td><?= $cliente->getCpf() ?> <input type="hidden" name="cpf[<?= $i; ?>]" value="<?= $cliente->getCpf() ?>"></td>
					</tr>
					<?php $i++; ?>
				<?php endforeach ?>
			  </tbody>
			</table>
				<?php if(isset( $_POST['d'] )) :?>
					<button type="submit" name="c" class="btn btn-success">Crescente</button>
					<?php else : ?>
						<button type="submit" name="d" class="btn btn-success">Decrescente</button>	
				<?php endif ?>
		  </form>
      </div>

      <hr>

      <footer>
        <p>&copy; 2016 Jonas Correia, Inc.</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
