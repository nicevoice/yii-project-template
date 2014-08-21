<?php
/**
 * @author: Rogee<rogeeyang@gmail.com>
 */

class EHtml extends CHtml{
    public static function link($text, $url = '#', $htmlOptions = array())
    {
        if (!isset($htmlOptions['title'])) {
            $htmlOptions['title'] = $text;
        }
        return parent::link($text, $url, $htmlOptions);
    }
} 