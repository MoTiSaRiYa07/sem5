<?php
require 'vendor/autoload.php'; // Include autoloader

use Dompdf\Dompdf;
use Dompdf\Options;


// Initialize dompdf
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);

$dompdf = new Dompdf($options);


