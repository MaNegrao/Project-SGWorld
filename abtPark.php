<?php
	include "includes/header.php";
?>
<link rel="stylesheet" href="css/syspark.css">
		<section>
			<h2>Sistema do Parque</h2>
			<div class="description">
				<p>O parque comporta atrações para várias idades e níveis de aventura, indo das infantis a mais radicais. O parque é organizado a partir de um sistema de acesso às atrações diferente, onde não é necessário o visitante ficar esperando horas em uma fila. As atrações seguem um ciclo de funcionamento, onde há um tempo determinado antes da atração começar, para que as pessoas do ciclo anterior possam sair da atração e as outras entrarem, com um intervalo de tempo para que ninguém fique de fora, e também o tempo de duração da atração, e assim sucessivamente.</p>
				<p>Cada atração tem uma quantidade determinada de lugares e cada visitante tem um número de vezes que pode ir na mesma. Por exemplo, uma atração mais popular o visitante tem menos idas, porém ele pode escolher comprar um ingresso mais caro que lhe dê mais jornadas aos brinquedos, assim, o visitante só poderá escolher os horários do qual houver lugares disponíveis e a quantidade que o ingresso permitir.</p>
				<p>	Os ingressos físicos são representados por uma pulseira que contém o padrão NFC, que lhe dá acesso às atrações e ao parque, a pulseira está associado ao horário que a pessoa escolhe no cronograma para ir nas atrações, fazendo com que seja permitido a pessoa entrar na atração somente naquele horário escolhido. Na pulseira também há um número de identificação do ingresso, nome e o tipo, se pertence a uma caravana ou é ingresso normal, se for de caravana, deve conter o número da caravana e o contato do responsável pela caravana. Se o visitante estiver apenas por conta de um evento, então o ingresso é representado por uma credencial, especificando o que a pessoa é no evento (visitante, staff, realizador, etc), deve estar especificado também qual é o evento, além do nome e número do ingresso, essas informações deverão ser preenchidas no ato da compra.</p>
			</div>
		</section>
		<section>
			<h2>Mais Sobre o Sistema</h2>
			<div class="fotos-sys">
				<div class="acess-sys">
					<img id="sysp" src="img/sysp.jpg" alt="Entradas do parque" style="width: 100%">
					<p>Entrada do parque</p>
				</div>
				<div class="row"> 
					<div class="column">
						<img id="sys3" src="img/sys3.png" alt="Sistema do Parque" style="width: 100%">
						<img id="sys5" src="img/sys5.png" alt="Pulseiras Parque" style="width: 100%">
					</div>
					<div class="column">
						<img id="sys4" src="img/sys4.jpg" alt="Modelo Pulseira do Parque" style="width: 100%">
						<img id="sys1" src="img/sys1.jpg" alt="Compras com a pulseira do parque" style="width: 100%">
					</div>
				</div>
			</div>
		</section>
<?php
	include "includes/footer.php";
?>