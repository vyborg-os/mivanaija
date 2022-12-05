<?php


/////href="php echo URL_ROOT /url"//////
/////developer info
define("DEVELOPER", "Vyborg");
//Require config config file
include_once ('config.php');
/////site settings fetch

	$stmt = $mysqli->prepare("SELECT settings_value FROM settings WHERE settings_key = 'site_name'");
	$stmt->execute();
	$result = $stmt->get_result();
	$data = $result->fetch_assoc();
	$site_name = $data['settings_value'];
	define('DS', DIRECTORY_SEPARATOR);

	/////site name
	define('SITE_NAME', $site_name);

	$stmts = $mysqli->prepare("SELECT settings_value FROM settings WHERE settings_key = 'official_email'");
	$stmts->execute();
	$results = $stmts->get_result();
	$datas = $results->fetch_assoc();
	$site_mail = $datas['settings_value'];

	define('SITE_MAIL', $site_mail);

	/////App Root
	define('APP_ROOT', dirname(dirname(__FILE__)));
	define('URL_ROOT', '/mivanaija');
	define('URL_SUBFOLDER','mivanaija');
///////input cleansing
    function secure($string){
		$sec = htmlentities($string);
		return $sec;
	}
////////General delete function
	function deleteF($id, $table){
		require 'config.php';
		$stmt = $mysqli->prepare("DELETE FROM ".$table." WHERE id='$id' LIMIT 1");
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		$result = $stmt->get_result();
		return $result;
	}
////////////////user id function delete
	function deleteU($u_id, $tbl){
		require 'config.php';
		$stmt = $mysqli->prepare("DELETE FROM ".$tbl." WHERE user_id='$u_id' LIMIT 1");
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		$result = $stmt->get_result();
		return $result;
	}
	////////General update status function
	function update_status_func($id,$status,$updated_at,$table){
		//Require Databse config file
		require 'config.php';
		//fetch all user
		$stmt = $mysqli->prepare("UPDATE ".$table." SET status = '$status', updated_at = '$updated_at' WHERE id = '$id'");
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
		$result = $stmt->get_result();
		return $result;
	}
////////Update image function
	function update_img_func($id,$image,$table){
		//Require Databse config file
		require 'config.php';
		//fetch all user
		$stmt = $mysqli->prepare("UPDATE ".$table." SET image = '$image' WHERE id = '$id'");
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
		$result = $stmt->get_result();
		return $result;
	}
/////////General fetch function all
	function fetch_all_data_raw($table){
	//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM ".$table."");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
	function fetch_all_data($table){
	//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM ".$table."");
		$stmt->execute();
		$result = $stmt->get_result();
		$data = $result->fetch_assoc();
		return $data;
	}
	/////////General fetch function in order
	function fetch_all_data_order($table){
	//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM ".$table." ORDER BY id DESC");
		$stmt->execute();
		$result = $stmt->get_result();
		$data = $result->fetch_assoc();
		return $data;
	}
function fetch_all_blog(){
	//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM blogs ORDER BY id DESC");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
////////fetch latest blog 5
function fetch_all_blog_five(){
	//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM blogs ORDER BY id DESC LIMIT 5");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
////////fetch latest blog  next 5
function fetch_all_blog_nfive(){
	//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM blogs ORDER BY id DESC OFFSET 5 ROWS FETCH NEXT 5 ROWS ONLY");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
////////fetch post at random fetch 3
function fetch_all_blog_rand_three(){
	//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM blogs ORDER BY RAND() LIMIT 3");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
////////fetch post at random fetch 1a
function fetch_all_blog_rand_onea(){
	//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM blogs ORDER BY RAND() LIMIT 1");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
////////fetch post at random fetch 1b
function fetch_all_blog_rand_oneb(){
	//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM blogs ORDER BY RAND() LIMIT 1");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}

function fetch_single_catcode(){
	//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM blogs WHERE blog_category = '3' ORDER BY id DESC LIMIT 1");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
function fetch_single_catcodeb(){
	//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM blogs WHERE blog_category = '3' ORDER BY RAND() LIMIT 2");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
function fetch_single_catcodebb(){
	//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM blogs WHERE blog_category = '3' ORDER BY RAND() LIMIT 2");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
function fetch_bottom_blog_eight(){
	//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM blogs ORDER BY id DESC LIMIT 8");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
////////fetch post at random fetch 5
function fetch_all_blog_rand_five(){
	//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM blogs ORDER BY RAND() LIMIT 5");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
////////fetch post at random fetch 2
function fetch_all_blog_rand_two(){
	//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM blogs ORDER BY RAND() LIMIT 2");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
////////fetch post at random fetch 5b
function fetch_all_blog_rand_fiveb(){
	//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM blogs ORDER BY RAND() LIMIT 5");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
////////fetch latest blog single
function fetch_all_blog_one(){
	//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM blogs ORDER BY id DESC LIMIT 1");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
/////////////fetch latest blog four
function fetch_all_blog_four(){
	//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM blogs ORDER BY id DESC LIMIT 4");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
function fetch_id_blog(){
	//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM blogs WHERE id = '$id'");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
////////admin auth login
function userExist($email){
		//Require Databse config file
		require 'config.php';

		//Check if email exist
		$stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ? ");
		$stmt->bind_param("s", $email);
		if($stmt->execute()){
			$result = $stmt->get_result();

			if ($result->num_rows >0) {
				return true;
			}else{
				return false;
			}
		}else{
			die($mysqli->error);
		}
	}
function s_userExist($email){
		//Require Databse config file
		require 'config.php';

		//Check if email exist
		$stmt = $mysqli->prepare("SELECT * FROM special_users WHERE email = ?");
		$stmt->bind_param("s", $email);
		if($stmt->execute()){
			$result = $stmt->get_result();

			if ($result->num_rows >0) {
				return true;
			}else{
				return false;
			}
		}else{
			die($mysqli->error);
		}
	}
function getSearch($param,$params){
    require 'config.php';
        $stmt = $mysqli->prepare("SELECT * FROM blogs WHERE content LIKE ? OR title LIKE ?");
        $stmt->bind_param("ss",$param,$params);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
function userNme($email){
	//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM users WHERE email = '$email'");
		$stmt->execute();
		$result = $stmt->get_result();
		$data = $result->fetch_assoc();
		return $data['name'];
	}
function user_ID($email,$table){
	//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM ".$table." WHERE email = '$email'");
		$stmt->execute();
		$result = $stmt->get_result();
		$data = $result->fetch_assoc();
		return $data['id'];
	}
function _userNme($email){
	//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM special_users WHERE email = '$email'");
		$stmt->execute();
		$result = $stmt->get_result();
		$data = $result->fetch_assoc();
		return $data['username'];
	}
function _userNme_usr($email){
	//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM users WHERE email = '$email'");
		$stmt->execute();
		$result = $stmt->get_result();
		$data = $result->fetch_assoc();
		return $data['name'];
	}
function _user_info($email){
	//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM special_users WHERE email = '$email'");
		$stmt->execute();
		$result = $stmt->get_result();
        return $result;
	}
function _userRole($email){
	//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM special_users WHERE email = '$email'");
		$stmt->execute();
		$result = $stmt->get_result();
		$data = $result->fetch_assoc();
		return $data['role_type'];
	}
function _userImg($email,$table){
	//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM ".$table." WHERE email = '$email'");
		$stmt->execute();
		$result = $stmt->get_result();
		$data = $result->fetch_assoc();
		return $data['image'];
	}
function treat_session($email){
		//Require Databse config file
		require 'config.php';

		//Check if email exist
		$stmt = $mysqli->prepare("SELECT * FROM special_users WHERE email = ?");
		$stmt->bind_param("s", $email);
		if($stmt->execute()){
			$result = $stmt->get_result();

			if ($result->num_rows >0) {
				return true;
			}else{
				return false;
			}
		}else{
			die($mysqli->error);
		}
	}
function treat_session_usr($email){
		//Require Databse config file
		require 'config.php';

		//Check if email exist
		$stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
		$stmt->bind_param("s", $email);
		if($stmt->execute()){
			$result = $stmt->get_result();

			if ($result->num_rows >0) {
				return true;
			}else{
				return false;
			}
		}else{
			die($mysqli->error);
		}
	}
function userMatch_($email, $pass){
		require 'config.php';
	    $stmt = $mysqli->prepare("SELECT * FROM users WHERE email = '$email'");
	    $stmt->execute();
	    $result = $stmt->get_result();
	    if($result->num_rows > 0){
	        $fetch = $result->fetch_assoc();
	        if(password_verify($pass, $fetch["password"])){
	            return true;
	        }else{
	            return false;
	        }
	    }else{
	        return false;
	    }
	}
function s_userMatch_($email, $pass){
		require 'config.php';
	    $stmt = $mysqli->prepare("SELECT * FROM special_users WHERE email = '$email'");
	    $stmt->execute();
	    $result = $stmt->get_result();
	    if($result->num_rows > 0){
	        $fetch = $result->fetch_assoc();
	        if(password_verify($pass, $fetch["password"])){
	            return true;
	        }else{
	            return false;
	        }
	    }else{
	        return false;
	    }
	}
function add_admin_($name,$email,$passwordy,$role_type,$table){
		//Require Databse config file
		require 'config.php';

		//add admin
		$stmt = $mysqli->prepare("INSERT INTO ".$table."(username,email,password,role_type) VALUES(?,?,?,?)");
		$stmt->bind_param("ssss",$name,$email,$passwordy,$role_type);
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		$result = $stmt->get_result();
		return $result;
	}
function reg_users_($name,$email,$passwordy,$table){
		//Require Databse config file
		require 'config.php';

		//add admin
		$stmt = $mysqli->prepare("INSERT INTO ".$table."(name,email,password) VALUES(?,?,?)");
		$stmt->bind_param("sss",$name,$email,$passwordy);
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		$result = $stmt->get_result();
		return $result;
	}
	function total_tbl($table){
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT count(*) AS total FROM ".$table."");
		$stmt->execute();
		$res = $stmt->get_result();
		$re = $res->fetch_assoc();
		
		return $re["total"];
	}
////////dashboard functions
	function user_spec_tbl($table,$user_id){
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM ".$table." WHERE id = '$user_id'");
		$stmt->execute();
		$res = $stmt->get_result();
		$re = $res->fetch_assoc();
		return $re['email'];
	}
	function paymethod_spec_tbl($table,$pay_id){
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM ".$table." WHERE id = '$pay_id'");
		$stmt->execute();
		$res = $stmt->get_result();
		$re = $res->fetch_assoc();
		return $re['name'];
	}
	function total_tbl_fetch($table){
    //Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM ".$table."");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
	function total_admin($table){
    //Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM ".$table."");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
function total_($table){
    //Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM ".$table."");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
function total_2($table){
    //Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM ".$table." WHERE role_type != 'Admin'");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
	function total_plans($table){
    //Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM ".$table."");
		$stmt->execute();
		$result = $stmt->get_result();
		$data = $result->fetch_assoc();
		return $data;
	}
	function total_payment_met($table){
    //Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM ".$table."");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
	function recent_five_deposit($table){
    //Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM ".$table." ORDER BY id DESC LIMIT 10");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
	function recent_five_withdraw($table){
    //Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM ".$table." WHERE status = 'completed' ORDER BY id DESC LIMIT 10");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
	function recent_tbl($table){
    //Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM ".$table." ORDER BY id DESC LIMIT 10");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}


////////roles



///////All Users

function all_users_fetch($table){
    //Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM ".$table." WHERE role_id !='2'");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
function _users_wallet_fetch($u_id){
    //Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM wallets WHERE user_id ='$u_id'");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
	function unverify_fetch(){
    //Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM users WHERE is_verified ='0' and document_type = true");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
function fetch_referral_count($table,$u_id){
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT count(*) AS total FROM ".$table." WHERE referral_user_id = '$u_id'");
		$stmt->execute();
		$res = $stmt->get_result();
		$re = $res->fetch_assoc();
		
		return $re["total"];
	}
function fetch_mine_true($u_id){
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM mining WHERE user_id = '$u_id'");
		$stmt->execute();
		$res = $stmt->get_result();
		$re = $res->fetch_assoc();
		
		$mine =  $re["status"];
		if($mine==true && $mine='active'){
			return 'Yes';
		}else{
			return 'No';
		}
	}

//////// Blog Category
function fetch_users_verify($table){
    //Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM ".$table."");
		$stmt->execute();
		$result = $stmt->get_result();
		$data = $result->fetch_assoc();
		return $data;
	}
function add_category($category_name,$category_description,$table){
		//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("INSERT INTO ".$table."(category_name,category_description) VALUES(?,?)");
		$stmt->bind_param("ss",$category_name,$category_description);
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		$result = $stmt->get_result();
		return $result;
	}
function update_category($id,$category_name,$category_description,$table){
		//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("UPDATE ".$table." SET category_name = '$category_name', category_description = '$category_description' WHERE id = '$id'");
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
		$result = $stmt->get_result();
		return $result;
	}
function cat_id($cid){
	//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM category WHERE id = '$cid'");
		$stmt->execute();
		$result = $stmt->get_result();
		$data = $result->fetch_assoc();
		return $data['category_name'];
	}
///////Administrative
	function add_admin($email,$name,$passwordy,$role_id,$created_at,$updated_at,$table){
		//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("INSERT INTO ".$table."(email,username,password,role_id,created_at,updated_at) VALUES(?,?,?,?,?,?)");
		$stmt->bind_param("ssssss",$email,$name,$passwordy,$role_id,$created_at,$updated_at);
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		$result = $stmt->get_result();
		return $result;
	}
function update_special_user($id,$name,$email,$role_type,$table){
		//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("UPDATE ".$table." SET username = '$name', email = '$email', role_type = '$role_type' WHERE id = '$id'");
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
		$result = $stmt->get_result();
		return $result;
	}
	function userMatch($email, $password){
		require 'config.php';
	    $stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
	    $stmt->bind_param("s", $email);
	    $stmt->execute();
	    
	    $result = $stmt->get_result();
	    if($result->num_rows > 0){
	        $fetch = $result->fetch_assoc();
	        if(password_verify($password, $fetch["password"])){
	            return true;
	        }else{
	            return false;
	        }
	    }else{
	        return false;
	    }
	}
 function check_email_exist($email){
    //Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM users WHERE email = '$email'");
		$stmt->execute();
		$result = $stmt->get_result();
		if($result->num_rows > 0){
			return true;
		}else{
			return false;
		}
		return $result;
	}


///////Payment Method

	function paymethod($id,$image,$name,$wallet_address,$created_at,$updated_at){
			//Require Databse config file
			require 'config.php';

			//add admin
			$stmt = $mysqli->prepare("INSERT INTO payment_method(id,image,name,wallet_address,created_at,updated_at) VALUES(?,?,?,?,?,?)");
			$stmt->bind_param("isssss",$id,$image,$name,$wallet_address,$created_at,$updated_at);
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
			$result = $stmt->get_result();
			return $result;
		}
	function update_paymethod($id,$name,$wallet_address,$updated_at){
		//Require Databse config file
		require 'config.php';
		//fetch all user
		$stmt = $mysqli->prepare("UPDATE payment_method SET name = '$name', wallet_address = '$wallet_address', updated_at = '$updated_at' WHERE id = '$id'");
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
		$result = $stmt->get_result();
		return $result;
	}
	function id_exist_tbl($table,$id){
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM ".$table." WHERE id = '$id'");
		$stmt->execute();
		$res = $stmt->get_result();
		
		return $res->num_rows;
	}
//////Miner Plans

	function miningplan($id,$image,$plan_name,$min_amount,$max_amount,$interest,$duration,$hashrate,$created_at,$updated_at){
			//Require Databse config file
			require 'config.php';

			//add admin
			$stmt = $mysqli->prepare("INSERT INTO plans(id,image,plan_name,min_amount,max_amount,interest,duration,hashrate,created_at,updated_at) VALUES(?,?,?,?,?,?,?,?,?,?)");
			$stmt->bind_param("isssssssss",$id,$image,$plan_name,$min_amount,$max_amount,$interest,$duration,$hashrate,$created_at,$updated_at);
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
			$result = $stmt->get_result();
			return $result;
		}
		function mining($user_id,$plan_id,$profit,$reference,$duration,$status,$created_at,$updated_at,$table){
			//Require Databse config file
			require 'config.php';

			//add admin
			$stmt = $mysqli->prepare("INSERT INTO ".$table."(user_id,plan_id,profit,reference,duration,status,created_at,updated_at) VALUES(?,?,?,?,?,?,?,?)");
			$stmt->bind_param("ssssssss",$user_id,$plan_id,$profit,$reference,$duration,$status,$created_at,$updated_at);
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
			$result = $stmt->get_result();
			return $result;
		}
	function update_mine_plan($id,$plan_name,$min_amount,$max_amount,$interest,$duration,$hashrate,$updated_at,$table){
		//Require Databse config file
		require 'config.php';
		//fetch all user
		$stmt = $mysqli->prepare("UPDATE ".$table." SET plan_name = '$plan_name',min_amount = '$min_amount',max_amount = '$max_amount',interest = '$interest',duration = '$duration',hashrate = '$hashrate',updated_at = '$updated_at' WHERE id = '$id'");
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
		$result = $stmt->get_result();
		return $result;
	}
	function fetch_pay_method($table){
	//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM ".$table."");
		$stmt->execute();
		$result = $stmt->get_result();
		$data = $result->fetch_assoc();
		return $data;
	}
	function fetch_pay_id_tbl($id){
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM plans WHERE id = '$id'");
		$stmt->execute();
		$res = $stmt->get_result();
		
		return $res->num_rows;
	}

//////Mining Transactions
	function total_mine($table){
    //Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM ".$table." ORDER BY id DESC");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}

//////Deposit & withdrawal Transactions
	function total_transact_deposit($table){
    //Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM ".$table." ORDER BY id DESC");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
	function fetch_planame_tbl($plan_id){
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM plans WHERE id = '$plan_id'");
		$stmt->execute();
		$res = $stmt->get_result();
		return $res;
	}
	function total_transact_withdraw($table){
    //Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM ".$table." ORDER BY id DESC");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
	function total_spec_status($table,$status){
    //Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM ".$table." WHERE status = '$status' ORDER BY id DESC");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
	function update_transact($id,$status,$updated_at,$table){
		//Require Databse config file
		require 'config.php';
		//fetch all user
		$stmt = $mysqli->prepare("UPDATE ".$table." SET status = '$status', updated_at = '$updated_at' WHERE id = '$id'");
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
		$result = $stmt->get_result();
		return $result;
	}

/////Generate Email
function insertmail($subject,$content,$table){
			//Require Databse config file
			require 'config.php';

			//add admin
			$stmt = $mysqli->prepare("INSERT INTO ".$table."(subject) VALUES(?,?)");
			$stmt->bind_param("ss",$subject,$content);
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
			$result = $stmt->get_result();
			return $result;
		}

/////Site Settings
	function all_settings(){
		//Require Databse config file
		require 'config.php';
		//fetch all user
		$stmt = $mysqli->prepare("SELECT * FROM settings");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
	function update_site_settings($id,$settings_value){
		//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("UPDATE settings SET settings_value = '$settings_value' WHERE id = '$id'");
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		$result = $stmt->get_result();
		return $result;
	}
///////post ads banner
function update_ads_($image){
		//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("INSERT INTO ads_banner(image) VALUES(?)");
        $stmt->bind_param("s",$image);
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		$result = $stmt->get_result();
		return $result;
	}
/////fetch single ads banner
function ads_fetch(){
		//Require Databse config file
		require 'config.php';
		//fetch all user
		$stmt = $mysqli->prepare("SELECT * FROM ads_banner ORDER BY id DESC LIMIT 1");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
/////fetch reachouts
function reachout_fetch(){
		//Require Databse config file
		require 'config.php';
		//fetch all user
		$stmt = $mysqli->prepare("SELECT * FROM reachouts ORDER BY id DESC");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
function reachout_fetch_($id){
		//Require Databse config file
		require 'config.php';
		//fetch all user
		$stmt = $mysqli->prepare("SELECT * FROM reachouts WHERE id = '$id'");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
///////Blog Function
	function post_blog($title,$content,$image,$blog_category,$blogurl,$created_at,$table){
    //Require Database config file
		require 'config.php';
		$stmt = $mysqli->prepare("INSERT INTO ".$table."(title,content,image,blog_category,blogurl,created_at) VALUES(?,?,?,?,?,?)");
		$stmt->bind_param("ssssss",$title,$content,$image,$blog_category,$blogurl,$created_at);
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		$result = $stmt->get_result();
		return $result;
	}
	function update_blog($id,$title,$content,$table){
		//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("UPDATE ".$table." SET title = '$title', content = '$content' WHERE id = '$id'");
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		$result = $stmt->get_result();
		return $result;
	}
	function id_fetch_tbl($table,$id){
			require 'config.php';
			$stmt = $mysqli->prepare("SELECT * FROM ".$table." WHERE id = ?");
            $stmt->bind_param("i",$id);
			$stmt->execute();
			$res = $stmt->get_result();
			return $res;
		}
	function url_fetch_tbl($blogurl){
			require 'config.php';
			$stmt = $mysqli->prepare("SELECT * FROM blogs WHERE blogurl = ?");
            $stmt->bind_param("s",$blogurl);
			$stmt->execute();
			$res = $stmt->get_result();
			return $res;
		}
function cid_fetch_tbl($table,$id){
			require 'config.php';
			$stmt = $mysqli->prepare("SELECT * FROM ".$table." WHERE blog_category = ?");
            $stmt->bind_param("i",$id);
			$stmt->execute();
			$res = $stmt->get_result();
			return $res;
		}
function send_reach_($fullname,$email,$message){
		//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("INSERT INTO reachouts(fullname,email,message) VALUES(?,?,?)");
        $stmt->bind_param("sss",$fullname,$email,$message);
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		$result = $stmt->get_result();
		return $result;
	}
///////comment function
function comid_fetch_tbl($blog_id){
			require 'config.php';
			$stmt = $mysqli->prepare("SELECT * FROM comments WHERE blog_id = ?");
            $stmt->bind_param("i",$blog_id);
			$stmt->execute();
			$res = $stmt->get_result();
			return $res;
		}
///////comment insert function
function com_($blog_id,$user_id,$comment){
			require 'config.php';
		$stmt = $mysqli->prepare("INSERT INTO comments(blog_id,user_id,comment) VALUES(?,?,?)");
		$stmt->bind_param("sss",$blog_id,$user_id,$comment);
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		$result = $stmt->get_result();
		return $result;
		}
function username_fetch($user_id,$table){
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM ".$table." WHERE id = ?");
        $stmt->bind_param("i",$user_id);
		$stmt->execute();
		$res = $stmt->get_result();
		$re = $res->fetch_assoc();
		
		return $re["name"];
	}
function username_img_fetch($user_id,$table){
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * FROM ".$table." WHERE id = ?");
        $stmt->bind_param("i",$user_id);
		$stmt->execute();
		$res = $stmt->get_result();
		$re = $res->fetch_assoc();
		
		return $re["image"];
	}
/////////Chart fetch func
	function fetchdata_all($table){
		//Require Databse config file
		require 'config.php';
		//fetch all user
		$stmt = $mysqli->prepare("SELECT * FROM ".$table."");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
	function fetchdata_all_new($table){
		//Require Databse config file
		require 'config.php';
		//fetch all user
		$stmt = $mysqli->prepare("SELECT * FROM ".$table." ORDER BY id DESC");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
	function char_tbl($table,$created_at_month,$created_at_year){
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT count(*) AS total FROM ".$table." WHERE date_format(created_at,'%d') = $created_at_month AND date_format(created_at,'%Y') = $created_at_year");
		$stmt->execute();
		$res = $stmt->get_result();
		$re = $res->fetch_assoc();
		
		return $re["total"];
	}
	function charr_tbl($table,$created_at){
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT count(*) AS total FROM ".$table." WHERE created_at LIKE '%$created_at')");
		$stmt->execute();
		$res = $stmt->get_result();
		$re = $res->fetch_assoc();
		
		return $re["total"];
	}
	function char_tbl_($table){
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT count(*) AS total FROM ".$table."");
		$stmt->execute();
		$res = $stmt->get_result();
		$re = $res->fetch_assoc();
		
		return $re["total"];
	}
////logout



///Sessions
?>