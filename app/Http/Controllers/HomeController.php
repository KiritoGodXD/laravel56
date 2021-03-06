<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
    */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    public function createWordDocx()
    {
        $wordTest = new \PhpOffice\PhpWord\PhpWord();

        $newSection = $wordTest->addSection();

        $text1 = "Информация о квартире";

        $text2 = "The Portfolio details is a very useful feature of the web page.";

        $newSection->addText($text1,array('name' => 'Times New Roman', 'size' => 14, 'color' => 'black') ,array('align' => 'center'));
        $newSection->addText($text2, array('name' => 'Times New Roman', 'size' => 14, 'color' => 'black'));

        $objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($wordTest, 'Word2007');
        try {
            $objectWriter->save(storage_path('TestWordFile.docx'));
        } catch (Exception $e) {
        }

        return response()->download(storage_path('TestWordFile.docx'));
    }
}
