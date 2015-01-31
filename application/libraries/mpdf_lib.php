<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

include_once APPPATH . '/third_party/mpdf/mpdf.php';

//require_once dirname(__FILE__) . '/mpdf5/mpdf.php';

class Mpdf_lib extends Mpdf
{
    function __construct()
    {
        parent::__construct();
    }
}

//class mpdf {
//
//    function mpdf() {
//        $CI = & get_instance();
//        log_message('Debug', 'mPDF class is loaded.');
//    }
//
//    function load($param = NULL) {
//
//        include_once APPPATH . '/third_party/mpdf/mpdf.php';
//
//        if ($params == NULL) {
//            $param = '"en-GB-x","A4","","",10,10,10,10,6,3';
//        }
//
//        return new mPDF($param);
//    }
//
//}
