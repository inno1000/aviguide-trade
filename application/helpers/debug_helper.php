<?php

if(!function_exists("vardump")){
    function vardump(...$data)
    {
        echo "<pre>";
        foreach ($data as $d) {
            var_dump($d);
        }
        echo "</pre>";
        die;
    }
}