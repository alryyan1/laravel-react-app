<?php

namespace App\Http\Controllers;
use Mike42\Escpos\PrintBuffers\ImagePrintBuffer;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

use Illuminate\Http\Request;

class PrintThermalController extends Controller
{
    public function print()
    {

        /**
         * Install the printer using USB printing support, and the "Generic / Text Only" driver,
         * then share it (you can use a firewall so that it can only be seen locally).
         *
         * Use a WindowsPrintConnector with the share name to print.
         *
         * Troubleshooting: Fire up a command prompt, and ensure that (if your printer is shared as
         * "Receipt Printer), the following commands work:
         *
         *  echo "Hello World" > testfile
         *  copy testfile "\\%COMPUTERNAME%\Receipt Printer"
         *  del testfile
         */
        try {
            $connector = null;
            $connector = new WindowsPrintConnector("oscar");

            /* Print a "Hello world" receipt" */
            $printer = new Printer($connector);
            $printer -> text("Hello World!\n");
            $printer -> cut();
            $printer->pulse();

            /* Close printer */
            $printer -> close();

            $printer -> text("Hello World!\n");
            $printer -> cut();
            $printer -> close();
        } catch (Exception $e) {
            echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
        }
    }
}
