<?php

namespace App\Http\Controllers;

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\SimpleType\Jc;
use App\Models\Content;

class ReportController extends Controller
{
    private int $titleSize = 20;
    private int $articleTitleSize = 15;
    public function sendReport()
    {
        $phpWord = new PhpWord();
        $fileName = 'Rapport ' . session('module') . '.docx';

        $this->addFrontPage($phpWord);

        $this->addInformationPage($phpWord);
        $this->addTableOfContents($phpWord);
        $this->addResults($phpWord);
        $this->addFillableNotes($phpWord);

        $writer = IOFactory::createWriter($phpWord, 'Word2007');

        $tempFile = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($tempFile);

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }

    private function addFrontPage($phpWord)
    {
        $titleFontSize = strlen(session('module')) > 30 ? 28 : 35; //so layout stays intact with text wrapping

        //first page
        $section = $phpWord->addSection([
            'marginTop' => 500,
            'marginBottom' => 0,
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

        $section->addText('Tussenrapport - '. session('module'),['size' => $titleFontSize, 'bold' => true, 'color' => 'white'],['alignment' => Jc::CENTER]);
        $section->addText('Blended Learning • '. $month,['size' => 15, 'color' => 'white'],['alignment' => Jc::CENTER]);

        $section->addTextBreak(1);

        $section->addImage(public_path('images/introduction_image.png'), [
        'alignment' => Jc::CENTER,
        'width' => 460, 
        'height' => 460, 
        ]);

        $infotable = $section->addTable([
            'alignment' => Jc::END,
        ]);
        
        $labelStyle = ['color' => '888888'];
        $valueStyle = ['bold' => true];
        
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
        $infotable->addCell($valueWidth)->addText('&lt;vul hier in&gt;', $valueStyle);
        
        // Third row
        $infotable->addRow();
        $infotable->addCell($labelWidth)->addText('Module', $labelStyle);
        $infotable->addCell($valueWidth)->addText(session('module'), $valueStyle);
        $infotable->addCell($paddingWidth);
        $infotable->addCell($labelWidth)->addText('Datum', $labelStyle);
        $infotable->addCell($valueWidth)->addText(now()->format('d-m-Y'), $valueStyle);
    }

    private function addInformationPage($phpWord)
    {
        $page = $this->createpage($phpWord);
        $this->addStandardHeaderFooter($page);

        $page->addTextBreak(1);

        $page->addtext('De BlendBarometer',['bold' => true, 'size' => $this->titleSize]);

        $table = $page->addTable([
            'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER,
        ]);
        $table->addRow();

        $text1 = preg_replace('/\s+/', ' ', Content::where('section_name', 'intro_description')->first()->info);
        $text2 = preg_replace('/\s+/', ' ', Content::where('section_name', 'intro_explanation')->first()->info); // old piece that isnt used anymore but else the text was too short

        $table->addCell(6500)->addText($text1 . ' ' . $text2, [
            'color' => '888888',
            'lineHeight' => 1.5, 
        ]);

        $table->addCell(3500)->addImage(public_path('images/barometer-report.png'), [
            'alignment' => Jc::CENTER,
            'width' => 100, 
            'height' => 100, 
            ]);

        $page->addtext('Over module',['bold' => true, 'size' => $this->titleSize]);
        $date = now()->translatedFormat('j F Y');
        $moduleText = sprintf("Op %s heeft %s de barometer ingevuld voor de module %s van opleiding %s aan de %s.", $date, session('name'),session('module'),session('course'),session('academy'));
        $page->addText($moduleText, [
            'color' => '888888',
            'lineHeight' => 1.5, 
        ]);

        $page->addtext('Over module',['bold' => true, 'size' => $this->titleSize]);

        $page->addText(session('summary'), [
            'color' => '888888',
            'lineHeight' => 1.5, 
        ]);
    }

    private function addTableOfContents($phpWord)
    {
        $page = $this->createPage($phpWord);

        $this->addStandardHeaderFooter($page);
    }

    private function addResults($phpWord)
    {
        $infopage = $phpWord->addSection([
            'marginTop' => 400,
            'marginBottom' => 0,
            'marginLeft' => 900,
            'marginRight' => 900,
        ]);

        $this->addStandardHeaderFooter($infopage);
    }

    private function addFillableNotes($phpWord)
    {
        $page = $phpWord->addSection([
            'marginTop' => 400,
            'marginBottom' => 0,
            'marginLeft' => 900,
            'marginRight' => 900,
        ]);

        $this->addStandardHeaderFooter($page);
    }

    private function createPage($phpWord){
        return $phpWord->addSection([
            'marginTop' => 400,
            'marginBottom' => 0,
            'marginLeft' => 900,
            'marginRight' => 900,
        ]);
    }

    function addStandardHeaderFooter($section)
    {
        // --- HEADER ---
        $header = $section->addHeader();
        $table = $header->addTable([
            'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER,
        ]);
        $table->addRow();

        // Shared text style
        $headerTextStyle = [
            'bold' => true,
            'size' => 10,
        ];

        $table->addCell(5500)->addText('Blended Learning Rapport', array_merge($headerTextStyle, [
            'color' => '888888',
        ]), [
            'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START,
        ]);

        $table->addCell(5500)->addText(session('course') . ' - ' . session('module'), array_merge($headerTextStyle, [
            'color' => '888888',
            'bold' => true,
        ]), [
            'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::END,
        ]);


        // --- FOOTER ---
        $footer = $section->addFooter();
        $footerTable = $footer->addTable(['alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER, 'width' => 100 * 50]);
        $footerTable->addRow();

        // Bottom Left: Logo
        $footerTable->addCell(4000)->addImage(public_path('images/logo.png'), [
            'width' => 90,
            'height' => 17,
            'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START,
        ]);

        // Bottom Center: Date
        $date = now()->format('d-m-Y');
        $footerTable->addCell(3000)->addText($date, [
            'size' => 10,
        ], [
            'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER,
        ]);

        // Bottom Right: Page numbering
        $footerTable->addCell(4000)->addPreserveText('Pagina {PAGE} van {NUMPAGES}', [
            'size' => 10,
        ], [
            'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::END,
        ]);
    }

}