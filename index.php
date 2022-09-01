 <?php include('server.php');?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Facebook</title>

	<link rel="stylesheet"  href="style.css">
</head>
<body>
	
	<div class="wrapper">
		<h3>Chat Facebook</h3>
		<img src="d.jpg" width="450px" height="150px">
		<?php echo $mp ;?>

		<form class="comment_form">
			<div>
				<label for="name" >Nom:</label>
				<input type="text" name="name" id="name" placeholder="Nom">	
			</div>
			<div>
				<label for="message" >Message:</label>
				<textarea name="comment" id="comment" cols="30" rows="5"></textarea>
				<img src="em.jpg" width="450px" height="150px" class="like"> 
			</div>
			<button type="button" id="submit_btn">Envoyer</button>
			<button type="button" id="update_btn" style="display: none;">Modifier</button>

	</div>

</body>

</html>
<!--Ajout du Jquery-->
<script src="jquery.mini.js"></script>
<script src="sript.js"></script>
<style >
label{
	color:blue;
}
.like{
	width: 190px;
}
h3{
	color: blue;
	float:center;
	 
}
</style>