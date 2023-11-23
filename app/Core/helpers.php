<?php


if(!function_exists('pre')){
    function pre($data){
        echo '<pre>';
        var_dump($data);
        echo '</pre><hr>';
    }
}