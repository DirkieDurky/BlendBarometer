<?php

namespace App\Http\Controllers;

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\SimpleType\Jc;

class ReportController extends Controller{

    public function sendReport(){
        $phpWord = new PhpWord();
        $fileName = 'Rapport ' . session('module') . '.docx';

        $section = $phpWord->addSection();

        $section->addText('Hello World from Laravel + PHPWord!',['alignment' => Jc::CENTER]);
        $section->addTextBreak(1);
        $section->addImage(public_path('images/introduction_image.png'), 
        ['alignment' => Jc::CENTER,
        'width' => 450, 
        'height' => 450, 
        ]);


        $writer = IOFactory::createWriter($phpWord, 'Word2007');

        $tempFile = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($tempFile);

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }
}