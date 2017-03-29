<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>XAT</title>	 	  	
  	<link rel="shortcut icon" href="assets/img/favicon.ico"/>

	<link rel="stylesheet" href="assets/css/f-a.min.css">
  	<link rel="stylesheet" href="assets/css/b.min.css">
  	<link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="background-color: #EEEEEE;">

			<?php

				include 'private/messages.php';

			?>	

	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container-fluid">	    
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Xat</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="navbar-collapse">
	      
	    </div>
	  </div>
	</nav>

	<section class="container" style="margin-top: 50px;">				
		<section class="row">

			<section class="col-xs-12 col-sm-6 col-md-8">				
				<section class="row">					
					<section class="messages-box">
						<?php
							$result = $conn->query(
								"SELECT m.text, m.created_at, s.username AS sender, s.avatar AS sender_pic, r.username AS receiver, r.avatar AS receiver_pic
            					FROM Messages m, Users s, Users r 
            					WHERE m.sender = s.id AND m.receiver = r.id ORDER BY created_at ASC");

								if($result->num_rows > 0){
									while ($fila = $result->fetch_assoc()) {
										if($fila['sender'] == 'Quake') {
											echo "<section style='text-align: right;'>";
												echo "<span class='message_s'><span>".$fila['text']."</span></span>";
												echo "<img class='avatar_s' data-toggle='tooltip' data-placement='right' title='".$fila['sender']."' src='assets/img/avatar/".$fila['sender_pic']."' alt=''><br>"."<i>".$fila['created_at']."</i><br><br>";
											echo "</section>";
										} else {							
											echo "<img class='avatar' data-toggle='tooltip' data-placement='left' title='".$fila['sender']."' src='assets/img/avatar/".$fila['sender_pic']."' alt=''>";
											echo "<span class='message'><span>".$fila['text']."</span></span><br>"."<i>".$fila['created_at']."</i><br><br>";
										}
									}										
								}
							
						?>
					</section>
				</section>			
			</section>

			<section class="hidden-xs col-sm-6 col-md-4" style="position: relative;">
				<form class="navbar-form search-box" autocomplete="off">

					<div class="input-group">
				      <input type="text" id="inputSearch" onkeyup="searchUser()" class="form-control" placeholder="Search for...">
				      <span class="input-group-btn">
				        <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
				      </span>
				    </div>

				    <br><br>

				    <ul id="usersList">
				    	<?php
							$result = $conn->query("SELECT username FROM Users ORDER BY username ASC");
								if($result->num_rows > 0){
									while ($fila = $result->fetch_assoc()) {									
									echo "<li><a href='javascript:'>".$fila['username']."</a></li>";
									}										
								}
							$conn->close();
						?>				    	
				    </ul>
			        
			    </form>
			</section>

			<section class="col-xs-12 col-sm-6 col-md-8" style="background-color:white; padding: 30px; margin-bottom: 20px;">
							

				<form method="POST" action="private/messages.php">	

					<section class="row">
						<div class="form-group">
						    <label for="inputSender">Me:</label>
						    <input class="form-control" name="inputSender" id="inputSender" placeholder="Username"></input>
						</div>

						<div class="form-group">
						    <label for="inputReceiver">To:</label>
						    <input class="form-control" name="inputReceiver" id="inputReceiver" placeholder="select from the users listed" disabled></input>
						</div>					
					</section>

					<hr>

					<section class="row">
						<div class="form-group">
						    <label for="inputComentario">Mensaje</label> (campo obligatorio)
						    <textarea class="form-control" name="inputMessage" required="true" placeholder="Escribe tu comentario a continuación..." rows="3"></textarea>
						</div>						
					</section>

					<section class="row">
						<button type="submit" name="send" class="btn pull-right btn-default">Send</button>						
					</section>
				</form>				

			</section>

		</section>
	</section>

	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/b.min.js"></script>
	<script type="text/javascript" src="assets/js/main.js"></script>

</body>

</html>
