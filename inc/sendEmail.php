<?php

	$response=array();
 		
        /* $data['user_id']=$_SESSION['mts_user_id'];
        $data['product_id']=$this->input->post('prodid_rating');
        $data['rating']=$this->input->post('rating');
        $data['comment']=$this->input->post('txtreview');
        $data['added_on_date'] = date("Y-m-d H:i:s");
        $this->product->add_prod_reviews($data);
        $newid=$this->db->insert_id(); */
        // Using the ini_set()
        
        //ini_set("SMTP", "smtpout.asia.sescureserver.net");
        //ini_set("sendmail_from", "hr@ecti.co.in");
        //ini_set("smtp_port", "80");
        $message="Contact us form details";
        $message.=PHP_EOL."Name ".$_POST['name'];
        $message.=PHP_EOL."Contact No. ".$_POST['phone'];
        $message.=PHP_EOL."EmailID ".$_POST['email'];
        
        $message.=PHP_EOL.$_POST['msg'];
    
        //$to="prachidharne97@gmail.com";
        $to="shwetajadhav0624@gmail.com";


        $subject="Enquiry from ".$_POST['name'];
         /* $header = "From:info@ecti.co.in.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";*/
          //$sender="info@smtpout.sescureserver.net";       
          $sender="info@sescureserver.net";       
         //******************* new code ************
         $headers = "Reply-To:<".$sender.">\r\n";
         $headers .= "Return-Path:<".$sender.">\r\n";
         $headers .= "From:<".$sender.">\r\n";
        // $headers .= "Organization: Sender Organization\r\n";
          $headers .= "MIME-Version: 1.0\r\n";
          $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
          $headers .= "X-Priority: 3\r\n";
          $headers .= "X-Mailer: PHP". phpversion() ."\r\n"; 
                 //*******************new code end ***********
         $retval = @mail ($to,$subject,$message,$headers);
         
        if($retval == true)
        {
          $response['status']=1;
 	      $response['message']='Mail Sent.';
        }
        else
        {
           $response['status']=0;
 	       $response['message']='Could not send email. Please try again...';
        }

         echo json_encode($response); 
         exit;
         
?>      