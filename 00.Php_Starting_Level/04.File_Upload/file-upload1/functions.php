<?php   //var_dom

    function debug($variable){
        echo '<pre>';
        print_r($variable);
        echo '</pre>';
    }

    function dd($variable){
        debug($variable);
        die();
    }