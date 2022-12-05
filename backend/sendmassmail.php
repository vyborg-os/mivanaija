<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require_once '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
include_once('header.php');

if(isset($_POST['send_mass'])){
    $subject = htmlentities(addslashes($_POST['subject']));
    $content = htmlentities(addslashes($_POST['message']));
    if(empty($subject) || empty($content)){
        echo'<script>
            alert("All fields are required!");
        </script>';
    }else{
        $response = array();
        $table = 'users';
        $ft = fetch_all_data_raw($table);
        while($dat = $ft->fetch_assoc()){
            $to = $dat['email'];
            $uname = userNme($to);
            $cont = html_entity_decode($content);
        
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'mivanaija.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'support@mivanaija.com';
            $mail->Password = 'Wakeup200$';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom('support@mivanaija.com', 'Mivanaija');
            $mail->addAddress($to);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            // $mail->Body = "Hello World";
            ob_start();
            include 'temp.php';
            $body = ob_get_contents();
            ob_end_clean();
            $mail->msgHTML($body);
                 if($mail->send()==true){
                 //$msg = $to.' - Message sent';
                 $response[] = $to.' - Message sent';
                }else{
                 //$msg = $to.' - Message not sent';
                 $response[] = $to.' - Message not sent';
                 $response[] = $mail->ErrorInfo;
                }
        }
        $enloop = json_encode($response);
        $mail->ClearAllRecipients();
        
    }
    
}
?>
<link
  rel="stylesheet"
  href="css/dropify.css"
  type="text/css"
/>
  <div class="page-content form-page">
    <!-- Page Header-->
    <div class="bg-dash-dark-2 py-4">
      <div class="container-fluid">
        <h2 class="h5 mb-0">Newsletter</h2>
      </div>
    </div>
    <!-- Breadcrumb-->
    <div class="container-fluid py-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 py-3 px-0">
          <li class="breadcrumb-item"><a href="home">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Newsletter</li>
        </ol>
      </nav>
    </div>
      <section class="pt-0"> 
      <div class="container-fluid">
        <div class="row gy-4">
          <!-- Basic Form-->
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3 class="h4 mb-0">Post Mail Newsletter</h3>
              </div>
              <?php 
                if(isset($enloop)){
                    $res = json_decode($enloop);
                    foreach ($res as $key) {
                        echo '<p style="color: white;">'.$key.'</p>';
                    }
                }
                ?>
              <div class="card-body pt-0">
                <p class="text-sm">Mass Mail</p>
                <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                  <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1" >Mail Title</label>
                    <input type="text" class="form-control" name="subject">
                  </div>
                     <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1" >Mails Contents</label>
                    <textarea id="editor" class="form-control" name="message" rows="8">
                      
                    </textarea>
                  </div>
                  <input class="btn btn-primary" type="submit" style="width: 100%;" value="Send" name="send_mass">
                </form>
              </div>
            </div>
        </div>
     </div>
      </div>
  </section>
<script src="js/jquery.3.2.1.min.js"></script>
<script src="ckeditor5-build-classic-35.2.0/ckeditor5-build-classic/ckeditor.js"></script>
<script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
 </script>
</div>


<?php
include_once('footer.php');
?>