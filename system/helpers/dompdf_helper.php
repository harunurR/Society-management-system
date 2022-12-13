<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Ashik
 * @copyright	Copyright (c) 2014 - 2015, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------
use Dompdf\Dompdf;
function pdf_create($html, $filename='', $stream=TRUE) 
{
    require_once("dompdf/autoload.inc.php");
	
    $dompdf = new Dompdf();
	//$dompdf->set_base_path(realpath( base_url(). 'template/libs/bootstrap/css/'));
    $dompdf->load_html($html);
    $dompdf->render();
    if ($stream) {
        $dompdf->stream($filename.".pdf");
    } else {
        return $dompdf->output();
    }
}