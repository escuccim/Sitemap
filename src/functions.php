<?php

if ( ! function_exists('app_domain')) {

    /**
     * Arrange for a flash message.
     *
     * @param  string|null $message
     * @param  string      $level
     * @return \Laracasts\Flash\FlashNotifier
     */
    function app_domain(){
        $domain = env('APP_URL');

        if(isset($_SERVER['SERVER_NAME'])){
            $pieces = explode('.', $_SERVER['SERVER_NAME']);
            $subdomain = $pieces[0];
            if(count($pieces) >= 2){
                unset($pieces[0]);
                $domain = implode('.', $pieces);
            } else {
                $domain = $_SERVER['SERVER_NAME'];
            }
        }
        return $domain;
    }
}