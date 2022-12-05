<?php
include_once('../model/controller.php');

//////user delete code
if(isset($_POST['userdel'])){
$id = $_POST['userdel'];
$table = 'users';
$query =deleteF($id,$table);
	if($query==TRUE){
		echo 'User Info Deleted Successfully!';
	}else{
		echo 'Cannot delete, try again';
	}
}

/////////payment method delete function
if(isset($_POST['reachdel'])){
$id = $_POST['reachdel'];
$table = 'reachouts';
$query =deleteF($id,$table);
	if($query==TRUE){
		echo 'Reachout Deleted Successfully!';
	}else{
		echo 'Cannot delete, try again';
	}
}

/////////special user delete function
if(isset($_POST['delsuser'])){
$id = $_POST['delsuser'];
$table = 'special_users';
$query =deleteF($id,$table);
	if($query==TRUE){
		echo 'Account Deleted Successfully!';
	}else{
		echo 'Cannot delete, try again';
	}
}
/////////Product commerce delete function
if(isset($_POST['shopdel'])){
$id = $_POST['shopdel'];
$table = 'shop';
$query =deleteF($id,$table);
	if($query==TRUE){
		echo 'Product Deleted Successfully!';
	}else{
		echo 'Cannot delete, try again';
	}
}
////////Withdrawal Transactions delete function
if(isset($_POST['withdel'])){
$id = $_POST['withdel'];
$table = 'withdrawal';
$query =deleteF($id,$table);
	if($query==TRUE){
		echo 'Withdrawal Transactions Deleted Successfully!';
	}else{
		echo 'Cannot delete, try again';
	}
}

/////////Comment delete function
if(isset($_POST['comdel'])){
$id = $_POST['comdel'];
$table = 'comments';
$query =deleteF($id,$table);
	if($query==TRUE){
		echo 'Comment Deleted Successfully!';
	}else{
		echo 'Cannot delete, try again';
	}
}
/////////mining plan delete function
if(isset($_POST['plandel'])){
$id = $_POST['plandel'];
$table = 'plans';
$query =deleteF($id,$table);
	if($query==TRUE){
		echo 'Mine Plan Deleted Successfully!';
	}else{
		echo 'Cannot delete, try again';
	}
}

/////////admin data delete function
if(isset($_POST['admindel'])){
$id = $_POST['admindel'];
$table = 'users';
$query =deleteF($id,$table);
	if($query==TRUE){
		echo 'Admin Data Deleted Successfully!';
	}else{
		echo 'Cannot delete, try again';
	}
}
/////////Blog data delete function
if(isset($_POST['blogdel'])){
$id = $_POST['blogdel'];
$table = 'blogs';
$query =deleteF($id,$table);
	if($query==TRUE){
		echo 'Blog Deleted Successfully!';
	}else{
		echo 'Cannot delete, try again';
	}
}




 ?>