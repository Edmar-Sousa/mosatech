<?php

class Form {
    static function clear_field($field_str) {
        return preg_replace('/[^[:alnum:@]_]/', '', $field_str);
    }
}

