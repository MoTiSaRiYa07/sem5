<?php
require 'vendor/autoload.php'; // Include autoloader

use Dompdf\Dompdf;
use Dompdf\Options;


// Initialize dompdf
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);
$options->set('isRemoteEnabled', true);

$dompdf = new Dompdf($options);


