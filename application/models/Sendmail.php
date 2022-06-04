<?php
  ////--- SEND MAIL FROM SEND GRID MODELS ------/////
class Sendmail extends CI_Model
{
  function __construct() 
    {
    /* Call the Model constructor */
    parent::__construct();
    $this->load->library('email');
    
      

    
    }
  public function index()
    {   //// call DEFAULT FINCTION IN INDEX    
    }
  /////----- EMAIL SENDING SCRIPT MODEL -----/////  
    public function sendmail($to,$subject,$msg){ 
    $this->email->initialize(
      array(
          'protocol' => 'smtp',
          'smtp_host' => 'smtp.sendgrid.net',
          'smtp_user' => 'sharvan123456',
          'smtp_pass' => 'reena123456',
          'smtp_port' => 587,
          'mailtype' => 'html',
          'crlf' => "\r\n",
          'newline' => "\r\n"
        )
      );

    //$msg = "hellonew";
   //$to1 = "anas@finesofttechnologies.com";
    $this->email->from('info@webmobril.com', 'CALCULATOR');
    $this->email->to($to);
    //$this->email->cc('another@another-example.com');
    //$this->email->bcc('them@their-example.com');
    $htmltemplates='
    <table cellpadding="0" cellspacing="0" align="center" bgcolor="#ffffff" style="width:600px;border:1px solid #42B599;"> 
   <tbody>
   <tr> 
     <td align="center" bgcolor="#42B599" style="line-height:0px">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="line-height:0px"> 
       <tbody>
        <tr> 
         <td style="height:50px; line-height:50px; text-align:center; color:#fff; font-family:arial; font-size:18px; font-weight:600;"><img src="'.base_url("assets/breadcornor.png").'" style="height:50px;line-height:50px; padding:10px 0;"></td> 
        </tr> 
       
       
        <tr> 
         <td bgcolor="#42B599"></td> 
        </tr> 
       </tbody>
      </table></td> 
    </tr>
    <tr> 
<td>
<table style="width:100%; font-size:14px; padding:20px; font-family:arial;">
<tr><td>
'.$msg.'
</td></tr>
<tr><td>&nbsp;</td></tr>

</table>   
</td> 
    </tr> 
   
      
    <tr> 
     <td align="center" bgcolor="#42B599" style="line-height:0px">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="line-height:0px"> 
       <tbody>
        <tr> 
         <td style="height:25px; line-height:25px; text-align:center; color:#fff; font-family:arial; font-size:12px; font-weight:600;"></td> 
        </tr> 
       
       
        <tr> 
         <td bgcolor="#ff2341"></td> 
        </tr> 
       </tbody>
      </table></td> 
    </tr>
   </tbody>
  </table> ';
  //echo $htmltemplates; exit;
    $this->email->subject($subject);
    $this->email->message($htmltemplates);
    $this->email->send();
  //  echo $this->email->print_debugger();
        
  }   /////---- CLOSE SENDING EMAIL -----/////
  /////----- EMAIL SENDING WITH ATTACHMENT SCRIPT MODEL -----/////  
    public function sendmailwithattach($to,$subject,$msg,$filename){ 
    $this->email->initialize(
      array(
          'protocol' => 'smtp',
          'smtp_host' => 'smtp.sendgrid.net',
          'smtp_user' => 'rajendra180188',
          'smtp_pass' => 'rajendra9981454881',
          'smtp_port' => 587,
          'mailtype' => 'html',
          'crlf' => "\r\n",
          'newline' => "\r\n"
        )
      );

    $this->email->from('info@aryaveer.com', 'Arya Veer');
    $this->email->to($to);
    //$this->email->cc('another@another-example.com');
    //$this->email->bcc('them@their-example.com');
    
    
    $htmltemplates='
    
    <table cellpadding="0" cellspacing="0" align="center" bgcolor="#ffffff" style="max-width:640px;min-width:320px;border:1px solid #ccc;"> 
   <tbody>
    <tr> 
     <td height="20" style="text-align:right; font-size:12px; padding:5px;">
      Call Us : +91-00-0000-0000&nbsp;<table width="60%" border="0" cellspacing="0" cellpadding="0" align="left"> 
       <tbody>
        <tr> 
         <td style="color:#999999;text-align:left;font-family:Arial,Helvetica,sans-serif;font-size:10px">Get extra 10% off </td> 
        </tr> 
       </tbody>
      </table> </td> 
    </tr> 
    <tr> 
     <td align="center" height="65" bgcolor="#ffffff" style="border-top:4px solid #ff2341">
   <a href="'.base_url("home").'">
   <img src="'.base_url("mail/logo.png").'" alt="" style="border:0px;margin-right:0px; padding:10px;" class="CToWUd"></a></td> 
    </tr> 
    <tr> 
     <td height="7" style="border-top:1px solid #ebe9e9">
   <img src="'.base_url("mail/line.gif").'" width="1px" style="width:1px" class="CToWUd"></td> 
    </tr> 
    <tr> 
     <td> 
      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family:Calibri,arial;font-size:12px!important;color:#606060"> 
       <tbody>
     
       </tbody>
      </table> </td> 
    </tr>  
    <tr> 
     <td height="7" style="border-bottom:1px solid #ebe9e9"><img src="'.base_url("mail/line2.gif").'" width="1px" style="width:1px" class="CToWUd"></td> 
    </tr> 
   
    <tr> 
     <td height="5"></td> 
    </tr> 
  
 
    <tr> 
     <td align="center" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#606060;padding-top:5px;padding-left:5px">
'.$msg.'   </td> 
    </tr> 
   
    <tr> 
     <td align="center">
      <table width="96%" border="0" cellspacing="0" cellpadding="0" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#606060" align="center"> 
       <tbody>
        <tr> 
         <td width="30%" align="center"><br></td><td width="5%"></td><td width="30%" align="center"></td><td width="5%"></td><td width="30%" align="center"></td></tr> 
       </tbody>
      </table></td> 
    </tr> 
    
    <tr> 
     <td align="center" bgcolor="#ff2341" style="line-height:0px">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="line-height:0px"> 
       <tbody>
        <tr> 
         <td style="height:15px"></td> 
        </tr> 
        <tr> 
         <td align="center" bgcolor="#ff2341" style="font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:bold;color:#ffffff;padding:15px 10px 5px 10px">Connect with us</td> 
        </tr> 
        <tr> 
         <td align="center" height="60" bgcolor="#ff2341">
     <a href="#"><img src="'.base_url("mail/fb.png").'" width="49" height="49" border="0" hspace="0" vspace="0" class="CToWUd"></a>
     <a href="#"><img src="'.base_url("mail/gplus.png").'" width="49" height="49" border="0" hspace="0" vspace="0" class="CToWUd"></a>
     <a href="#"><img src="'.base_url("mail/gplus1.png").'" width="49" height="49" border="0" hspace="0" vspace="0" class="CToWUd"></a>
     <a href="#"><img src="'.base_url("mail/pin.png").'" width="49" height="49" border="0" hspace="0" vspace="0" class="CToWUd"></a></td> 
        </tr> 
        <tr> 
         <td bgcolor="#ff2341" height="5"></td> 
        </tr> 
       </tbody>
      </table></td> 
    </tr>
   </tbody>
  </table> ';
  //echo  $htmltemplates; exit;
    $this->email->subject($subject);
    $this->email->message($htmltemplates);
    $this->email->attach($filename);
    $send = $this->email->send();
    /* if($send){
      return "100";
    } */
    ///echo $this->email->print_debugger();
        
  }   /////---- CLOSE SENDING EMAIL -----/////
  
}   /////---- CLOSE MAIN CLASS ----//////

