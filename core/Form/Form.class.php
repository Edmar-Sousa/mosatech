<?php

class Form {
    static function clear_field($field_str) {
        return preg_replace('/[^[:alnum:@]_]/', '', $field_str);
    }


    static function isset_fields($campos_list) {
        $clear_data = array();

        foreach ($campos_list as $campo) {

            if (!isset($_POST[$campo]) ) return FALSE;
        
            $clear_data[$campo] = self::clear_field($_POST[$campo]);
        }

        return $clear_data;
    }
    

    static private function crfs_id() {
        return bin2hex(random_bytes(32));
    }


    static function gerar_token() {
        if (!isset($_SESSION['token'])) {
            $_SESSION['token'] = self::crfs_id();
        }

        else {
            unset($_SESSION['token']);
            $_SESSION['token'] = self::crfs_id();
        }

        return $_SESSION['token'];
    }
    

    static function valid_crfs_token($token) {
        if (isset($_SESSION['token']) and $_SESSION['token'] == $token) {
            return TRUE;
            die();
        }

        return FALSE;
    }
}


