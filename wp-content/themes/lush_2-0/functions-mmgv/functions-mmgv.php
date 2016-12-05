<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Debugar a funcao com pre e var_dump
 * @param type $var
 */
function debug($var) {
    echo '<pre>';
    echo var_dump($var);
    echo '<pre>';
}


function uri() {
    echo get_template_directory_uri();
}

add_image_size('carousel-suite', 832, 528, true);
add_image_size('loop-simples', 593, 256, true);



