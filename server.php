<?php
$conn= mysqli_connect('localhost','root','','facebook');
if (! $conn){
	die('Error:' .mysqli_error($conn));
}

if (isset($_POST['save'])){

	$name = $_POST['name'];
	$comment= $_POST['comment'];
	$sql =" INSERT INTO messages (name,comment) VALUES ('{$name}', '{$comment}')";

if (mysqli_query($conn,$sql)){
	$id= mysqli_insert_id($conn);
 $enregistrer='<div class="comment_box">
					<span class="delete" data-id="' .$id. '">delete</span>
				<span class= "edit" data-id="' . $id. '">edit</span>
				<div class="display_name">' . $name.'</div>
				<div class="comment_text">' . $comment .'</div>
			</div>';
			echo $enregistrer;
}
exit(); 
}



if (isset($_POST['update'])){

	$name = $_POST['name'];
	$id = $_POST['id'];
	$comment= $_POST['comment'];
	$sql =   " UPDATE   messages SET name= '{$name}', comment='{$comment}' WHERE id=" .$id;

if (mysqli_query($conn,$sql)){
	$id= mysqli_insert_id($conn);
 $modifier='<div class="comment_box">
 					<span class="delete" data-id="' .$id. '">Delete</span>
				<span class= "edit" data-id="' . $id. '" >Edit</span>
				<div class="display_name">' . $name.'</div>
				<div class="comment_text">' . $comment .'</div>
			</div>';
			echo $modifier;
}
exit(); 
}


if (isset($_GET['delete'])){
$id=$_GET['id'];
$sql="DELETE FROM messages WHERE id=" . $id;
mysqli_query($conn,$sql); 
exit();
}

$sql="SELECT * FROM messages"; 
$results= mysqli_query($conn,$sql);

$mp='<div  id="display_area">';
while ($row = mysqli_fetch_array($results)){

 $mp .= 	'<div class="comment_box">
					<span class="delete" data-id="' . $row['id']. '">Delete</span>
				<span class= "edit" data-id="' . $row['id']. '" >Edit</span>
				<div class="display_name">' . $row['name'] .'</div>
				<div class="comment_text">' . $row['comment'] .'</div>
			</div>';

}
	$mp .='</div>';		
			
?>