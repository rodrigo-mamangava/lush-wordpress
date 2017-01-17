<?php
global $bookingultrapro;
	
?>

 <div class="bup-sect bup-welcome-panel ">
        
        <h3><?php _e('Validate your copy','bookingup'); ?></h3>
        <p><?php _e("Please fill out the form below with the serial number generated when you registered your domain through your account at BookingUltraPro.com",'bookingup'); ?></p>
        
        <p> <?php _e('INPUT YOUR SERIAL KEY','bookingup'); ?></p>
         <p><input type="text" name="p_serial" id="p_serial" style="width:200px" /></p>
        
        
        <p class="submit">
	<input type="submit" name="submit" id="bupadmin-btn-validate-copy" class="button button-primary " value="<?php _e('CLICK HERE TO VALIDATE YOUR COPY','bookingup'); ?>"  /> &nbsp; <span id="loading-animation">  <img src="<?php echo bookingup_url?>admin/images/loaderB16.gif" width="16" height="16" /> &nbsp; <?php _e('Please wait ...','bookingup'); ?> </span>
	
       </p>
       
       <p id='bup-validation-results'>
       
       </p>
                     
       
    
</div>  

