<?php

if (!function_exists('get_data_user'))
{
    function get_data_user($type,$field = 'id')
    {
        return Auth::guard($type)->user() ? Auth::guard($type)->user()->$field : '';
    }
}

if (!function_exists('number_price'))
{
    function number_price($price, $sale = 0)
    {
       if($sale == 0) {
           return $price;
       }

       $price = ((100 - $sale) * $price) / 100;

       return  $price;
    }
}
