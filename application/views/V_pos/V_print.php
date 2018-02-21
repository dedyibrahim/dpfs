<?php

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\CupsPrintConnector;
use Mike42\Escpos\EscposImage;

$connector = new CupsPrintConnector("es");
$printer = new Printer($connector);

/* Initialize */
$printer -> initialize();

/* Text */
$printer -> text("NIAGARA WATERMART");
$printer -> cut();

$printer -> pulse();

/* Always close the printer! On some PrintConnectors, no actual
 * data is sent until the printer is closed. */
$printer -> close();
