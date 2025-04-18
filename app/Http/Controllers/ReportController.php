<?php

namespace App\Http\Controllers;

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\SimpleType\Jc;
use PhpOffice\PhpWord\Shared\Converter;

class ReportController extends Controller
{

    public function sendReport()
    {
        $phpWord = new PhpWord();
        $fileName = 'Rapport ' . session('module') . '.docx';

        // $phpWord->setDefaultFontName();
        // $phpWord->setDefaultFontSize(12);

        $section = $phpWord->addSection([
            'marginTop' => 500,
            'marginBottom' => 1200,
            'marginLeft' => 600,
            'marginRight' => 600,
        ]);

        $section->addImage(public_path('images/report-background.png'), [
            'width' => 1000,
            'height' => 600,
            'positioning' => 'absolute',
            'posHorizontalRel' => 'page',
            'posHorizontal' => \PhpOffice\PhpWord\Style\Image::POSITION_HORIZONTAL_LEFT,
            'posVerticalRel' => 'page',
            'posVertical' => \PhpOffice\PhpWord\Style\Image::POSITION_VERTICAL_TOP,
            'wrappingStyle' => 'behind',
        ]);

        $table = $section->addTable();
        $table->addRow();
    
        $table->addCell(20000)->addImage(public_path('images/logo-avans-red.png'), ['align' => Jc::START, 'width' => 100, 'height' => 30]);
        $table->addCell(20000)->addImage(public_path('images/report-logo.png'), ['align' => Jc::END, 'width' => 140, 'height' => 25]);

        $section->addTextBreak(2);

        $section->addText('Tussenrapport - '. session('module'),['size' => 35, 'bold' => true, 'color' => 'white'],['alignment' => Jc::CENTER]);
        $section->addText('Blended Learning '. '[datum todo]',['size' => 15, 'color' => 'white'],['alignment' => Jc::CENTER]);

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