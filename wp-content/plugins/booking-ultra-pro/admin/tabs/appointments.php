<?php
global $bookingultrapro , $bup_filter, $bupultimate, $bupcomplement;
$currency_symbol =  $bookingultrapro->get_option('paid_membership_symbol');
$date_format =  $bookingultrapro->get_int_date_format();
$time_format =  $bookingultrapro->service->get_time_format();

$appointments = $bookingultrapro->appointment->get_all();

$pending = $bookingultrapro->appointment->get_appointments_total_by_status(0);
$cancelled = $bookingultrapro->appointment->get_appointments_total_by_status(2);
$noshow = $bookingultrapro->appointment->get_appointments_total_by_status(3);
$unpaid = $bookingultrapro->order->get_orders_by_status('pending');

$allappo = $bookingultrapro->appointment->get_appointments_planing_total('all');




$howmany = "";
$year = "";
$month = "";
$day = "";
$special_filter = "";
$bup_staff_calendar = "";

if(isset($_GET["howmany"]))
{
	$howmany = $_GET["howmany"];		
}

if(isset($_GET["month"]))
{
	$month = $_GET["month"];		
}

if(isset($_GET["day"]))
{
	$day = $_GET["day"];		
}

if(isset($_GET["year"]))
{
	$year = $_GET["year"];		
}

if(isset($_GET["special_filter"]))
{
	$special_filter = $_GET["special_filter"];		
}
if(isset($_GET["bup-staff-calendar"]))
{
	$bup_staff_calendar = $_GET["bup-staff-calendar"];		
}


		
?>

        
       <div class="bup-sect bup-welcome-panel">
        
        <h3 class="appointment"><?php _e('Appointments','bookingup'); ?>(<?php echo $bookingultrapro->appointment->total_result;?>)</h3>
        
        
        <span class="bup-add-appo"><a href="#" id="bup-create-new-app" title="<?php _e('Add New Appointment ','bookingup'); ?>"><i class="fa fa-plus"></i></a></span>
        
       
       
        <form action="" method="get">
         <input type="hidden" name="page" value="bookingultra" />
          <input type="hidden" name="tab" value="appointments" />
        
        <div class="bup-ultra-success bup-notification"><?php _e('Success ','bookingup'); ?></div>
        
        
         <div class="bup-appointments-module-stats">
         
         	<ul>
            
             <li class="pending"><h3><?php _e('Pending','bookingup')?></h3><p class="totalstats"><?php echo $pending ?></p></li>
                <li class="cancelled"><h3><?php _e('Cancelled','bookingup')?></h3><p class="totalstats"><?php echo $cancelled ?></p></li>
                
                <li class="noshow"><h3><?php _e('No-Show','bookingup')?></h3><p class="totalstats"><?php echo $noshow ?></p> </li>
                
                <li class="total"><h3><?php _e('Total','bookingup')?></h3><p class="totalstats"><?php echo$allappo ?></p></li>
            
            </ul>
         
         
         </div>
         
         <div class="bup-appointments-module-filters">
         
              <select name="month" id="month">
               <option value="" selected="selected"><?php _e('All Months','bookingup'); ?></option>
               <?php
			  
			  $i = 1;
              
			  while($i <=12){
			  ?>
               <option value="<?php echo $i?>"  <?php if($i==$month) echo 'selected="selected"';?>><?php echo $i?></option>
               <?php 
			    $i++;
			   }?>
             </select>
             
             <select name="day" id="day">
               <option value="" selected="selected"><?php _e('All Days','bookingup'); ?></option>
               <?php
			  
			  $i = 1;
              
			  while($i <=31){
			  ?>
               <option value="<?php echo $i?>"  <?php if($i==$day) echo 'selected="selected"';?>><?php echo $i?></option>
               <?php 
			    $i++;
			   }?>
             </select>
             
             <select name="year" id="year">
               <option value="" selected="selected"><?php _e('All Years','bookingup'); ?></option>
               <?php
			  
			  $i = 2014;
              
			  while($i <=2020){
			  ?>
               <option value="<?php echo $i?>" <?php if($i==$year) echo 'selected="selected"';?> ><?php echo $i?></option>
               <?php 
			    $i++;
			   }?>
             </select>
                
                        <?php if(isset($bupcomplement) && isset($bupultimate)){?>
            <select name="special_filter" id="special_filter">
               <option value="" selected="selected"><?php _e('All Locations','bookingup'); ?></option>
               <?php
			  
			  $filters = $bup_filter->get_all();
              
			 foreach ( $filters as $filter )
				{
			  ?>
               <option value="<?php echo $filter->filter_id?>" <?php if($special_filter==$filter->filter_id) echo 'selected="selected"';?> ><?php echo $filter->filter_name?></option>
               <?php 
			    $i++;
			   }?>
             </select>
             
            <?php  }?>        
                       <?php echo $bookingultrapro->userpanel->get_staff_list_calendar_filter();?> 
                       
                       <select name="howmany" id="howmany">
               <option value="20" <?php if(20==$howmany ||$howmany =="" ) echo 'selected="selected"';?>>20 <?php _e('Per Page','bookingup'); ?></option>
                <option value="40" <?php if(40==$howmany ) echo 'selected="selected"';?>>40 <?php _e('Per Page','bookingup'); ?></option>
                 <option value="50" <?php if(50==$howmany ) echo 'selected="selected"';?>>50 <?php _e('Per Page','bookingup'); ?></option>
                  <option value="80" <?php if(80==$howmany ) echo 'selected="selected"';?>>80 <?php _e('Per Page','bookingup'); ?></option>
                   <option value="100" <?php if(100==$howmany ) echo 'selected="selected"';?>>100 <?php _e('Per Page','bookingup'); ?></option>
               
          </select>
          
                       <button name="bup-btn-calendar-filter-appo" id="bup-btn-calendar-filter-appo" class="bup-button-submit-changes"><?php _e('Filter','bookingup')?>	</button>
                </div>  
                
                
            
        
        
         </form>
         
                 
         
         </div>
         
         
         <div class="bup-sect bup-welcome-panel">
        
         <?php
			
			
				
				if (!empty($appointments)){
				
				
				?>
       
           <table width="100%" class="wp-list-table widefat fixed posts table-generic">
            <thead>
                <tr>
                    <th width="4%"><?php _e('#', 'bookingup'); ?></th>
                    <th width="4%">&nbsp;</th>
                    
                     <th width="13%"><?php _e('Date', 'bookingup'); ?></th>
                     
                     <?php if(isset($bup_filter) && isset($bupultimate)){?>
                     
                      <th width="11%"><?php _e('Location', 'bookingup'); ?></th>
                     
                     <?php	} ?>
                    
                    <th width="23%"><?php _e('Client', 'bookingup'); ?></th>
                    <th width="23%"><?php _e('Phone Number', 'bookingup'); ?></th>
                    <th width="23%"><?php _e('Provider', 'bookingup'); ?></th>
                     <th width="18%"><?php _e('Service', 'bookingup'); ?></th>
                    <th width="16%"><?php _e('At', 'bookingup'); ?></th>
                    
                     
                     <th width="9%"><?php _e('Status', 'bookingup'); ?></th>
                    <th width="9%"><?php _e('Actions', 'bookingup'); ?></th>
                </tr>
            </thead>
            
            <tbody>
            
            <?php 
			$filter_name= '';
			$phone= '';
			foreach($appointments as $appointment) {
				
				
				$date_from=  date("Y-m-d", strtotime($appointment->booking_time_from));
				$booking_time = date($time_format, strtotime($appointment->booking_time_from ))	.' - '.date($time_format, strtotime($appointment->booking_time_to ));
				 
				$staff = $bookingultrapro->userpanel->get_staff_member($appointment->booking_staff_id);
				
				$client_id = $appointment->booking_user_id;				
				$client = get_user_by( 'id', $client_id );
				if(isset($appointment->filter_name)){$filter_name=$appointment->filter_name;};
				
				//get phone
			
				$phone = $bookingultrapro->appointment->get_booking_meta($appointment->booking_id, 'telephone');
				
				$comments = $bookingultrapro->appointment->get_booking_meta($appointment->booking_id, 'special_notes');
				
				
					
			?>
              

                <tr>
                    <td><?php echo $appointment->booking_id; ?></td>
                     <td>  <?php if($comments!=''){?><a href="#" class="bup-appointment-edit-module" appointment-id="<?php echo $appointment->booking_id?>" title="<?php _e('See Details','bookingup'); ?>"><i class="fa fa-envelope-o"></i></a> <?php }?></td>
                   
                     <td><?php echo  date($date_format, strtotime($date_from)); ?>      </td> 
                     
                      <?php if(isset($bup_filter) && isset($bupultimate)){?>
                      
                      <td><?php echo $filter_name; ?> </td>
                       <?php	} ?>
                      
                    <td><?php echo $client->display_name; ?> (<?php echo $client->user_email; ?>)</td>
                    <td><?php echo $phone; ?></td>
                    <td><?php echo $staff->display_name; ?></td>
                    <td><?php echo $appointment->service_title; ?> </td>
                    <td><?php echo  $booking_time; ?></td>                  
                     
                      <td><?php echo $bookingultrapro->appointment->get_status_legend($appointment->booking_status); ?></td>
                   <td> <a href="#" class="bup-appointment-edit-module" appointment-id="<?php echo $appointment->booking_id?>" title="<?php _e('Edit','bookingup'); ?>"><i class="fa fa-edit"></i></a>&nbsp;<a href="#" class="bup-appointment-delete-module" appointment-id="<?php echo $appointment->booking_id?>" title="<?php _e('Delete','bookingup'); ?>"><i class="fa fa-trash-o"></i></a></td>
                </tr>
                
                
                <?php
					}
					
					} else {
			?>
			<p><?php _e('There are no appointments yet.','bookingup'); ?></p>
			<?php	} ?>

            </tbody>
        </table>
        
        
        </div>
        
           
    <div id="bup-spinner" class="bup-spinner" style="display:">
            <span> <img src="<?php echo bookingup_url?>admin/images/loaderB16.gif" width="16" height="16" /></span>&nbsp; <?php echo __('Please wait ...','bookingup')?>
	</div>
        
         <div id="bup-appointment-new-box" title="<?php _e('Create New Appointment','bookingup')?>"></div>
     <div id="bup-appointment-edit-box" title="<?php _e('Edit Appointment','bookingup')?>"></div>     
     <div id="bup-new-app-conf-message" title="<?php _e('Appointment Created','bookingup')?>"></div> 
     <div id="bup-new-payment-cont" title="<?php _e('Add Payment','bookingup')?>"></div>
     <div id="bup-confirmation-cont" title="<?php _e('Confirmation','bookingup')?>"></div>
     <div id="bup-new-note-cont" title="<?php _e('Add Note','bookingup')?>"></div>     
     <div id="bup-appointment-list" title="<?php _e('Pending Appointments','bookingup')?>"></div>
      <div id="bup-appointment-change-status" title="<?php _e('Appointment Status','bookingup')?>"></div>
      
      <div id="bup-client-new-box" title="<?php _e('Create New Client','bookingup')?>"></div>
               
     <script type="text/javascript">
	
			var err_message_payment_date ="<?php _e('Please select a payment date.','bookingup'); ?>";
			var err_message_payment_amount="<?php _e('Please input an amount','bookingup'); ?>"; 
			var err_message_payment_delete="<?php _e('Are you totally sure that you want to delete this payment?','bookingup'); ?>"; 
			
			var err_message_note_title ="<?php _e('Please input a title.','bookingup'); ?>";
			var err_message_note_text="<?php _e('Please input some text','bookingup'); ?>";
			var err_message_note_delete="<?php _e('Are you totally sure that you want to delete this note?','bookingup'); ?>"; 
			
			
			var gen_message_rescheduled_conf="<?php _e('The appointment has been rescheduled.','bookingup'); ?>"; 
			var gen_message_infoupdate_conf="<?php _e('The information has been updated.','bookingup'); ?>"; 
	
		     var err_message_start_date ="<?php _e('Please select a date.','bookingup'); ?>";
			 var err_message_service ="<?php _e('Please select a service.','bookingup'); ?>"; 
		     var err_message_time_slot ="<?php _e('Please select a time.','bookingup'); ?>";
			 var err_message_client ="<?php _e('Please select a client.','bookingup'); ?>";
			 var message_wait_availability ='<img src="<?php echo bookingup_url?>admin/images/loaderB16.gif" width="16" height="16" /></span>&nbsp; <?php echo __("Please wait ...","bookingup")?>'; 
			 
			 jQuery("#bup-spinner").hide();	
			  
		
	</script>
 
        
