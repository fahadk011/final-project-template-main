<?php

namespace app\models;

class TypeConverter {

    public const ISO_DATE = "Y-m-d";

    public static function fromDateTime($date, $format ) {
        if (!$date || !$format) {
            return null;
        }
        return $date->format($format);
    }

    public static function toDateTime($text, $format) {
        if (!$text || !$format) {
            return null;
        }
        return \DateTime::createFromFormat($format, $text);
    }
}