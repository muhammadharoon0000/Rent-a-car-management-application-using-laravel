<?php

namespace App\Http\Controllers;
// require __DIR__.'/vendor/autoload.php';
use PhpSerial\Serial;

class ArduinoController extends Controller
{
    public function sendCommand($command)
    {
        // Open the serial port connection
        $serial = new Serial("COM4");
        $serial->deviceSet("COM4");
        $serial->confBaudRate(9600);
        $serial->confParity("none");
        $serial->confCharacterLength(8);
        $serial->confStopBits(1);
        $serial->deviceOpen();

        // Send the command to the Arduino
        $serial->sendMessage($command);

        // Close the serial port connection
        $serial->deviceClose();
    }
}
