<?php
class BookingUltraProMessaging extends BookingUltraCommon 
{
	var $mHeader;
	var $mEmailPlainHTML;
	var $mHeaderSentFromName;
	var $mHeaderSentFromEmail;
	var $mCompanyName;
	

	function __construct() 
	{
		$this->setContentType();
		$this->setFromEmails();				
		$this->set_headers();	
		
	}
	
	function setFromEmails() 
	{
		global $bookingultrapro;
			
		$from_name =  $this->get_option('messaging_send_from_name'); 
		$from_email = $this->get_option('messaging_send_from_email'); 	
		if ($from_email=="")
		{
			$from_email =get_option('admin_email');
			
		}		
		$this->mHeaderSentFromName=$from_name;
		$this->mHeaderSentFromEmail=$from_email;	
		
    }
	
	function setContentType() 
	{
		global $bookingultrapro;			
				
		$this->mEmailPlainHTML="text/html";
    }
	
	/* get setting */
	function get_option($option) 
	{
		$settings = get_option('bup_options');
		if (isset($settings[$option])) 
		{
			return $settings[$option];
			
		}else{
			
		    return '';
		}
		    
	}
	
	public function set_headers() 
	{   			
		//Make Headers aminnistrators
		$header ="MIME-Version: 1.0\n"; 
		$header .= "Content-type: ".$this->mEmailPlainHTML."; charset=UTF-8\n"; 	
		$header .= "From: ".$this->mHeaderSentFromName." <".$this->mHeaderSentFromEmail.">\n";	
		$header .= "Organization: ".$this->mCompanyName." \n";
		$header .=" X-Mailer: PHP/". phpversion()."\n";		
		$this->mHeader = $header;		
    }
	
	
	public function  send ($to, $subject, $message)
	{
		global $bookingultrapro , $phpmailer;
		require_once(ABSPATH . 'wp-includes/formatting.php');		
		
		$message = nl2br($message);
		//check mailing method	
		$bup_emailer = $bookingultrapro->get_option('bup_smtp_mailing_mailer');
		
		if($bup_emailer=='mail' || $bup_emailer=='' ) //use the defaul email function
		{
			wp_mail( $to , $subject, $message, $this->mHeader);
		
		}elseif($bup_emailer=='mandrill' && is_email($to)){ //send email via Mandrill
		
			$this->send_mandrill( $to , $recipient_name, $subject, $message);
		
		}elseif($bup_emailer=='third-party' && is_email($to)){ //send email via Third-Party
		
			if (function_exists('bup_third_party_email_sender')) 
			{
				
				bup_third_party_email_sender($to , $subject, $message);				
				
			}
			
		}elseif($bup_emailer=='smtp' &&  is_email($to)){ //send email via SMTP
		
			// Make sure the PHPMailer class has been instantiated 
			// (copied verbatim from wp-includes/pluggable.php)
			// (Re)create it, if it's gone missing
			if ( !is_object( $phpmailer ) || !is_a( $phpmailer, 'PHPMailer' ) ) {
				require_once ABSPATH . WPINC . '/class-phpmailer.php';
				require_once ABSPATH . WPINC . '/class-smtp.php';
				$phpmailer = new PHPMailer( true );
			}
			
			
			// Empty out the values that may be set
			$phpmailer->ClearAddresses();
			$phpmailer->ClearAllRecipients();
			$phpmailer->ClearAttachments();
			$phpmailer->ClearBCCs();			
			
			// Set the mailer type as per config above, this overrides the already called isMail method
			$phpmailer->Mailer = $bup_emailer;
						
			$phpmailer->From     = $bookingultrapro->get_option('messaging_send_from_email');
			$phpmailer->FromName =  $bookingultrapro->get_option('messaging_send_from_name');
			
			//Set the subject line
			$phpmailer->Subject = $subject;			
			$phpmailer->CharSet     = 'UTF-8';
			
			//Set who the message is to be sent from
			//$phpmailer->SetFrom($phpmailer->FromName, $phpmailer->From);
			
			//Read an HTML message body from an external file, convert referenced images to embedded, convert HTML into a basic plain-text alternative body
			
			
			// Set the Sender (return-path) if required
			if ($bookingultrapro->get_option('bup_smtp_mailing_return_path')=='1')
				$phpmailer->Sender = $phpmailer->From; 
			
			// Set the SMTPSecure value, if set to none, leave this blank
			$uultra_encryption = $bookingultrapro->get_option('bup_smtp_mailing_encrytion');
			$phpmailer->SMTPSecure = $uultra_encryption == 'none' ? '' : $uultra_encryption;
			
			// If we're sending via SMTP, set the host
			if ($bup_emailer == "smtp")
			{				
				// Set the SMTPSecure value, if set to none, leave this blank
				$phpmailer->SMTPSecure = $uultra_encryption == 'none' ? '' : $uultra_encryption;
				
				// Set the other options
				$phpmailer->Host = $bookingultrapro->get_option('bup_smtp_mailing_host');
				$phpmailer->Port = $bookingultrapro->get_option('bup_smtp_mailing_port');
				
				// If we're using smtp auth, set the username & password
				if ($bookingultrapro->get_option('bup_smtp_mailing_authentication') == "true") 
				{
					$phpmailer->SMTPAuth = TRUE;
					$phpmailer->Username = $bookingultrapro->get_option('bup_smtp_mailing_username');
					$phpmailer->Password = $bookingultrapro->get_option('bup_smtp_mailing_password');
				}
				
			}
			
			//html plain text			
			$phpmailer->IsHTML(true);	
			$phpmailer->MsgHTML($message);
			
			
			//Set who the message is to be sent to
			$phpmailer->AddAddress($to);
			
			//Send the message, check for errors
			if(!$phpmailer->Send()) {
			  echo "Mailer Error: " . $phpmailer->ErrorInfo;
			} else {
			  //echo "Message sent!";
			}

		
		}
		
		
		
	}
	
	public function  send_mandrill ($to, $recipient_name, $subject, $message_html)
	{
		global $bookingultrapro , $phpmailer;
		require_once(bookingup_path."libs/mandrill/Mandrill.php");
		
		$from_email     = $bookingultrapro->get_option('messaging_send_from_email');
		$from_name =  $bookingultrapro->get_option('messaging_send_from_name');
		$api_key =  $bookingultrapro->get_option('bup_mandrill_api_key');
		
					
		$text_html =  $message_html;
		$text_txt =  "";
			
		
		try {
				$mandrill = new Mandrill($api_key);
				$message = array(
					'html' => $text_html,
					'text' => $text_txt,
					'subject' => $subject,
					'from_email' => $from_email,
					'from_name' => $from_name,
					'to' => array(
						array(
							'email' => $to,
							'name' => $recipient_name,
							'type' => 'to'
						)
					),
					'headers' => array('Reply-To' => $from_email, 'Content-type' => $this->mEmailPlainHTML),
					'important' => false,
					'track_opens' => null,
					'track_clicks' => null,
					'auto_text' => null,
					'auto_html' => null,
					'inline_css' => null,
					'url_strip_qs' => null,
					'preserve_recipients' => null,
					'view_content_link' => null,
					/*'bcc_address' => 'message.bcc_address@example.com',*/
					'tracking_domain' => null,
					'signing_domain' => null,
					'return_path_domain' => null
					/*'merge' => true,
					'global_merge_vars' => array(
						array(
							'name' => 'merge1',
							'content' => 'merge1 content'
						)
					),
					
					
					/*'google_analytics_domains' => array('example.com'),
					'google_analytics_campaign' => 'message.from_email@example.com',
					'metadata' => array('website' => 'www.example.com'),*/
					
				);
				$async = false;
				$ip_pool = 'Main Pool';
				$send_at = date("Y-m-d H:i:s");
				//$result = $mandrill->messages->send($message, $async, $ip_pool, $send_at);
				$result = $mandrill->messages->send($message, $async);
				//print_r($result);
				
			} catch(Mandrill_Error $e) {
				// Mandrill errors are thrown as exceptions
				echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
				// A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
				throw $e;
			}
	}
	
	//--- Parse Custom Fields
	public function  parse_custom_fields($content, $appointment )
	{
		global $bookingultrapro, $bupcomplement;
		
		if(isset($bupcomplement))
		{
			
			preg_match_all("/\[([^\]]*)\]/", $content, $matches);
			$results = $matches[1];			
			$custom_fields_col = array();
			
			foreach ($results as $field){
				
				//clean field
				$clean_field = str_replace("BUP_CUSTOM_", "", $field);
				$custom_fields_col[] = $clean_field;
			
			}
			
			foreach ($custom_fields_col as $field)
			{
				//get field data from booking table				
				$field_data = $bookingultrapro->appointment->get_booking_meta($appointment->booking_id, $field);
				//replace data in template				
				$content = str_replace("[BUP_CUSTOM_".$field."]", $field_data, $content);				
							
			}
			
			

			
		}
		
		return $content;
		
	}
	
	
	//--- New Password Backend
	public function  send_new_password_to_user($staff, $password1)
	{
		global $bookingultrapro;
		
		require_once(ABSPATH . 'wp-includes/link-template.php');
		
		$admin_email =get_option('admin_email'); 
		$company_name = $this->get_option('company_name');
		$company_phone = $this->get_option('company_phone');
		
		//get templates	
		$template_client =stripslashes($this->get_option('email_password_change_staff'));
		
		$site_url =site_url("/");
	
		$subject_client = $this->get_option('email_password_change_staff_subject');				
		//client		
		$template_client = str_replace("{{bup_staff_name}}", $staff->display_name,  $template_client);	
		$template_client = str_replace("{{bup_company_name}}", $company_name,  $template_client);
		$template_client = str_replace("{{bup_company_phone}}", $company_phone,  $template_client);
		$template_client = str_replace("{{bup_company_url}}", $site_url,  $template_client);										
		//send to client
		$this->send($staff->user_email, $subject_client, $template_client);
		
		
	}
	
	//--- Bank Payment
	public function  send_payment_confirmed_bank_cart($staff_member, $client, $service, $appointment, $order )
	{
		global $bookingultrapro;
		
		require_once(ABSPATH . 'wp-includes/link-template.php');
		
		$admin_email =get_option('admin_email'); 
		$company_name = $this->get_option('company_name');
		$company_phone = $this->get_option('company_phone');
		$currency = $this->get_option('currency_symbol');
		
		$time_format = $bookingultrapro->service->get_time_format();		
		$booking_time = date($time_format, strtotime($appointment->booking_time_from ))	;	
			
		$booking_day = $bookingultrapro->commmonmethods->formatDate($appointment->booking_time_from);
		
		
		//get templates	
		$template_admin = stripslashes($this->get_option('email_bank_payment_admin'));
		$template_client =stripslashes($this->get_option('email_bank_payment'));
		
		$site_url =site_url("/");
		
		$appointment_cancel_url =$bookingultrapro->appointment->get_cancel_link_of_appointment($appointment->booking_key, $appointment->booking_id);
		
		$subject_admin = $this->get_option('email_bank_payment_admin_subject');
		$subject_client = $this->get_option('email_bank_payment_subject');
		
		//get meta data		
		$phone = $bookingultrapro->appointment->get_booking_meta($appointment->booking_id, 'telephone');
		$special_notes = $bookingultrapro->appointment->get_booking_meta($appointment->booking_id, 'special_notes');
		
		
		//admin		
		$template_admin = str_replace("{{bup_booking_service}}", $service->service_title,  $template_admin);
				
		$template_admin = str_replace("{{bup_client_name}}", $client->display_name,  $template_admin);
		$template_admin = str_replace("{{bup_client_phone}}", $phone,  $template_admin);
		$template_admin = str_replace("{{bup_client_email}}", $client->user_email,  $template_admin);
		$template_admin = str_replace("{{bup_booking_time}}", $booking_time,  $template_admin);	
		$template_admin = str_replace("{{bup_booking_date}}", $booking_day,  $template_admin);
		$template_admin = str_replace("{{bup_booking_staff}}", $staff_member->display_name,  $template_admin);
		$template_admin = str_replace("{{bup_booking_cost}}", $currency.$order->order_amount,  $template_admin);
		
		$template_admin = str_replace("{{bup_company_name}}", $company_name,  $template_admin);
		$template_admin = str_replace("{{bup_company_phone}}", $company_phone,  $template_admin);
		$template_admin = str_replace("{{bup_company_url}}", $site_url,  $template_admin);
				
		//staff		
		$template_staff = str_replace("{{bup_staff_name}}", $staff_member->display_name,  $template_staff);
		$template_staff = str_replace("{{bup_booking_service}}", $service->service_title,  $template_staff);
		
		$template_staff = str_replace("{{bup_client_name}}", $client->display_name,  $template_staff);
		$template_staff = str_replace("{{bup_client_phone}}", $phone,  $template_staff);
		$template_staff = str_replace("{{bup_client_email}}", $client->user_email,  $template_staff);
		
		$template_staff = str_replace("{{bup_booking_time}}", $booking_time,  $template_staff);	
		$template_staff = str_replace("{{bup_booking_date}}", $booking_day,  $template_staff);
		$template_staff = str_replace("{{bup_booking_staff}}", $staff_member->display_name,  $template_staff);
		$template_staff = str_replace("{{bup_booking_cost}}", $currency.$order->order_amount,  $template_staff);
		
		$template_staff = str_replace("{{bup_company_name}}", $company_name,  $template_staff);
		$template_staff = str_replace("{{bup_company_phone}}", $company_phone,  $template_staff);
		$template_staff = str_replace("{{bup_company_url}}", $site_url,  $template_staff);		
		
		//client		
		$template_client = str_replace("{{bup_client_name}}", $client->display_name,  $template_client);
		$template_client = str_replace("{{bup_client_phone}}", $phone,  $template_client);
		
		$template_client = str_replace("{{bup_booking_service}}", $service->service_title,  $template_client);
		$template_client = str_replace("{{bup_booking_time}}", $booking_time,  $template_client);	
		$template_client = str_replace("{{bup_booking_date}}", $booking_day,  $template_client);
		$template_client = str_replace("{{bup_booking_staff}}", $staff_member->display_name,  $template_client);
		$template_client = str_replace("{{bup_booking_cost}}", $currency.$order->order_amount,  $template_client);
		$template_client = str_replace("{{bup_booking_cancelation_url}}",$appointment_cancel_url,  $template_client);
		
		$template_client = str_replace("{{bup_company_name}}", $company_name,  $template_client);
		$template_client = str_replace("{{bup_company_phone}}", $company_phone,  $template_client);
		$template_client = str_replace("{{bup_company_url}}", $site_url,  $template_client);
		
		//parse custom fields
		$template_client = $this->parse_custom_fields($template_client, $appointment );
		$template_staff = $this->parse_custom_fields($template_staff, $appointment );
		$template_admin = $this->parse_custom_fields($template_admin, $appointment );
								
		if( $this->get_option('bup_noti_client')!='no')
		{	
			//send to client
			$this->send($client->user_email, $subject_client, $template_client);
		
		}
		
		//send to staff member	
		if( $this->get_option('bup_noti_staff')!='no')
		{
			//send to staff member
			$this->send($staff_member->user_email, $subject_staff, $template_staff);
			
		}
		
		if( $this->get_option('bup_noti_admin')!='no')
		{
			//send to admin		
			$this->send($admin_email, $subject_admin, $template_admin);
		
		}
		
					
		
	}
	
	//--- Bank Payment
	public function  send_payment_confirmed_bank($staff_member, $client, $service, $appointment, $order )
	{
		global $bookingultrapro;
		
		require_once(ABSPATH . 'wp-includes/link-template.php');
		
		$admin_email =get_option('admin_email'); 
		$company_name = $this->get_option('company_name');
		$company_phone = $this->get_option('company_phone');
		$currency = $this->get_option('currency_symbol');
		
		$time_format = $bookingultrapro->service->get_time_format();		
		$booking_time = date($time_format, strtotime($appointment->booking_time_from ))	;	
			
		$booking_day = $bookingultrapro->commmonmethods->formatDate($appointment->booking_time_from);
		
		//$bookingultrapro->commmonmethods->formatDate($date_from)
		
		//get templates	
		$template_admin = stripslashes($this->get_option('email_bank_payment_admin'));
		$template_client =stripslashes($this->get_option('email_bank_payment'));
		
		$site_url =site_url("/");
		
		$appointment_cancel_url =$bookingultrapro->appointment->get_cancel_link_of_appointment($appointment->booking_key, $appointment->booking_id);
		
		$subject_admin = $this->get_option('email_bank_payment_admin_subject');
		$subject_client = $this->get_option('email_bank_payment_subject');
		
		//get meta data		
		$phone = $bookingultrapro->appointment->get_booking_meta($appointment->booking_id, 'telephone');
		$special_notes = $bookingultrapro->appointment->get_booking_meta($appointment->booking_id, 'special_notes');
		
		
		//admin		
		$template_admin = str_replace("{{bup_booking_service}}", $service->service_title,  $template_admin);
				
		$template_admin = str_replace("{{bup_client_name}}", $client->display_name,  $template_admin);
		$template_admin = str_replace("{{bup_client_phone}}", $phone,  $template_admin);
		$template_admin = str_replace("{{bup_client_email}}", $client->user_email,  $template_admin);
		$template_admin = str_replace("{{bup_booking_time}}", $booking_time,  $template_admin);	
		$template_admin = str_replace("{{bup_booking_date}}", $booking_day,  $template_admin);
		$template_admin = str_replace("{{bup_booking_staff}}", $staff_member->display_name,  $template_admin);
		$template_admin = str_replace("{{bup_booking_cost}}", $currency.$order->order_amount,  $template_admin);
		
		$template_admin = str_replace("{{bup_company_name}}", $company_name,  $template_admin);
		$template_admin = str_replace("{{bup_company_phone}}", $company_phone,  $template_admin);
		$template_admin = str_replace("{{bup_company_url}}", $site_url,  $template_admin);
				
		//staff		
		$template_staff = str_replace("{{bup_staff_name}}", $staff_member->display_name,  $template_staff);
		$template_staff = str_replace("{{bup_booking_service}}", $service->service_title,  $template_staff);
		
		$template_staff = str_replace("{{bup_client_name}}", $client->display_name,  $template_staff);
		$template_staff = str_replace("{{bup_client_phone}}", $phone,  $template_staff);
		$template_staff = str_replace("{{bup_client_email}}", $client->user_email,  $template_staff);
		
		$template_staff = str_replace("{{bup_booking_time}}", $booking_time,  $template_staff);	
		$template_staff = str_replace("{{bup_booking_date}}", $booking_day,  $template_staff);
		$template_staff = str_replace("{{bup_booking_staff}}", $staff_member->display_name,  $template_staff);
		$template_staff = str_replace("{{bup_booking_cost}}", $currency.$order->order_amount,  $template_staff);
		
		$template_staff = str_replace("{{bup_company_name}}", $company_name,  $template_staff);
		$template_staff = str_replace("{{bup_company_phone}}", $company_phone,  $template_staff);
		$template_staff = str_replace("{{bup_company_url}}", $site_url,  $template_staff);		
		
		//client		
		$template_client = str_replace("{{bup_client_name}}", $client->display_name,  $template_client);
		$template_client = str_replace("{{bup_client_phone}}", $phone,  $template_client);
		
		$template_client = str_replace("{{bup_booking_service}}", $service->service_title,  $template_client);
		$template_client = str_replace("{{bup_booking_time}}", $booking_time,  $template_client);	
		$template_client = str_replace("{{bup_booking_date}}", $booking_day,  $template_client);
		$template_client = str_replace("{{bup_booking_staff}}", $staff_member->display_name,  $template_client);
		$template_client = str_replace("{{bup_booking_cost}}", $currency.$order->order_amount,  $template_client);
		$template_client = str_replace("{{bup_booking_cancelation_url}}",$appointment_cancel_url,  $template_client);
		
		$template_client = str_replace("{{bup_company_name}}", $company_name,  $template_client);
		$template_client = str_replace("{{bup_company_phone}}", $company_phone,  $template_client);
		$template_client = str_replace("{{bup_company_url}}", $site_url,  $template_client);
		
		//parse custom fields
		$template_client = $this->parse_custom_fields($template_client, $appointment );
		$template_staff = $this->parse_custom_fields($template_staff, $appointment );
		$template_admin = $this->parse_custom_fields($template_admin, $appointment );
								
		if( $this->get_option('bup_noti_client')!='no')
		{	
			//send to client
			$this->send($client->user_email, $subject_client, $template_client);
		
		}
		
		//send to staff member	
		if( $this->get_option('bup_noti_staff')!='no')
		{
			//send to staff member
			$this->send($staff_member->user_email, $subject_staff, $template_staff);
			
		}
		
		if( $this->get_option('bup_noti_admin')!='no')
		{
			//send to admin		
			$this->send($admin_email, $subject_admin, $template_admin);
		
		}
		
					
		
	}
	
	//--- Appointment Cancelled 
	public function  send_appointment_status_changed($staff_member, $client, $service, $appointment, $new_status )
	{
		global $bookingultrapro;
		
		require_once(ABSPATH . 'wp-includes/link-template.php');
		
		$admin_email =get_option('admin_email'); 
		$company_name = $this->get_option('company_name');
		$company_phone = $this->get_option('company_phone');
		$currency = $this->get_option('currency_symbol');
		
		$time_format = $bookingultrapro->service->get_time_format();		
		$booking_time = date($time_format, strtotime($appointment->booking_time_from ))	;		
		//$booking_day = date('l, j F, Y', strtotime($appointment->booking_time_from ));
		$booking_day = $bookingultrapro->commmonmethods->formatDate($appointment->booking_time_from);
		
		//get templates	
		$template_admin = stripslashes($this->get_option('email_appo_status_changed_admin'));
		$template_client =stripslashes($this->get_option('email_appo_status_changed_client'));
		$template_staff =stripslashes($this->get_option('email_appo_status_changed_staff'));
		
		$site_url =site_url("/");
		
		$subject_client = $this->get_option('email_appo_status_changed_client_subject');
		$subject_staff = $this->get_option('email_appo_status_changed_staff_subject');
		$subject_admin = $this->get_option('email_appo_status_changed_admin_subject');		
				
		//admin		
		$template_admin = str_replace("{{bup_booking_service}}", $service->service_title, $template_admin);
		$template_admin = str_replace("{{bup_booking_status}}", $new_status,  $template_admin);
		
		
		$template_admin = str_replace("{{bup_booking_time}}", $booking_time,  $template_admin);	
		$template_admin = str_replace("{{bup_booking_date}}", $booking_day,  $template_admin);
		$template_admin = str_replace("{{bup_booking_staff}}", $staff_member->display_name,  $template_admin);		
		
		$template_admin = str_replace("{{bup_company_name}}", $company_name,  $template_admin);
		$template_admin = str_replace("{{bup_company_phone}}", $company_phone,  $template_admin);
		$template_admin = str_replace("{{bup_company_url}}", $site_url,  $template_admin);
				
		//staff		
		$template_staff = str_replace("{{bup_booking_status}}", $new_status,  $template_staff);
		$template_staff = str_replace("{{bup_staff_name}}", $staff_member->display_name,  $template_staff);
		$template_staff = str_replace("{{bup_booking_service}}", $service->service_title,  $template_staff);
		$template_staff = str_replace("{{bup_booking_time}}", $booking_time,  $template_staff);	
		$template_staff = str_replace("{{bup_booking_date}}", $booking_day,  $template_staff);
		$template_staff = str_replace("{{bup_booking_staff}}", $staff_member->display_name,  $template_staff);
				
		$template_staff = str_replace("{{bup_company_name}}", $company_name,  $template_staff);
		$template_staff = str_replace("{{bup_company_phone}}", $company_phone,  $template_staff);
		$template_staff = str_replace("{{bup_company_url}}", $site_url,  $template_staff);		
		
		//client		
		$template_client = str_replace("{{bup_booking_status}}", $new_status,  $template_client);
		$template_client = str_replace("{{bup_client_name}}", $client->display_name,  $template_client);
		$template_client = str_replace("{{bup_booking_service}}", $service->service_title,  $template_client);
		$template_client = str_replace("{{bup_booking_time}}", $booking_time,  $template_client);	
		$template_client = str_replace("{{bup_booking_date}}", $booking_day,  $template_client);
		$template_client = str_replace("{{bup_booking_staff}}", $staff_member->display_name,  $template_client);				
		
		$template_client = str_replace("{{bup_company_name}}", $company_name,  $template_client);
		$template_client = str_replace("{{bup_company_phone}}", $company_phone,  $template_client);
		$template_client = str_replace("{{bup_company_url}}", $site_url,  $template_client);
								
				
		//send to client
		$this->send($client->user_email, $subject_client, $template_client);
		
		//send to staff member
		$this->send($staff_member->user_email, $subject_staff, $template_staff);
		
		//send to admin		
		$this->send($admin_email, $subject_admin, $template_admin);
		
					
		
	}
	
	//--- Payment Confirmed
	public function  send_payment_confirmed($staff_member, $client, $service, $appointment, $order )
	{
		global $bookingultrapro;
		
		require_once(ABSPATH . 'wp-includes/link-template.php');
		
		$admin_email =get_option('admin_email'); 
		$company_name = $this->get_option('company_name');
		$company_phone = $this->get_option('company_phone');
		$currency = $this->get_option('currency_symbol');
		
		$time_format = $bookingultrapro->service->get_time_format();		
		$booking_time = date($time_format, strtotime($appointment->booking_time_from ))	;		
		//$booking_day = date('l, j F, Y', strtotime($appointment->booking_time_from ));
		$booking_day = $bookingultrapro->commmonmethods->formatDate($appointment->booking_time_from);
		
		//get templates	
		$template_admin = stripslashes($this->get_option('email_new_booking_admin'));
		$template_client =stripslashes($this->get_option('email_new_booking_client'));
		$template_staff =stripslashes($this->get_option('email_new_booking_staff'));
		
		$site_url =site_url("/");
		
		$appointment_cancel_url =$bookingultrapro->appointment->get_cancel_link_of_appointment($appointment->booking_key, $appointment->booking_id);
		
		$allow_cancellation = false;
		if( $this->get_option('appointment_cancellation_active')==1){$allow_cancellation = true;}
		
		$subject_client = $this->get_option('email_new_booking_subject_client');
		$subject_staff = $this->get_option('email_new_booking_subject_staff');
		$subject_admin = $this->get_option('email_new_booking_subject_admin');
		
		if($order->order_amount!=0 && $order->order_amount!=''){$amount = $order->order_amount; }else{$amount = 0;}
		
		//get meta data		
		$phone = $bookingultrapro->appointment->get_booking_meta($appointment->booking_id, 'telephone');
		$special_notes = $bookingultrapro->appointment->get_booking_meta($appointment->booking_id, 'special_notes');
		
		//admin		
		$template_admin = str_replace("{{bup_booking_service}}", $service->service_title,  $template_admin);
		$template_admin = str_replace("{{bup_client_name}}", $client->display_name,  $template_admin);
		$template_admin = str_replace("{{bup_client_phone}}", $phone,  $template_admin);
		$template_admin = str_replace("{{bup_client_email}}", $client->user_email,  $template_admin);
		$template_admin = str_replace("{{bup_booking_time}}", $booking_time,  $template_admin);	
		$template_admin = str_replace("{{bup_booking_date}}", $booking_day,  $template_admin);
		$template_admin = str_replace("{{bup_booking_staff}}", $staff_member->display_name,  $template_admin);
		$template_admin = str_replace("{{bup_booking_cost}}", $currency.$amount,  $template_admin);
		
		$template_admin = str_replace("{{bup_company_name}}", $company_name,  $template_admin);
		$template_admin = str_replace("{{bup_company_phone}}", $company_phone,  $template_admin);
		$template_admin = str_replace("{{bup_company_url}}", $site_url,  $template_admin);
				
		//staff		
		$template_staff = str_replace("{{bup_staff_name}}", $staff_member->display_name,  $template_staff);
		$template_staff = str_replace("{{bup_booking_service}}", $service->service_title,  $template_staff);
		$template_staff = str_replace("{{bup_client_name}}", $client->display_name,  $template_staff);
		$template_staff = str_replace("{{bup_client_phone}}", $phone,  $template_staff);
		$template_staff = str_replace("{{bup_client_email}}", $client->user_email,  $template_staff);
		$template_staff = str_replace("{{bup_booking_time}}", $booking_time,  $template_staff);	
		$template_staff = str_replace("{{bup_booking_date}}", $booking_day,  $template_staff);
		$template_staff = str_replace("{{bup_booking_staff}}", $staff_member->display_name,  $template_staff);
		$template_staff = str_replace("{{bup_booking_cost}}", $currency.$amount,  $template_staff);
		
		$template_staff = str_replace("{{bup_company_name}}", $company_name,  $template_staff);
		$template_staff = str_replace("{{bup_company_phone}}", $company_phone,  $template_staff);
		$template_staff = str_replace("{{bup_company_url}}", $site_url,  $template_staff);		
		
		//client		
		$template_client = str_replace("{{bup_client_name}}", $client->display_name,  $template_client);
		$template_client = str_replace("{{bup_client_phone}}", $phone,  $template_client);
		$template_client = str_replace("{{bup_booking_service}}", $service->service_title,  $template_client);
		$template_client = str_replace("{{bup_booking_time}}", $booking_time,  $template_client);	
		$template_client = str_replace("{{bup_booking_date}}", $booking_day,  $template_client);
		$template_client = str_replace("{{bup_booking_staff}}", $staff_member->display_name,  $template_client);
		$template_client = str_replace("{{bup_booking_cost}}", $currency.$amount,  $template_client);
		
		//if($allow_cancellation)
		//{
			
			$template_client = str_replace("{{bup_booking_cancelation_url}}",$appointment_cancel_url,  $template_client);
		
		//}
		
		$template_client = str_replace("{{bup_company_name}}", $company_name,  $template_client);
		$template_client = str_replace("{{bup_company_phone}}", $company_phone,  $template_client);
		$template_client = str_replace("{{bup_company_url}}", $site_url,  $template_client);
		
		
		//parse custom fields
		$template_client = $this->parse_custom_fields($template_client, $appointment );
		$template_staff = $this->parse_custom_fields($template_staff, $appointment );
		$template_admin = $this->parse_custom_fields($template_admin, $appointment );
								
		
		if( $this->get_option('bup_noti_client')!='no')
		{		
			//send to client
			$this->send($client->user_email, $subject_client, $template_client);
			
		}		
		
		if( $this->get_option('bup_noti_staff')!='no')
		{
			//send to staff member
			$this->send($staff_member->user_email, $subject_staff, $template_staff);
			
		}		
		
		if( $this->get_option('bup_noti_admin')!='no')
		{
		
			//send to admin		
			$this->send($admin_email, $subject_admin, $template_admin);
		
		}
		
					
		
	}
	
	//--- Notify Booking on Admin
	public function  send_booking_notification_on_admin($staff_member, $client, $service, $appointment, $order, $bup_notify_client )
	{
		global $bookingultrapro;
		
		require_once(ABSPATH . 'wp-includes/link-template.php');
		
		$admin_email =get_option('admin_email'); 
		$company_name = $this->get_option('company_name');
		$company_phone = $this->get_option('company_phone');
		$currency = $this->get_option('currency_symbol');
		
		$time_format = $bookingultrapro->service->get_time_format();		
		$booking_time = date($time_format, strtotime($appointment->booking_time_from ))	;		
		//$booking_day = date('l, j F, Y', strtotime($appointment->booking_time_from ));
		$booking_day = $bookingultrapro->commmonmethods->formatDate($appointment->booking_time_from);
		
		//get templates	
		$template_admin = stripslashes($this->get_option('email_new_booking_admin'));
		$template_client =stripslashes($this->get_option('email_new_booking_client'));
		$template_staff =stripslashes($this->get_option('email_new_booking_staff'));
		
		$site_url =site_url("/");
		
		$appointment_cancel_url =$bookingultrapro->appointment->get_cancel_link_of_appointment($appointment->booking_key, $appointment->booking_id);
		
		$allow_cancellation = false;
		if( $this->get_option('appointment_cancellation_active')==1){$allow_cancellation = true;}
		
		$subject_client = $this->get_option('email_new_booking_subject_client');
		$subject_staff = $this->get_option('email_new_booking_subject_staff');
		$subject_admin = $this->get_option('email_new_booking_subject_admin');
		
		//get meta data		
		$phone = $bookingultrapro->appointment->get_booking_meta($appointment->booking_id, 'telephone');
		$special_notes = $bookingultrapro->appointment->get_booking_meta($appointment->booking_id, 'special_notes');
		
		
		//admin		
		$template_admin = str_replace("{{bup_booking_service}}", $service->service_title,  $template_admin);
		$template_admin = str_replace("{{bup_client_name}}", $client->display_name,  $template_admin);
		$template_admin = str_replace("{{bup_client_phone}}", $phone,  $template_admin);
		$template_admin = str_replace("{{bup_client_email}}", $client->user_email,  $template_admin);
		$template_admin = str_replace("{{bup_booking_time}}", $booking_time,  $template_admin);	
		$template_admin = str_replace("{{bup_booking_date}}", $booking_day,  $template_admin);
		$template_admin = str_replace("{{bup_booking_staff}}", $staff_member->display_name,  $template_admin);
		$template_admin = str_replace("{{bup_booking_cost}}", $currency.$order->order_amount,  $template_admin);
		
		$template_admin = str_replace("{{bup_company_name}}", $company_name,  $template_admin);
		$template_admin = str_replace("{{bup_company_phone}}", $company_phone,  $template_admin);
		$template_admin = str_replace("{{bup_company_url}}", $site_url,  $template_admin);
				
		//staff		
		$template_staff = str_replace("{{bup_staff_name}}", $staff_member->display_name,  $template_staff);
		$template_staff = str_replace("{{bup_booking_service}}", $service->service_title,  $template_staff);
		$template_staff = str_replace("{{bup_client_name}}", $client->display_name,  $template_staff);
		$template_staff = str_replace("{{bup_client_phone}}", $phone,  $template_staff);
		$template_staff = str_replace("{{bup_client_email}}", $client->user_email,  $template_staff);
		$template_staff = str_replace("{{bup_booking_time}}", $booking_time,  $template_staff);	
		$template_staff = str_replace("{{bup_booking_date}}", $booking_day,  $template_staff);
		$template_staff = str_replace("{{bup_booking_staff}}", $staff_member->display_name,  $template_staff);
		$template_staff = str_replace("{{bup_booking_cost}}", $currency.$order->order_amount,  $template_staff);
		
		$template_staff = str_replace("{{bup_company_name}}", $company_name,  $template_staff);
		$template_staff = str_replace("{{bup_company_phone}}", $company_phone,  $template_staff);
		$template_staff = str_replace("{{bup_company_url}}", $site_url,  $template_staff);		
		
		//client		
		$template_client = str_replace("{{bup_client_name}}", $client->display_name,  $template_client);
		$template_client = str_replace("{{bup_client_phone}}", $phone,  $template_client);
		$template_client = str_replace("{{bup_booking_service}}", $service->service_title,  $template_client);
		$template_client = str_replace("{{bup_booking_time}}", $booking_time,  $template_client);	
		$template_client = str_replace("{{bup_booking_date}}", $booking_day,  $template_client);
		$template_client = str_replace("{{bup_booking_staff}}", $staff_member->display_name,  $template_client);
		$template_client = str_replace("{{bup_booking_cost}}", $currency.$order->order_amount,  $template_client);
		
		//if($allow_cancellation)
		//{			
			$template_client = str_replace("{{bup_booking_cancelation_url}}",$appointment_cancel_url,  $template_client);
		
		//}
		
		$template_client = str_replace("{{bup_company_name}}", $company_name,  $template_client);
		$template_client = str_replace("{{bup_company_phone}}", $company_phone,  $template_client);
		$template_client = str_replace("{{bup_company_url}}", $site_url,  $template_client);
		
		
		//parse custom fields
		$template_client = $this->parse_custom_fields($template_client, $appointment );
		$template_staff = $this->parse_custom_fields($template_staff, $appointment );
		$template_admin = $this->parse_custom_fields($template_admin, $appointment );
								
		if($bup_notify_client=='1')	
		{
			//send to client
			$this->send($client->user_email, $subject_client, $template_client);
		
		
		}	
		
		//send to staff member
		$this->send($staff_member->user_email, $subject_staff, $template_staff);
		
		//send to admin		
		$this->send($admin_email, $subject_admin, $template_admin);
					
		
	}
	
	public function  send_reschedule_notification_on_admin($staff_member, $client, $service, $appointment,  $bup_notify_client_reschedule )
	{
		global $bookingultrapro;
		
		require_once(ABSPATH . 'wp-includes/link-template.php');
		
		$admin_email =get_option('admin_email'); 
		$company_name = $this->get_option('company_name');
		$company_phone = $this->get_option('company_phone');
		$currency = $this->get_option('currency_symbol');
		
		$time_format = $bookingultrapro->service->get_time_format();		
		$booking_time = date($time_format, strtotime($appointment->booking_time_from ))	;		
		//$booking_day = date('l, j F, Y', strtotime($appointment->booking_time_from ));
		$booking_day = $bookingultrapro->commmonmethods->formatDate($appointment->booking_time_from);
		
		//get templates	
		$template_admin = stripslashes($this->get_option('email_reschedule_admin'));
		$template_client =stripslashes($this->get_option('email_reschedule'));
		$template_staff =stripslashes($this->get_option('email_reschedule_staff'));
		
		$site_url =site_url("/");
		
		$appointment_cancel_url =$bookingultrapro->appointment->get_cancel_link_of_appointment($appointment->booking_key, $appointment->booking_id);
		
		$subject_client = $this->get_option('email_reschedule_subject');
		$subject_staff = $this->get_option('email_reschedule_subject_staff');
		$subject_admin = $this->get_option('email_reschedule_subject_admin');
		
		//admin		
		$template_admin = str_replace("{{bup_client_name}}", $client->display_name,  $template_admin);
		$template_admin = str_replace("{{bup_booking_service}}", $service->service_title,  $template_admin);
		$template_admin = str_replace("{{bup_booking_time}}", $booking_time,  $template_admin);	
		$template_admin = str_replace("{{bup_booking_date}}", $booking_day,  $template_admin);
		$template_admin = str_replace("{{bup_booking_staff}}", $staff_member->display_name,  $template_admin);
		$template_admin = str_replace("{{bup_booking_cost}}", $currency.$appointment->booking_amount,  $template_admin);
		
		$template_admin = str_replace("{{bup_company_name}}", $company_name,  $template_admin);
		$template_admin = str_replace("{{bup_company_phone}}", $company_phone,  $template_admin);
		$template_admin = str_replace("{{bup_company_url}}", $site_url,  $template_admin);
				
		//staff		
		
		$template_staff = str_replace("{{bup_staff_name}}", $staff_member->display_name,  $template_staff);
		$template_staff = str_replace("{{bup_staff_name}}", $staff_member->display_name,  $template_staff);
		$template_staff = str_replace("{{bup_booking_service}}", $service->service_title,  $template_staff);
		$template_staff = str_replace("{{bup_booking_time}}", $booking_time,  $template_staff);	
		$template_staff = str_replace("{{bup_booking_date}}", $booking_day,  $template_staff);
		$template_staff = str_replace("{{bup_booking_staff}}", $staff_member->display_name,  $template_staff);
		$template_staff = str_replace("{{bup_booking_cost}}", $currency.$appointment->booking_amount,  $template_staff);
		
		$template_staff = str_replace("{{bup_company_name}}", $company_name,  $template_staff);
		$template_staff = str_replace("{{bup_company_phone}}", $company_phone,  $template_staff);
		$template_staff = str_replace("{{bup_company_url}}", $site_url,  $template_staff);		
		
		//client		
		$template_client = str_replace("{{bup_client_name}}", $client->display_name,  $template_client);
		$template_client = str_replace("{{bup_booking_service}}", $service->service_title,  $template_client);
		$template_client = str_replace("{{bup_booking_time}}", $booking_time,  $template_client);	
		$template_client = str_replace("{{bup_booking_date}}", $booking_day,  $template_client);
		$template_client = str_replace("{{bup_booking_staff}}", $staff_member->display_name,  $template_client);
		$template_client = str_replace("{{bup_booking_cost}}", $currency.$appointment->booking_amount,  $template_client);
		//$template_client = str_replace("{{bup_booking_cancelation_url}}",$appointment_cancel_url,  $template_client);
		
		$template_client = str_replace("{{bup_company_name}}", $company_name,  $template_client);
		$template_client = str_replace("{{bup_company_phone}}", $company_phone,  $template_client);
		$template_client = str_replace("{{bup_company_url}}", $site_url,  $template_client);
								
		if($bup_notify_client_reschedule=='1')	
		{
			//send to client
			$this->send($client->user_email, $subject_client, $template_client);		
		}	
		
		//send to staff member
		$this->send($staff_member->user_email, $subject_staff, $template_staff);
		
		//send to admin		
		$this->send($admin_email, $subject_admin, $template_admin);
					
		
	}
	
	
	
	
	
	public function  paypal_ipn_debug( $message)
	{
		global $bookingultrapro;
		require_once(ABSPATH . 'wp-includes/link-template.php');		
		$admin_email =get_option('admin_email'); 	
		
		
		$this->send($admin_email, "IPN notification", $message);
					
		
	}
	
	
	

}
$key = "messaging";
$this->{$key} = new BookingUltraProMessaging();