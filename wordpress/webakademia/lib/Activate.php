<?php

namespace webakademia\lib;

class Activate 
{
    public static function webakademia_activate() {
        global $wpdb;
                $sql = "CREATE TABLE IF NOT EXISTS ".$wpdb->get_blog_prefix()."currency_quotes (
            `id` INT NOT NULL AUTO_INCREMENT,
            `currency_code` VARCHAR(45) NULL,
            `date` DATE NULL,
            `quote` FLOAT NULL,
            PRIMARY KEY (`id`))
        ENGINE = InnoDB";
        $wpdb->query($sql);
    }
}

