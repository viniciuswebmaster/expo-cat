<?php 
include_once('includes/classe_db.php');

try {
		$PDO = new PDO( 'mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD ,
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES latin1"));
	} catch ( PDOException $e ){
		echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
	}

		$conn = new PDO( 'mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD );
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 


$consulta_raca = "select * from racas_gato order by descricao ASC";



?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Clube de Gatos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/add.css">
	<script type="text/javascript" src="includes/jquery.js"></script>
	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center mb-4">
				<div class="col-md-6">
					<img src="images/logotipo.jpg" alt="Logotipo" class="half-width-img img-fluid">
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-8 text-center mb-5">
					<h1 class="heading-section">Nome do clube expositor</h1>
					<h4>7ª e 8ª Exposi&ccedil;&otilde;es Internacionais de Gatos de Ra&ccedil;a</h4>
					<h5>4 e 5 de março de 2023</h5>
					<h6>Local - Rua - Bairro - Cidade</h6>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="wrapper img" style="background-image: url(images/img.jpg);">
						<div class="contact-wrap w-100 p-md-5 p-4">
							<h3 class="mb-4">Formul&aacute;rio de inscri&ccedil;&atilde;o</h3>
							<div id="form-message-warning" class="mb-4"></div>
							<div id="form-message-success" class="mb-4">Cadastro realizado com sucesso!</div>
							<form method="POST" id="cadastro_expo" name="cadastro_expo" class="contactForm" action="cadastrar_expo.php">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class="label" for="nome_gato">Nome do gato</label>
											<input type="text" class="form-control" name="nome_gato" id="nome_gato" placeholder="" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="label" for="fife">Pedigree FIFe</label>
											<input type="number" class="form-control" name="fife" id="fife" placeholder="Somente n&uacute;meros" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="label" for="sexo">Sexo</label>
											<select class="form-control" name="sexo" id="sexo" required>
												<option value="" disabled selected></option>
												<option value="m">Macho</option>
												<option value="f">F&ecirc;mea</option>
												<option value="mn">Macho neutro</option>
												<option value="fn">F&ecirc;mea neutra</option>
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="label" for="raca">Ra&ccedil;a</label>
											<select class="form-control" name="raca" id="raca" required>
												<option value="" disabled selected>Selecione a ra&ccedil;a</option>
												<?php
													foreach ($PDO->query($consulta_raca) as $row) {
														$id = $row['id'];	
														$raca_descricao = $row['descricao'];
											
														if($raca == $id){
															echo "<option value=".$id." selected='selected'>".$raca_descricao."</option>";
														} else {
															echo "<option value=".$id.">".$raca_descricao."</option>";
														}
													
													}
												?>
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="label" for="cor">Cor</label>
											<select class="form-control" name="cor" id="cor">
												<option value="x">Selecione a cor</option>
												<!-- Opções de cor serão preenchidas pelo AJAX -->
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="label" for="chip">Chip</label>
											<input type="text" class="form-control" name="chip" id="chip" placeholder="" maxlength="15" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="label" for="data_nascimento">Data nascimento</label>
											<input type="date" class="form-control" name="data_nascimento" id="data_nascimento" placeholder="" required>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="label" for="nome_pai">Nome do pai</label>
											<input type="text" class="form-control" name="nome_pai" id="nome_pai" placeholder="" required>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
													<label class="label" for="raca_pai">Cor EMS pai</label>
													<select class="form-control col-md-12" name="raca_pai" id="raca_pai" >
														<option value='x'>Selecione a ra&ccedil;a</option>
													<?php
														foreach ($PDO->query($consulta_raca) as $row) {
															$id = $row['id'];	
															$raca_descricao = $row['descricao'];
												
															if($raca == $id){
																echo "<option value=".$id." selected='selected'>".$raca_descricao."</option>";
															} else {
																echo "<option value=".$id.">".$raca_descricao."</option>";
															}
														
														}
													?>
													</select>
													
													<br />
													<div class="form-group">
														<label class="label" for="cor_pai">Cor do pai</label>
														<select class="form-control" name="cor_pai" id="cor_pai">
															<option value="x">Selecione a cor</option>
															<!-- Opções de cor serão preenchidas pelo AJAX -->
														</select>
													</div>
												</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="label" for="nome_mae">Nome da m&atilde;e</label>
											<input type="text" class="form-control" name="nome_mae" id="nome_mae" placeholder="" required>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="label" for="raca_mae">Cor EMS m&atilde;e</label>
													<select class="form-control col-md-12" name="raca_mae" id="raca_mae" >
														<option value='x'>Selecione a ra&ccedil;a</option>
													<?php
														foreach ($PDO->query($consulta_raca) as $row) {
															$id = $row['id'];	
															$raca_descricao = $row['descricao'];
												
															if($raca == $id){
																echo "<option value=".$id." selected='selected'>".$raca_descricao."</option>";
															} else {
																echo "<option value=".$id.">".$raca_descricao."</option>";
															}
														
														}
													?>
													</select>
													
													<br />
													<div class="form-group">
														<label class="label" for="cor_mae">Cor da m&atilde;e</label>
														<select class="form-control" name="cor_mae" id="cor_mae">
															<option value="x">Selecione a cor</option>
															<!-- Opções de cor serão preenchidas pelo AJAX -->
														</select>
													</div>
												</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="label" for="criador">Criador</label>
											<input type="text" class="form-control" name="criador" id="criador" placeholder="" required>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="label" for="proprietario">Propriet&aacute;rio</label>
											<input type="text" class="form-control" name="proprietario" id="proprietario" placeholder="" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="label" for="classe">Classe</label>
											<select class="form-control" name="classe" id="classe" required>
												<option value="" disabled selected></option>
												<option value="12">12 - Kitten</option>
												<option value="11">11 - JR</option>
												<option value="10">10 - CAP</option>
												<option value="9">9 - CAC</option>
												<option value="8">8 - CAPIB</option>
												<option value="7">7 - CACIB</option>
												<option value="6">6 - CAGPIB</option>
												<option value="5">5 - CAGCIB</option>
												<option value="4">4 - CAPS</option>
												<option value="3">3 - CACS</option>
												<option value="2">2 - HP</option>
												<option value="1">1 - HP</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="label" for="muda_classe">Pode mudar de classe no domingo?</label>
											<select class="form-control" name="muda_classe" id="muda_classe" required>
												<option value="" disabled selected></option>
												<option value="s">Sim</option>
												<option value="n">N&atilde;o</option>
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="label" for="email">E-mail</label>
											<input type="email" class="form-control" name="email" id="email" placeholder="" autocomplete="on" required>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="label" for="telefone">Telefone</label>
											<input type="tel" class="form-control" name="telefone" id="telefone" maxlength="15" onkeyup="handlePhone(event)" required>
										</div>
									</div>
									<div class="col-md-12 d-flex justify-content-end">
									<div class="form-group mr-2">
											<input type="reset" value="Limpar" class="btn btn-primary">
										</div>
										<div class="form-group">
											<input type="button" value="Cadastrar" class="btn btn-primary" onClick="valida_form()">
										</div>
									</div>
								</div>
							</form>
							<span style="text-align: center;">Valor da Inscri&ccedil;&atilde;o: R$ 100,00 <br> Ser&atilde;o mantidas as cobran&ccedil;as dos gatos que estiverem ausentes na exposi&ccedil;&atilde;o.</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>

<script type="text/javascript">

$(document).ready(function() {
    function carregarCores(raca, tipo) {
        $.ajax({
            url: 'cor.php', // Substitua pelo caminho correto do seu script PHP
            method: 'GET',
            data: { raca: raca, tipo: tipo },
            dataType: 'json',
            success: function(data) {
                var selectId = '#cor';
                if (tipo === 'cor_mae') {
                    selectId = '#cor_mae';
                } else if (tipo === 'cor_pai') {
                    selectId = '#cor_pai';
                }

                // Primeiro, limpamos o conteúdo existente
                $(selectId).empty();

                // Em seguida, adicionamos uma opção padrão
                $(selectId).append('<option value="x">Selecione a cor</option>');

                // Adicionamos as novas opções
                $.each(data, function(key, value) {
                    $(selectId).append('<option value="' + value.id + '">' + value.descricao + '</option>');
                });
            },
            error: function() {
                console.error('Erro ao carregar as cores.');
            }
        });
    }

    // Chama a função para carregar as cores quando a raça é selecionada
    $('#raca').change(function() {
        var raca = $(this).val();
        carregarCores(raca, 'cor');
    });

    $('#raca_mae').change(function() {
        var raca = $(this).val();
        carregarCores(raca, 'cor_mae');
    });

    $('#raca_pai').change(function() {
        var raca = $(this).val();
        carregarCores(raca, 'cor_pai');
    });
});


/*

$(document).ready(function() {
    function carregarCores(raca) {
        $.ajax({
            url: 'cor.php', // Substitua pelo caminho correto do seu script PHP
            method: 'GET',
            data: { raca: raca },
            dataType: 'json',
            success: function(data) {
                // Primeiro, limpamos o conteúdo existente
                $('#cor').empty();

                // Em seguida, adicionamos uma opção padrão
                $('#cor').append('<option value="x">Selecione a cor</option>');

                // Adicionamos as novas opções
                $.each(data, function(key, value) {
                    $('#cor').append('<option value="' + value.id + '">' + value.descricao + '</option>');
                });
            },
            error: function() {
                console.error('Erro ao carregar as cores.');
            }
        });
    }

    // Chama a função para carregar as cores quando a raça é selecionada
    $('#raca').change(function() {
        var raca = $(this).val();
        carregarCores(raca);
    });
});



document.addEventListener("DOMContentLoaded", function() {
	document.getElementById('raca').addEventListener('change', function() {
		
		var url = document.getElementById('raca').value;
		document.getElementById('cor').value = "x";
		
		ajax = new XMLHttpRequest();
		//ajax.open('GET', 'cidade/'+url+'.php', true);
		ajax.open('GET', 'cor.php?raca='+url, true);
		
		ajax.send();
		
		ajax.onreadystatechange = function() {
			if(ajax.readyState == 4 && ajax.status == 200) {
				// console.log(ajax.responseText);
				document.getElementById('cor').innerHTML = ajax.responseText;
			}
		}
		
	});
});
*/
document.addEventListener("DOMContentLoaded", function() {
	document.getElementById('cor').addEventListener('change', function() {
		
		var url = document.getElementById('cor').value;
		
		ajax = new XMLHttpRequest();
		//ajax.open('GET', 'cidade/'+url+'.php', true);
		ajax.open('GET', 'ems.php?cor='+url, true);
		ajax.send();
		//alert('ems.php?cor='+url);
		ajax.onreadystatechange = function() {
			if(ajax.readyState == 4 && ajax.status == 200) {
				// console.log(ajax.responseText);
				document.getElementById('ems').innerHTML = ajax.responseText;
			}
		}
		
	});
});

document.addEventListener("DOMContentLoaded", function() {
	document.getElementById('raca_pai').addEventListener('change', function() {
		
		var url = document.getElementById('raca_pai').value;
		document.getElementById('cor_pai').value = "x";
		
		ajax = new XMLHttpRequest();
		//ajax.open('GET', 'cidade/'+url+'.php', true);
		ajax.open('GET', 'cor.php?raca_pai='+url, true);
		ajax.send();
		
		ajax.onreadystatechange = function() {
			if(ajax.readyState == 4 && ajax.status == 200) {
				// console.log(ajax.responseText);
				document.getElementById('cor_pai').innerHTML = ajax.responseText;
			}
		}
		
	});
});

	document.getElementById('cor_pai').addEventListener('change', function() {
		
		var url = document.getElementById('cor_pai').value;
		
		ajax = new XMLHttpRequest();
		//ajax.open('GET', 'cidade/'+url+'.php', true);
		ajax.open('GET', 'ems.php?cor_pai='+url, true);
		ajax.send();
		//alert('ems.php?cor='+url);
		ajax.onreadystatechange = function() {
			if(ajax.readyState == 4 && ajax.status == 200) {
				// console.log(ajax.responseText);
				document.getElementById('ems_pai').innerHTML = ajax.responseText;
			}
		}
		
	});
/*
	document.getElementById('raca_mae').addEventListener('change', function() {
		
		var url = document.getElementById('raca_mae').value;
		document.getElementById('cor_mae').value = "x";
		
		ajax = new XMLHttpRequest();
		//ajax.open('GET', 'cidade/'+url+'.php', true);
		ajax.open('GET', 'cor.php?raca_mae='+url, true);
		ajax.send();
		
		ajax.onreadystatechange = function() {
			if(ajax.readyState == 4 && ajax.status == 200) {
				// console.log(ajax.responseText);
				document.getElementById('cor_mae').innerHTML = ajax.responseText;
			}
		}
		
	});

	document.getElementById('cor_mae').addEventListener('change', function() {
		
		var url = document.getElementById('cor_mae').value;
		
		ajax = new XMLHttpRequest();
		//ajax.open('GET', 'cidade/'+url+'.php', true);
		ajax.open('GET', 'ems.php?cor_mae='+url, true);
		ajax.send();
		//alert('ems.php?cor='+url);
		ajax.onreadystatechange = function() {
			if(ajax.readyState == 4 && ajax.status == 200) {
				// console.log(ajax.responseText);
				document.getElementById('ems_pai').innerHTML = ajax.responseText;
			}
		}
		
	});
*/

	const handlePhone = (event) => {
	  let input = event.target
	  input.value = phoneMask(input.value)
	}

	const phoneMask = (value) => {
	  if (!value) return ""
	  value = value.replace(/\D/g,'')
	  value = value.replace(/(\d{2})(\d)/,"($1) $2")
	  value = value.replace(/(\d)(\d{4})$/,"$1-$2")
	  return value
	}

	function valida_form(){
		if(document.getElementById('nome_gato').value == ""){
			alert('Por favor, insira o nome do gato.');
			document.getElementById("nome_gato").focus();
			return false;
		}
		
		if(document.getElementById('fife').value == ""){
			alert('Por favor, insira o FIFe.');
			document.getElementById("fife").focus();
			return false;
		}
		
		if(document.getElementById('sexo').value == ""){
			alert('Por favor, escolha o sexo.');
			document.getElementById("sexo").focus();
			return false;
		}
		
		if(document.getElementById('raca').value == ""){
			alert('Por favor, escolha a raça.');
			document.getElementById("raca").focus();
			return false;
		}
		
		if(document.getElementById('cor').value == ""){
			alert('Por favor, escolha a cor.');
			document.getElementById("cor").focus();
			return false;
		}
		
		if(document.getElementById('chip').value == ""){
			alert('Por favor, insira o número do chip.');
			document.getElementById("chip").focus();
			return false;
		}
		
		if(document.getElementById('data_nascimento').value == ""){
			alert('Por favor, insira a data de nascimento.');
			document.getElementById("data_nascimento").focus();
			return false;
		}
		
		if(document.getElementById('criador').value == "" && document.getElementById('proprietario').value == ""){
			alert('Por favor, insira o criador ou proprietário.');
			document.getElementById("criador").focus();
			return false;
		}
		
		if(document.getElementById('classe').value == ""){
			alert('Por favor, insira a classe.');
			document.getElementById("classe").focus();
			return false;
		}
		
		if(document.getElementById('muda_classe').value == ""){
			alert('Por favor, defina se pode mudar de classe.');
			document.getElementById("muda_classe").focus();
			return false;
		}
		
		if(document.getElementById('email').value == ""){
			alert('Por favor, insira o email.');
			document.getElementById("email").focus();
			return false;
		}
		
		if(document.getElementById('telefone').value == ""){
			alert('Por favor, insira o telefone.');
			document.getElementById("telefone").focus();
			return false;
		}
		
		document.cadastro_expo.submit();
		
	}
	


	


</script>	