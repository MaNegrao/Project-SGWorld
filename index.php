<?php
	include "includes/header.php";
?>
		<main>
			<section class="fotos">
				<h2>Welcome to Soft & Gaming World!</h2>
				<div class="fotoPol">
					<div class="polaroid" id="img1">
						<img class="picture" src="img/imghome1.jpeg" alt="Vista aerea do parque" style="width:100%">
						<div class="container">
					  		<p>Aerial view of the park</p>
					  	</div>
					</div>
					<div class="polaroid" id="img2">
						<img class="picture" src="img/sysp.jpg" alt="Portaria do parque" style="width:100%">
						<div class="container">
							<p>Access of the park</p>
						</div>
					</div>
					<div class="polaroid" id="img3">
						<img class="picture" src="img/imghome3.jpg" alt="X-wing" style="width:100%">
						<div class="container">
					    	<p>Thematic spaceship of Star Wars</p>
						</div>
					</div>
				</div>
				<div class="polaroid" id="vid">
					<iframe class='vid' src="https://www.youtube.com/embed/JDZMoZkZCXw"></iframe>
					<div class="container">
					    <p>Project in video of the park</p>
					</div>
				</div>
			</section>
			<section class="tickets">
				<h2>Tickets</h2>
				<div class="tab">
					<button class="tablinks" onclick="openTab(event, 'std')" id="defaultOpen">Standard</button>
					<button class="tablinks" onclick="openTab(event, 'std-prm')">Standard Premium</button>
					<button class="tablinks" onclick="openTab(event, 'gld')">Gold</button>
					<button class="tablinks" onclick="openTab(event, 'gld-prm')">Gold Premium</button>
				</div>
					<div id="std" class="tabcontent">
						<p>The Standard ticket is the most economical ticket, perfect for people who want adventure but do not want to pay too much for it. This ticket is for sale for only 30$.</p>
					</div>
					<div id="std-prm" class="tabcontent">
						<p>The Standard Premium ticket is the best ticket for people who do not want to miss anything in the park. This ticket is for sale for only 50$.</p> 
					</div>
					<div id="gld" class="tabcontent">
						<p>The Gold ticket is more exquisite, with the right to several events and much times in adventures. This ticket is for sale for only 80$.</p>
					</div>
					<div id="gld-prm" class="tabcontent">
						<p>Gold Premium is the best ticket, is for the best peoples and guarantees everthing for de best of the park. This ticket is for sale for only 100$.</p>
					</div>
			</section>
			<section class="news-line">
				<h2>News</h2>
				<div class="news">
					<div class="cols">
						<p>A new attraction is coming, a battle simulator where the visitor pilots a TIE Fighter! Feel yourself a fighter of the empire against rebellion!</p>
					</div>
					<div class="cols">
						<p>In September all tickets will be at 25% off, come and have fun with the best of the geek's world and the best of the gaming world. Children under 13 pay half price!</p>
					</div>
					<div class="cols">
						<p>Greetings, this month the main arena will host the final of The Dota 2 International Championship! Prepare your heart for the championship with the largest award of all time!</p>
					</div>
					<div class="cols">
						<p>A public success, the Nordic land of Asgard now have more fun for you and your family, the Father of All's palace, Odin, will be open for limited time visitation!</p>
					</div>
				</div>
			</section>
			<section class="map">
                <h2>Soft & Gaming World - Belgium</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5012.215789323875!2d4.380078076814362!3d51.08801628122151!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3ee2f461774e9%3A0xf12af43f2c284d2f!2sTomorrowland!5e0!3m2!1spt-BR!2sbr!4v1537147138406" allowfullscreen></iframe>
			</section>
		</main>
<?php
	include "includes/footer.php";
?>