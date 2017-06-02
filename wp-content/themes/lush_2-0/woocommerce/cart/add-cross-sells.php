<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



//if ( !function_exists( 'woocommerce_cross_sell_display' ) ) { 
//    require_once '/includes/wc-template-functions.php'; 
//} 
  
// The posts per page. 
$posts_per_page = 100; 
  
// The columns. 
$columns = 2; 
  
// (default: 'rand') 
$orderby = 'rand'; 
  
// NOTICE! Understand what this does before running. 
$result = woocommerce_cross_sell_display($posts_per_page, $columns); 
