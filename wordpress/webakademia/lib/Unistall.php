<?php

namespace webakademia\lib;

class Unistall
{
    public static function webakademia_unistall() {
        //kasowanie tabeli wykonujemy podczas odistalowania wtyczki
        global $wpdb;
        $sql = "DROP TABLE ".$wpdb->get_blog_prefix()."currency_quotes;";
        $wpdb->query($sql);
    }
}