<?php 
global $bookingultrapro,   $bupcomplement;
?>
<h3><?php _e('Advanced Email Options','bookingup'); ?></h3>
<form method="post" action="" id="b_frm_settings" name="b_frm_settings">
<input type="hidden" name="update_settings" />
<input type="hidden" name="reset_email_template" id="reset_email_template" />
<input type="hidden" name="email_template" id="email_template" />


  <p><?php _e('Here you can control how Booking Ultra Pro will send the notification to your users.','bookingup'); ?></p>



 <h3><?php _e('Privacy','bookingup'); ?></h3>
 
 <div class="bup-sect  ">  
   <table class="form-table">
<?php 
 


$this->create_plugin_setting(
	'select',
	'bup_noti_admin',
	__('Send Email Notifications to Admin?:','bookingup'),
	array(
		'yes' => __('YES','bookingup'),
		'no' => __('NO','bookingup') 
		),
		
	__('This allows you to block email notifications that are sent to the admin.','bookingup'),
  __('This allows you to block email notifications that are sent to the admin.','bookingup')
       );
	   
$this->create_plugin_setting(
	'select',
	'bup_noti_staff',
	__('Send Email Notifications to Staff Members?:','bookingup'),
	array(
		'yes' => __('YES','bookingup'),
		'no' => __('NO','bookingup') 
		),
		
	__('This allows you to block email notifications that are sent to the staff members.','bookingup'),
  __('This allows you to block email notifications that are sent to the staff members.','bookingup')
       );
	   

$this->create_plugin_setting(
	'select',
	'bup_noti_client',
	__('Send Email Notifications to Clients?:','bookingup'),
	array(
		'yes' => __('YES','bookingup'),
		'no' => __('NO','bookingup') 
		),
		
	__('This allows you to block email notifications that are sent to the clients.','bookingup'),
  __('This allows you to block email notifications that are sent to the clients.','bookingup')
       );
	   

?>
 </table>

 
 </div>
 
 
<div class="bup-sect  ">  
   <table class="form-table">
<?php 
 

$this->create_plugin_setting(
        'input',
        'messaging_send_from_name',
        __('Send From Name','bookingup'),array(),
        __('Enter the your name or company name here.','bookingup'),
        __('Enter the your name or company name here.','bookingup')
);

$this->create_plugin_setting(
        'input',
        'messaging_send_from_email',
        __('Send From Email','bookingup'),array(),
        __('Enter the email address to be used when sending emails.','bookingup'),
        __('Enter the email address to be used when sending emails.','bookingup')
);

$this->create_plugin_setting(
	'select',
	'bup_smtp_mailing_mailer',
	__('Mailer:','bookingup'),
	array(
		'mail' => __('Use the PHP mail() function to send emails','bookingup'),
		'smtp' => __('Send all Booking Ultra emails via SMTP','bookingup'), 
		'mandrill' => __('Send all Booking Ultra emails via Mandrill','bookingup'),
		'third-party' => __('Send all Booking Ultra emails via Third-party plugin','bookingup'), 
		
		),
		
	__('Specify which mailer method Users Ultra should use when sending emails.','bookingup'),
  __('Specify which mailer method Users Ultra should use when sending emails.','bookingup')
       );
	   
$this->create_plugin_setting(
                'checkbox',
                'bup_smtp_mailing_return_path',
                __('Return Path','bookingup'),
                '1',
                __('Set the return-path to match the From Email','bookingup'),
                __('Set the return-path to match the From Email','bookingup')
        ); 
?>
 </table>

 
 </div>
 
 <h3><?php _e('SMTP Settings','bookingup'); ?></h3>
 
 <div class="bup-sect  ">
  <p> <strong><?php _e('This options should be set only if you have chosen to send email via SMTP','bookingup'); ?></strong></p>
 
  <table class="form-table">
 <?php
$this->create_plugin_setting(
        'input',
        'bup_smtp_mailing_host',
        __('SMTP Host:','bookingup'),array(),
        __('Specify host name or ip address.','bookingup'),
        __('Specify host name or ip address.','bookingup')
); 

$this->create_plugin_setting(
        'input',
        'bup_smtp_mailing_port',
        __('SMTP Port:','bookingup'),array(),
        __('Specify Port.','bookingup'),
        __('Specify Port.','bookingup')
); 


$this->create_plugin_setting(
	'select',
	'bup_smtp_mailing_encrytion',
	__('Encryption:','bookingup'),
	array(
		'none' => __('No encryption','bookingup'),
		'ssl' => __('Use SSL encryption','bookingup'), 
		'tls' => __('Use TLS encryption','bookingup'), 
		
		),
		
	__('Specify the encryption method.','bookingup'),
  __('Specify the encryption method.','bookingup')
       );
	   
$this->create_plugin_setting(
	'select',
	'bup_smtp_mailing_authentication',
	__('Authentication:','bookingup'),
	array(
		'false' => __('No. Do not use SMTP authentication','bookingup'),
		'true' => __('Yes. Use SMTP Authentication','bookingup'), 
		
		),
		
	__('Specify the authentication method.','bookingup'),
  __('Specify the authentication method.','bookingup')
       );

$this->create_plugin_setting(
        'input',
        'bup_smtp_mailing_username',
        __('Username:','bookingup'),array(),
        __('Specify Username.','bookingup'),
        __('Specify Username.','bookingup')
); 

$this->create_plugin_setting(
        'input',
        'bup_smtp_mailing_password',
        __('Password:','bookingup'),array(),
        __('Input Password.','bookingup'),
        __('Input Password.','bookingup')
); 


 ?>
 
 </table>
 
 <?php if(isset($bupcomplement))
{?>
 <p><strong><?php _e('This options should be set only if you have chosen to send email via Mandrill','bookingup'); ?></strong></p>

</div>

<div class="bup-sect  ">
  <table class="form-table">
 <?php
$this->create_plugin_setting(
        'input',
        'bup_mandrill_api_key',
        __('Mandrill API Key:','xoousers'),array(),
        __('Specify Mandrill API. Find out more info here: https://mandrillapp.com/api/docs/','bookingup'),
        __('Specify Mandrill API.','bookingup')
); 

?>
 
 </table>
</div>

<?php }?>
<div class="bup-sect  ">
  <h3><?php _e('Admin Message New Booking','bookingup'); ?></h3>
  
  <p><?php _e('This is the welcome email that is sent to the admin when a new booking is generated.','bookingup'); ?></p>
  
   <table class="form-table">

<?php 


$this->create_plugin_setting(
        'input',
        'email_new_booking_subject_admin',
        __('Subject:','xoousers'),array(),
        __('Set Email Subject.','bookingup'),
        __('Set Email Subject.','bookingup')
); 

$this->create_plugin_setting(
        'textarearich',
        'email_new_booking_admin',
        __('Message','bookingup'),array(),
        __('Set Email Message here.','bookingup'),
        __('Set Email Message here.','bookingup')
);


?>

<tr>

<th></th>
<td><input type="button" value="<?php _e('RESTORE DEFAULT TEMPLATE','bookingup'); ?>" class="bup_restore_template button" b-template-id='email_new_booking_admin'></td>

</tr>	

</table> 
</div>

<div class="bup-sect  ">
  <h3><?php _e('Staff Message New Booking','bookingup'); ?></h3>
  
  <p><?php _e('This is the welcome email that is sent to the staff member when a new booking is generated.','bookingup'); ?></p>
  
   <table class="form-table">

<?php 


$this->create_plugin_setting(
        'input',
        'email_new_booking_subject_staff',
        __('Subject:','bookingup'),array(),
        __('Set Email Subject.','bookingup'),
        __('Set Email Subject.','bookingup')
); 

$this->create_plugin_setting(
        'textarearich',
        'email_new_booking_staff',
        __('Message','bookingup'),array(),
        __('Set Email Message here.','bookingup'),
        __('Set Email Message here.','bookingup')
);

	
?>

<tr>

<th></th>
<td><input type="button" value="<?php _e('RESTORE DEFAULT TEMPLATE','bookingup'); ?>" class="bup_restore_template button" b-template-id='email_new_booking_staff'></td>

</tr>	
</table> 
</div>


<div class="bup-sect  ">
  <h3><?php _e('Client Message New Booking','bookingup'); ?></h3>
  
  <p><?php _e('This is the welcome email that is sent to the client when a new booking is generated.','bookingup'); ?></p>
  
   <table class="form-table">

<?php 


$this->create_plugin_setting(
        'input',
        'email_new_booking_subject_client',
        __('Subject:','bookingup'),array(),
        __('Set Email Subject.','bookingup'),
        __('Set Email Subject.','bookingup')
); 

$this->create_plugin_setting(
        'textarearich',
        'email_new_booking_client',
        __('Message','bookingup'),array(),
        __('Set Email Message here.','bookingup'),
        __('Set Email Message here.','bookingup')
);



	
?>

<tr>

<th></th>
<td><input type="button" value="<?php _e('RESTORE DEFAULT TEMPLATE','bookingup'); ?>" class="bup_restore_template button" b-template-id='email_new_booking_client'></td>

</tr>	
</table> 
</div>

<div class="bup-sect  ">
  <h3><?php _e('Reschedule Message For Clients','bookingup'); ?></h3>
  
  <p><?php _e('This message is sent to the CLIENT when an appointment is rescheduled.','bookingup'); ?></p>
  
   <table class="form-table">

<?php 


$this->create_plugin_setting(
        'input',
        'email_reschedule_subject',
        __('Subject:','bookingup'),array(),
        __('Set Email Subject.','bookingup'),
        __('Set Email Subject.','bookingup')
); 

$this->create_plugin_setting(
        'textarearich',
        'email_reschedule',
        __('Message','bookingup'),array(),
        __('Set Email Message here.','bookingup'),
        __('Set Email Message here.','bookingup')
);



	
?>

<tr>

<th></th>
<td><input type="button" value="<?php _e('RESTORE DEFAULT TEMPLATE','bookingup'); ?>" class="bup_restore_template button" b-template-id='email_reschedule'></td>

</tr>	
</table> 
</div>

<div class="bup-sect  ">
  <h3><?php _e('Reschedule Message For Staff Member','bookingup'); ?></h3>
  
  <p><?php _e('This message is sent to the STAFF MEMBER when an appointment is rescheduled.','bookingup'); ?></p>
  
   <table class="form-table">

<?php 


$this->create_plugin_setting(
        'input',
        'email_reschedule_subject_staff',
        __('Subject:','bookingup'),array(),
        __('Set Email Subject.','bookingup'),
        __('Set Email Subject.','bookingup')
); 

$this->create_plugin_setting(
        'textarearich',
        'email_reschedule_staff',
        __('Message','bookingup'),array(),
        __('Set Email Message here.','bookingup'),
        __('Set Email Message here.','bookingup')
);



	
?>

<tr>

<th></th>
<td><input type="button" value="<?php _e('RESTORE DEFAULT TEMPLATE','bookingup'); ?>" class="bup_restore_template button" b-template-id='email_reschedule_staff'></td>

</tr>	
</table> 
</div>


<div class="bup-sect  ">
  <h3><?php _e('Reschedule Message For The Admin','bookingup'); ?></h3>
  
  <p><?php _e('This message is sent to the ADMIN when an appointment is rescheduled.','bookingup'); ?></p>
  
   <table class="form-table">

<?php 


$this->create_plugin_setting(
        'input',
        'email_reschedule_subject_admin',
        __('Subject:','bookingup'),array(),
        __('Set Email Subject.','bookingup'),
        __('Set Email Subject.','bookingup')
); 

$this->create_plugin_setting(
        'textarearich',
        'email_reschedule_admin',
        __('Message','bookingup'),array(),
        __('Set Email Message here.','bookingup'),
        __('Set Email Message here.','bookingup')
);



	
?>

<tr>

<th></th>
<td><input type="button" value="<?php _e('RESTORE DEFAULT TEMPLATE','bookingup'); ?>" class="bup_restore_template button" b-template-id='email_reschedule_admin'></td>

</tr>	
</table> 
</div>



<div class="bup-sect  ">
  <h3><?php _e('Bank Payment Message For the Client','bookingup'); ?></h3>
  
  <p><?php _e('This message will be sent to the client when the selected payment method is bank.','bookingup'); ?></p>
  
   <table class="form-table">

<?php 


$this->create_plugin_setting(
        'input',
        'email_bank_payment_subject',
        __('Subject:','bookingup'),array(),
        __('Set Email Subject.','bookingup'),
        __('Set Email Subject.','bookingup')
); 

$this->create_plugin_setting(
        'textarearich',
        'email_bank_payment',
        __('Message','bookingup'),array(),
        __('Set Email Message here.','bookingup'),
        __('Set Email Message here.','bookingup')
);



	
?>

<tr>

<th></th>
<td><input type="button" value="<?php _e('RESTORE DEFAULT TEMPLATE','bookingup'); ?>" class="bup_restore_template button" b-template-id='email_bank_payment'></td>

</tr>	
</table> 
</div>


<div class="bup-sect  ">
  <h3><?php _e('Bank Payment Message For the Admin','bookingup'); ?></h3>
  
  <p><?php _e('This message will be sent to the admin when the selected payment method is bank.','bookingup'); ?></p>
  
   <table class="form-table">

<?php 


$this->create_plugin_setting(
        'input',
        'email_bank_payment_admin_subject',
        __('Subject:','bookingup'),array(),
        __('Set Email Subject.','bookingup'),
        __('Set Email Subject.','bookingup')
); 

$this->create_plugin_setting(
        'textarearich',
        'email_bank_payment_admin',
        __('Message','bookingup'),array(),
        __('Set Email Message here.','bookingup'),
        __('Set Email Message here.','bookingup')
);



	
?>

<tr>

<th></th>
<td><input type="button" value="<?php _e('RESTORE DEFAULT TEMPLATE','bookingup'); ?>" class="bup_restore_template button" b-template-id='email_bank_payment_admin'></td>

</tr>	
</table> 
</div>


<div class="bup-sect  ">
  <h3><?php _e('Appointment Status Changed Admin Email','bookingup'); ?></h3>
  
  <p><?php _e('This message will be sent to the admin when status of an appointment changes.','bookingup'); ?></p>
  
   <table class="form-table">

<?php 


$this->create_plugin_setting(
        'input',
        'email_appo_status_changed_admin_subject',
        __('Subject:','bookingup'),array(),
        __('Set Email Subject.','bookingup'),
        __('Set Email Subject.','bookingup')
); 

$this->create_plugin_setting(
        'textarearich',
        'email_appo_status_changed_admin',
        __('Message','bookingup'),array(),
        __('Set Email Message here.','bookingup'),
        __('Set Email Message here.','bookingup')
);



	
?>

<tr>

<th></th>
<td><input type="button" value="<?php _e('RESTORE DEFAULT TEMPLATE','bookingup'); ?>" class="bup_restore_template button" b-template-id='email_appo_status_changed_admin'></td>

</tr>	
</table> 
</div>

<div class="bup-sect  ">
  <h3><?php _e('Appointment Status Changed Staff Email','bookingup'); ?></h3>
  
  <p><?php _e('This message will be sent to the staff member when status of an appointment changes.','bookingup'); ?></p>
  
   <table class="form-table">

<?php 


$this->create_plugin_setting(
        'input',
        'email_appo_status_changed_staff_subject',
        __('Subject:','bookingup'),array(),
        __('Set Email Subject.','bookingup'),
        __('Set Email Subject.','bookingup')
); 

$this->create_plugin_setting(
        'textarearich',
        'email_appo_status_changed_staff',
        __('Message','bookingup'),array(),
        __('Set Email Message here.','bookingup'),
        __('Set Email Message here.','bookingup')
);



	
?>

<tr>

<th></th>
<td><input type="button" value="<?php _e('RESTORE DEFAULT TEMPLATE','bookingup'); ?>" class="bup_restore_template button" b-template-id='email_appo_status_changed_staff'></td>

</tr>	
</table> 
</div>

<div class="bup-sect  ">
  <h3><?php _e('Appointment Status Changed Client Email','bookingup'); ?></h3>
  
  <p><?php _e('This message will be sent to the client when status of an appointment changes.','bookingup'); ?></p>
  
   <table class="form-table">

<?php 


$this->create_plugin_setting(
        'input',
        'email_appo_status_changed_client_subject',
        __('Subject:','bookingup'),array(),
        __('Set Email Subject.','bookingup'),
        __('Set Email Subject.','bookingup')
); 

$this->create_plugin_setting(
        'textarearich',
        'email_appo_status_changed_client',
        __('Message','bookingup'),array(),
        __('Set Email Message here.','bookingup'),
        __('Set Email Message here.','bookingup')
);



	
?>

<tr>

<th></th>
<td><input type="button" value="<?php _e('RESTORE DEFAULT TEMPLATE','bookingup'); ?>" class="bup_restore_template button" b-template-id='email_appo_status_changed_client'></td>

</tr>	
</table> 
</div>

<?php if(isset($bupcomplement))
{?>
<div class="bup-sect  ">
  <h3><?php _e('Staff Password Change','bookingup'); ?></h3>
  
  <p><?php _e('This message will be sent to the staff member every time the password is changed in the staff account.','bookingup'); ?></p>
  
   <table class="form-table">

<?php 


$this->create_plugin_setting(
        'input',
        'email_password_change_staff_subject',
        __('Subject:','bookingup'),array(),
        __('Set Email Subject.','bookingup'),
        __('Set Email Subject.','bookingup')
); 

$this->create_plugin_setting(
        'textarearich',
        'email_password_change_staff',
        __('Message','bookingup'),array(),
        __('Set Email Message here.','bookingup'),
        __('Set Email Message here.','bookingup')
);



	
?>

<tr>

<th></th>
<td><input type="button" value="<?php _e('RESTORE DEFAULT TEMPLATE','bookingup'); ?>" class="bup_restore_template button" b-template-id='email_password_change_staff'></td>

</tr>	
</table> 
</div>

<?php }?>

<p class="submit">
	<input type="submit" name="mail_setting_submit" id="mail_setting_submit" class="button button-primary" value="<?php _e('Save Changes','bookingup'); ?>"  />

</p>

</form>