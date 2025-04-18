<?php

namespace App\Http\Controllers;

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\SimpleType\Jc;

class ReportController extends Controller
{

    public function sendReport()
    {
        $phpWord = new PhpWord();
        $fileName = 'Rapport ' . session('module') . '.docx';

        $phpWord->setDefaultFontName('Inter');
        $phpWord->setDefaultFontSize(12);

        $section = $phpWord->addSection();

        $section->addImage(public_path('images/logo-avans-red.png'), [
            'width' => 100,
            'height' => 30,
            'wrappingStyle' => 'inline',
            'positioning' => 'absolute',
            'posHorizontalRel' => 'margin',
            'marginLeft' => -1000,
            'posVerticalRel' => 'margin',
        ]);
        
        $section->addImage(public_path('images/logo-avans-red.png'), [
            'width' => 100,
            'height' => 30,
            'wrappingStyle' => 'inline',
            'positioning' => 'absolute',
            'posHorizontal' => \PhpOffice\PhpWord\Style\Image::POSITION_HORIZONTAL_RIGHT,
            'posHorizontalRel' => 'page',
            'posVerticalRel' => 'margin',
        ]);

        $section->addText('Tussenrapport - '. session('module'),['size' => 35, 'bold' => true],['alignment' => Jc::CENTER]);
        $section->addText('Blended Learning '. '[datum todo]',['size' => 15],['alignment' => Jc::CENTER]);

        $section->addTextBreak(1);

        $section->addImage(public_path('images/introduction_image.png'), [
        'alignment' => Jc::CENTER,
        'width' => 450, 
        'height' => 450, 
        ]);


        $writer = IOFactory::createWriter($phpWord, 'Word2007');

        $tempFile = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($tempFile);

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }
}