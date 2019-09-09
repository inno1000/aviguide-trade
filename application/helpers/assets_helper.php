<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('asset_path')){
    function asset_path($nom=''){
        return str_replace('\\', '/', FCPATH . 'assets/' . trim(trim($nom), '/'));
    }
}

if(!function_exists('assets_url')){
    function assets_url($nom=''){
        return base_url('assets/'.trim(trim($nom), '/'));
    }
}

if ( ! function_exists('css_url')) {
    function css_url($nom) {
        return assets_url('css/' . $nom . '.css');
    }
}

if ( ! function_exists('vendor_url')) {
    function vendor_url($nom) {
        return assets_url('vendor/' . $nom);
    }
}

if ( ! function_exists('js_url')) {
    function js_url($nom) {
        return assets_url('js/' . $nom . '.js');
    }
}

if ( ! function_exists('img_url')) {
    function img_url($nom) {
        return assets_url('img/' . $nom);
    }
}

if ( ! function_exists('document_url')) {
    function document_url($nom) {
        return assets_url('documents/' . $nom);
    }
}

if ( ! function_exists('img')) {
    function img($nom, $alt = '') {
        return '<img src="' . img_url($nom) . '" alt="' . $alt . '" />';
    }
}

if ( ! function_exists('json_url')) {
    function json_url($nom) {
        return assets_url('json/' . $nom . '.json');
    }
}

if ( ! function_exists('upload_url')) {
    function upload_url($nom) {
        return assets_url('uploads/' . $nom);
    }
}





