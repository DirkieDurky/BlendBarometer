<?php

namespace App\Http\Controllers;

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\SimpleType\Jc;
use App\Models\Content;
use App\Models\Receiver;
use App\Models\Receiver_of_academy;
use PhpOffice\PhpWord\Style\Image;
use App\Models\Sub_category;
use Illuminate\Support\Facades\Session;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\View;

class ReportController extends Controller
{
    private int $pageNumber = 0;

    private $labelStyle = ['color' => '888888'];
    private $valueStyle = ['bold' => true];
        
    private $labelWidth = 1500;
    private $valueWidth = 3000;

    const MAIL_HOST = 'smtp.gmail.com';
    const MAIL_PORT = 587;

    // for adding a title so it gets added to TOC
        // $page->addTitle('<Title text>', <heading number> , $this->pageNumber); 
    public function sendReport()
    {
        $phpWord = new PhpWord();
        $phpWord->addTitleStyle(
            1, // Heading level
            ['bold' => true, 'size' => 20, 'name' => 'Arial'], // Font style
        );
        $phpWord->addTitleStyle(
            2, // Heading level
            ['bold' => true, 'size' => 15, 'name' => 'Arial'], // Font style
        );

        $fileName = 'Rapport ' . session('module') . '.docx';

        $this->addFrontPage($phpWord);

        $this->addInformationPage($phpWord);
        $this->addTableOfContents($phpWord);
        $this->addResults($phpWord);
        $this->addFillableNotes($phpWord);

        $writer = IOFactory::createWriter($phpWord, 'Word2007');

        $tempFile = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($tempFile);

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->SMTPAuth = true;

        $mail->Host = self::MAIL_HOST;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = self::MAIL_PORT;

        $mail->Username = env('MAIL_USERNAME');
        $mail->Password = env('MAIL_PASSWORD');
        
        $name = session('name');
        $emailParticipant = session('email');
        $academy = session('academy');
        $module = session('module');
        $date = now()->format('d-m-Y');
        $summary = session('summary');

        $html = View::make('tussen-rapport-email', compact('name', 'emailParticipant', 'academy', 'module', 'date', 'summary'))->render();

        $receiver = Receiver_of_academy::where('academy_name', session('academy'))->first();

        if ($receiver) 
        {
            $email = $receiver->receiver_email;
        } else 
        {
            $email = Receiver::where('is_default', true)->value('email');
        }

        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Tussenrapport';

        $mail->CharSet = 'UTF-8';
        $mail->addAttachment($tempFile, $fileName);
        $mail->AddEmbeddedImage(public_path('images/blendbarometer-logo.png'), 'logoCID', 'logo.png');

        $mail->Body = $html;
        $mail->send();

        
        return View('tussen-rapport-email', compact('name', 'emailParticipant', 'academy', 'module', 'date', 'summary'));
        // return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }

    private function addFrontPage($phpWord)
    {
        $titleFontSize = strlen(session('module')) > 30 ? 28 : 35; //so layout stays intact with text wrapping

        $this->pageNumber += 1;
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
            'posHorizontal' => Image::POSITION_HORIZONTAL_LEFT,
            'posVerticalRel' => 'page',
            'posVertical' => Image::POSITION_VERTICAL_TOP,
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
        
        
        $paddingWidth = 300;
        
        // First row
        $infotable->addRow();
        $infotable->addCell($this->labelWidth)->addText('Academie', $this->labelStyle);
        $infotable->addCell($this->valueWidth)->addText(session('academy'), $this->valueStyle);
        $infotable->addCell($paddingWidth);
        $infotable->addCell($this->labelWidth)->addText('Docent', $this->labelStyle);
        $infotable->addCell($this->valueWidth)->addText(session('name'), $this->valueStyle);
        
        // Second row
        $infotable->addRow();
        $infotable->addCell($this->labelWidth)->addText('Opleiding', $this->labelStyle);
        $infotable->addCell($this->valueWidth)->addText(session('course'), $this->valueStyle);
        $infotable->addCell($paddingWidth);
        $infotable->addCell($this->labelWidth)->addText('ICTO Coach', $this->labelStyle);
        $infotable->addCell($this->valueWidth)->addText('&lt;vul hier in&gt;', $this->valueStyle);
        
        // Third row
        $infotable->addRow();
        $infotable->addCell($this->labelWidth)->addText('Module', $this->labelStyle);
        $infotable->addCell($this->valueWidth)->addText(session('module'), $this->valueStyle);
        $infotable->addCell($paddingWidth);
        $infotable->addCell($this->labelWidth)->addText('Datum', $this->labelStyle);
        $infotable->addCell($this->valueWidth)->addText(now()->format('d-m-Y'), $this->valueStyle);
    }

    // TODO for layout: setting max length for information about barometer
    private function addInformationPage($phpWord)
    {
        $page = $this->createpage($phpWord);
        $this->addStandardHeaderFooter($page);

        $page->addTextBreak(1);

        $page->addTitle('De BlendBarometer',1, $this->pageNumber);

        $table = $page->addTable([
            'alignment' => Jc::CENTER,
        ]);
        $table->addRow();

        $text1 = preg_replace('/\s+/', ' ', Content::where('section_name', 'intro_description')->first()->info);
        $text2 = preg_replace('/\s+/', ' ', Content::where('section_name', 'intro_explanation')->first()->info); // old piece that isnt used anymore but else the text was too short

        $table->addCell(6500)->addText($text1 . ' ' . $text2, [
            'color' => '888888', //i will ask a question about this color so this is a marker for this
            'lineHeight' => 1.5, 
        ]);

        $table->addCell(3500)->addImage(public_path('images/barometer-report.png'), [
            'alignment' => Jc::CENTER,
            'width' => 100, 
            'height' => 100, 
            ]);

        $page->addTitle('Over module',1, $this->pageNumber);
        $date = now()->translatedFormat('j F Y');
        $moduleText = sprintf("Op %s heeft %s de barometer ingevuld voor de module %s van opleiding %s aan de %s.", $date, session('name'),session('module'),session('course'),session('academy'));
        $page->addText($moduleText, [
            'color' => '888888',
            'lineHeight' => 1.5, 
        ]);

        $page->addTitle('Samenvatting module',2, $this->pageNumber);

        $page->addText(session('summary'), [
            'color' => '888888',
            'lineHeight' => 1.5, 
        ]);
    }

    private function addTableOfContents($phpWord)
    {
        $page = $this->createPage($phpWord);
        $this->addStandardHeaderFooter($page);

        $page->addTitle('Inhoudsopgave', 1 , $this->pageNumber); 
        $page->addTOC();

        $page->addImage(public_path('images/barometer-report-2.png'), [
            'width' => 220,
            'height' => 220,
            'alignment' => Jc::CENTER,
        ]);
    }

    private function addResults($phpWord)
    {
        //first page
        $page = $this->createPage($phpWord);
        $this->addStandardHeaderFooter($page);

        $page->addTitle('Resultaten', 1 , $this->pageNumber);

        //second page
        $page = $this->createPage($phpWord);
        $this->addStandardHeaderFooter($page);

        $table = $page->addTable([
            'alignment' => Jc::CENTER,
        ]);

        $list1 = Sub_category::where('question_category_id', 1)->pluck('name');
        $list2 = Sub_category::where('question_category_id', 2)->pluck('name');

        $table->addRow();
        $table->addCell(6000)->addText('Fysieke leeractiviteiten', ['alignment' => Jc::START, 'bold' => true, 'size' => 15]);
        $table->addCell(6000)->addText('Online leeractiviteiten', ['alignment' => Jc::END, 'bold' => true, 'size' => 15]);

        $i = 0;
        $looping = true;
        while($looping)
        {
            $name1 = null;
            $name2 = null;
            if($i < $list1->count()){
                $name1 = $list1[$i];
            }
            if($i < $list2->count()){
                $name2 = $list2[$i];
            }
            $this->newGraphRow($table, $name1, $name2);
            $i ++;
            if($i >= $list1->count() && $i >= $list2->count())
            {
                $looping = false;
            }
        }
    }

    private function newGraphRow($table, $name1, $name2){
        $table->addRow();
        $cell1 = $table->addCell(6000);
        $cell2 = $table->addCell(6000);
        if($name1 != null)
        {
            $cell1->addImage(public_path('images/barometer-report-2.png'), [
                'width' => 200,
                'height' => 160,
                'alignment' => Jc::START,
            ]);
        }
        if($name2 != null)
        {
            $cell2->addImage(public_path('images/barometer-report-2.png'), [
                'width' => 200,
                'height' => 160,
                'alignment' => Jc::START,
            ]);
        }

        $table->addRow();
        $cell1 = $table->addCell(6000);
        $cell2 = $table->addCell(6000);
        if($name1 != null)
        {
            $cell1->addText($name1,['alignment' => Jc::START, 'bold' => true, 'size' => 13]);
        }
        if($name2 != null)
        {
            $cell2->addText($name2,['alignment' => Jc::END, 'bold' => true, 'size' => 13]);
        }

        $table->addRow();
        $cell1 = $table->addCell(6000);
        $cell2 = $table->addCell(6000);
        if($name1 != null)
        {
            $cell1->addText('Notities: .........................................................',['alignment' => Jc::START]);
        }
        if($name2 != null)
        {
            $cell2->addText('Notities: .........................................................',['alignment' => Jc::END]);
        }
    }

    private function addFillableNotes($phpWord)
    {
        $page = $this->createPage($phpWord);
        $this->addStandardHeaderFooter($page);

        $page->addTitle('Verslag gesprek', 1 , $this->pageNumber);
        $textrun = $page->addTextRun();
        $textrun->addText('Docent: ', $this->labelStyle);
        $textrun->addText('&lt;vul hier in&gt;', $this->valueStyle);

        $textrun = $page->addTextRun();
        $textrun->addText('Icto Coach: ', $this->labelStyle);
        $textrun->addText('&lt;vul hier in&gt;', $this->valueStyle);

        $textrun = $page->addTextRun();  
        $textrun->addText('Datum gesprek: ', $this->labelStyle);
        $textrun->addText('&lt;vul hier in&gt;', $this->valueStyle);

        $page->addTitle('Verslag', 2 , $this->pageNumber);
        $page->addText('&lt;vul hier in&gt;');

        $page = $this->createPage($phpWord);
        $this->addStandardHeaderFooter($page);

        $page->addTitle('Advies en Actiepunten', 1 , $this->pageNumber);

        $page->addTitle('Advies', 2 , $this->pageNumber);
        $page->addText('&lt;vul hier in&gt;');

        $page->addTitle('Actiepunten', 2 , $this->pageNumber);
        $page->addText('&lt;vul hier in&gt;');
    }

    private function createPage($phpWord){
        $this->pageNumber += 1;
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
            'alignment' => Jc::CENTER,
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
            'alignment' => Jc::START,
        ]);

        $table->addCell(5500)->addText(session('course') . ' - ' . session('module'), array_merge($headerTextStyle, [
            'color' => '888888',
            'bold' => true,
        ]), [
            'alignment' => Jc::END,
        ]);


        // --- FOOTER ---
        $footer = $section->addFooter();
        $footerTable = $footer->addTable(['alignment' => Jc::CENTER]);
        $footerTable->addRow();

        // Bottom Left: Logo
        $footerTable->addCell(4000)->addImage(public_path('images/logo.png'), [
            'width' => 90,
            'height' => 16,
            'alignment' => Jc::START,
        ]);

        // Bottom Center: Date
        $date = now()->format('d-m-Y');
        $footerTable->addCell(3000)->addText($date, [
            'size' => 10,
        ], [
            'alignment' => Jc::CENTER,
        ]);

        // Bottom Right: Page numbering
        $footerTable->addCell(4000)->addPreserveText('Pagina {PAGE} van {NUMPAGES}', [
            'size' => 10,
        ], [
            'alignment' => Jc::END,
        ]);
    }

}