<?php 
session_start();

//include autoloader
require_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;
// instantiate and use the dompdf class
$dompdf = new Dompdf();

$html = '<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>'.$site->title().' | '.$page->title().'</title>
	<link rel="stylesheet" type="text/css" href="assets/css/main.css" /> 
	</head>
	<body class="toPrint">     
		<div class="cover pagebreak">
      <div class="logo-wrapper">'
        .$logo = $site->logo()->toFile().
        '<img src="'. $site->logo()->toFile()->url().'" alt="'. $site->logo()->toFile()->title().'">
      </div>
      <h1>'. $page->title()->html().'</h1>
    </div>

    <div class="edito pagebreak">
      <h2>Édito</h2>
      '. $page->edito()->kirbytext().'
    </div>

    <div class="garde pagebreak">
      <div class="logo-wrapper">
        '.$logo = $site->logo()->toFile().'
        <img src="'. $site->url().'/'.$site->logo()->toFile()->url().'" alt="'.  $site->logo()->toFile()->title().'">
      </div>
      '.  $page->garde()->kirbytext().'
    </div>

  <div class="texte pagebreak">
    '.  $page->parent()->text()->kirbytext() .'
  </div>

  // <div class="mini-dico">'. 
  // 	foreach($page->parent()->linkeddefinition()->split(",") as $linkeddefinition){ 
  //     $def =  $pages->find('definitions')->children()->find($linkeddefinition);
  //     $first_let = mb_substr($def->title(),0,1, "utf-8");
  //     if($first_let == "À") $first_let = "A";
  //     if($first_let == "É") $first_let = "E";
  //     if($first_let == "È") $first_let = "E".'
  //     <div class="definition-container pagination-pagebreak">
  //       <div class="left-col">
  //         '. if ($cur_let !== $first_let){
  //           $cur_let = $first_let;.'
  //           <div id="'.  $cur_let.'" class="letter definition">
  //             <div class="inner-definition">
  //               '.  $cur_let.'
  //             </div> 
  //           </div>
  //         '. } .'
  //         '. if($image = $def->image()){ .'
  //           <div class="definition-image">
  //             <img src="'.  $image->url() .'" alt="'.  $image->filename() .'">
  //           </div>
  //         '. } .'
  //       </div>
  //       <div class="definition definition-item">
  //         <div class="inner-definition">
  //           <h2>'.  $def->title()->html().'</h2>
  //             <div class="definition-text">
  //               '.  $def->text()->kirbytext() .'
  //               <div class="sources">
  //                 '.  $def->sources()->kirbytext() .'
  //               </div>
  //             </div>
  //         </div>
  //       </div>
  //     </div>       
  //   '. } .'
  '</div>

  <div class="pause pagination-pagebreak">
    <div class="image-wrapper">
      '. $pause = $page->imagecredit()->toFile().'
      <img src="'.  $page->imagecredit()->toFile()->url() .'" alt="'.  $page->imagecredit()->toFile()->title().'">
    </div>
  </div>

  <div class="credits pagination-pagebreak">
    <h2>Contexte et Crédits</h2>
    '.  $page->parent()->credits()->kirbytext() .'
    <div class="colophon">
      '.  $page->colophon()->kirbytext() .'
    </div>
  </div>

  <div class="logos pagination-pagebreak">
    <div class="image-wrapper">
      '. $logos = $page->logosFin()->toFile().'
      <img src="'.  $page->logosFin()->toFile()->url() .'" alt="'.  $page->logosFin()->toFile()->title().'">
    </div>
  </div>

  <div class="backcover">
    <div class="image-wrapper">
      '. $pause = $page->imageFin()->toFile().'
      <img src="'.  $page->imageFin()->toFile()->url() .'" alt="'. $page->imageFin()->toFile()->title().'">
    </div>
  </div>

  </body></html>';


$dompdf->loadHtml($html ,'UTF-8');

//(Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();


// Output the generated PDF to Browser
$dompdf->stream($page->title(), array("Attachment" => 0));


?>


