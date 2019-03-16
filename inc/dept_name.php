<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function get_dept_name($dept_id){
     $dept_name = '';
    if($dept_id == 1){
        $dept_name = 'FRONT-END';
    }else if($dept_id == 2){
        $dept_name = 'BACK-END';
    }else if($dept_id == 3){
        $dept_name = 'ADMIN';
    }else if ($dept_id == 4) {
        $dept_name = 'ANALYST';
    }else{
        $dept_name = 'ALL DEPARTMENT';
    }
    
    return $dept_name;
}

?>