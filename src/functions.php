<?php

if ( ! function_exists('app_domain')) {
    function app_domain()
    {
        if(isset($_SERVER['SERVER_NAME'])){
            $domain = $_SERVER['SERVER_NAME'];
        } else {
            $domain = str_replace('http://','', env('APP_URL'));
        }
        $pieces = explode('.', $domain);
        $pieces = array_splice($pieces, -2);
        $domain = implode('.', $pieces);
        return $domain;
    }
}

if ( ! function_exists('app_url')) {
    function app_url()
    {
        return 'http://' . app_domain();
    }
}

if ( ! function_exists('isUserAdmin')) {
    function isUserAdmin(){
        if(Auth::guest())
            return false;
        else {
            return (Auth::user()->type);
        }
    }
}