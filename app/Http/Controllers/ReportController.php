<?php

namespace App\Http\Controllers;

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class ReportController extends Controller{

    public function sendReport(){
        $phpWord = new PhpWord();

        $section = $phpWord->addSection();
        $section->addText('Hello World from Laravel + PHPWord!');

        $writer = IOFactory::createWriter($phpWord, 'Word2007');

        $fileName = 'hello-world.docx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($tempFile);

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }
}