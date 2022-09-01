$(document).ready(function(){
//boutton envoyer
$(document).on('click', '#submit_btn', function(){
	 var name = $('#name').val();
	 var comment =$('#comment ').val();

	 $.ajax({
	 	url: 'server.php',
	 	type: 'POST',
	 	data:  {
	 		'save':1,
	 		'name':name,
	 		'comment': comment
	 	},
	 	success: function(response) {
	 		$('#name').val('');
	 		$('#comment  ').val('');



	 		$('#display_area').append(response);
	 	}
	 });

});


});
$(document).ready(function(){
//clique sur delete
$(document).on('click', '.delete', function(){
	 var id = $(this).data('id');
	 var $clique = $(this);
 
	 $.ajax({
	 	url: 'server.php',
	 	type: 'GET',
	 	data:  {
	 		'delete':1,
	 		'id': id
	 		
	 	},
	 	success: function(response) {
	 		//effacer
	 		$clique.parent().remove();

	 		
	 	} 
	 });

});
//button edit
var edit_id;   
var $edit_message;
$(document).on('click','.edit', function(){
edit_id = $(this).data('id');
$edit_message= $(this).parent();

var name=$(this).siblings('.display_name').text();
var comment=$(this).siblings('.comment_text').text();

$('#name').val(name);
$('#comment').val(comment);
$('#submit_btn').hide();
$('#update_btn').show();

});


///bouton modifier
$(document).on('click','#update_btn',function(){

var name = $('#name').val();
	 var comment =$('#comment ').val();

	 $.ajax({
	 	url: 'server.php',
	 	type: 'POST',
	 	data:  {
	 		'update':1,
	 		'id': edit_id,
	 		'name':name,
	 		'comment': comment
	 	},
	 	success: function(response) {
	 		$('#name').val('');
	 		$('#comment ').val('');

			$('#submit_btn').show();
			$('#update_btn').hide ();

	 		$edit_message.replaceWith(response);
	 	}
	 });


});
});



