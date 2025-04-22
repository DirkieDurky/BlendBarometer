<?php

namespace App\Http\Controllers;

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\SimpleType\Jc;
use PhpOffice\PhpWord\Shared\Converter;
use PhpOffice\PhpWord\SimpleType\JcTable;

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

        $imgtable = $section->addTable();
        $imgtable->addRow();
    
        $imgtable->addCell(20000)->addImage(public_path('images/logo-avans-red.png'), ['align' => Jc::START, 'width' => 100, 'height' => 30]);
        $imgtable->addCell(20000)->addImage(public_path('images/report-logo.png'), ['align' => Jc::END, 'width' => 140, 'height' => 25]);

        $section->addTextBreak(1);

        $month = \Carbon\Carbon::now()->locale('nl')->isoFormat('MMMM YYYY');

        $section->addText('Tussenrapport - '. session('module'),['size' => 35, 'bold' => true, 'color' => 'white'],['alignment' => Jc::CENTER]);
        $section->addText('Blended Learning • '. $month,['size' => 15, 'color' => 'white'],['alignment' => Jc::CENTER]);

        $section->addTextBreak(1);

        $section->addImage(public_path('images/introduction_image.png'), [
        'alignment' => Jc::CENTER,
        'width' => 460, 
        'height' => 460, 
        ]);

        // $section->addTextBreak(2);

        $infotable = $section->addTable([
            'alignment' => Jc::END,
        ]);
        
        $labelStyle = ['color' => '888888']; // Light gray label style
        $valueStyle = ['bold' => true, 'spacing' => 0, 'spaceAfter' => 0, 'spaceBefore' => 0, 'indent' => 0, 'right' => 300];
        
        $labelWidth = 1500;
        $valueWidth = 3000;
        $paddingWidth = 300;
        
        // First row
        $infotable->addRow();
        $infotable->addCell($labelWidth)->addText('Academie', $labelStyle);
        $infotable->addCell($valueWidth)->addText(session('academy'), $valueStyle);
        $infotable->addCell($paddingWidth);
        $infotable->addCell($labelWidth)->addText('Docent', $labelStyle);
        $infotable->addCell($valueWidth)->addText(session('name'), $valueStyle);
        
        // Second row
        $infotable->addRow();
        $infotable->addCell($labelWidth)->addText('Opleiding', $labelStyle);
        $infotable->addCell($valueWidth)->addText(session('course'), $valueStyle);
        $infotable->addCell($paddingWidth);
        $infotable->addCell($labelWidth)->addText('ICTO Coach', $labelStyle);
        $infotable->addCell($valueWidth)->addText('vul hier in', $valueStyle);
        
        // Third row
        $infotable->addRow();
        $infotable->addCell($labelWidth)->addText('Module', $labelStyle);
        $infotable->addCell($valueWidth)->addText(session('module'), $valueStyle);
        $infotable->addCell($paddingWidth);
        $infotable->addCell($labelWidth)->addText('Datum', $labelStyle);
        $infotable->addCell($valueWidth)->addText(now()->format('d-m-Y'), $valueStyle);

        $writer = IOFactory::createWriter($phpWord, 'Word2007');

        $tempFile = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($tempFile);

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }
}