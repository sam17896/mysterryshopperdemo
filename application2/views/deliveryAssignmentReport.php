<?php
//if(!defined('BASEPATH') OR exit('No direct script access allowed'));

class RPDF extends FPDF
{

  public $title = "Mystery Shopper Report";
// Page header

function Header()
{
  $this->SetFont('Times','',12);
        $w = $this->GetStringWidth($this->title)+150;
        $this->SetDrawColor(0,0,0);
        $this->SetFillColor(170,169,148);
        $this->SetTextColor(0,0,0);
        $this->SetLineWidth(1);
        $base_path = base_url();
        $image_path = $base_path.'Main/img/msp-logoc.png';
        $this->Image($image_path,10,-3,40);
        
        $this->SetFont('Times','B',26);
        $this->Cell($w,9,$this->title,0,1,'C');
        
        $this->Ln(10);
        
        $this->Cell(0,0,'',0,0,'L');
        $this->Ln();
}

// Page footer
function Footer()
{
  // Position at 1.5 cm from bottom
  $this->SetY(-15);
  // Arial italic 8
  $this->SetFont('Arial','I',8);
  // Page number
  $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$this->myfpdf = new RPDF();
$this->myfpdf->AliasNbPages();
$this->myfpdf->AddPage();
$this->myfpdf->SetFont('Times','',12);
                    
                                            $heigth = 8;
                                            $width = 195; 
                                            $this->myfpdf->SetFont('Times','B',20);
                                            $this->myfpdf->SetY(30); 
                                            $this->myfpdf->MultiCell($width,$heigth,'Review Date: ','l',1,0); 
                                            $this->myfpdf->SetFont('Times','',20);
                                            $this->myfpdf->SetXY(52,30);  
                                            $this->myfpdf->MultiCell($width,$heigth,$selected_assignment_detail->date,'l',1,0);

                                            $this->myfpdf->SetFont('Times','B',20);
                                            $this->myfpdf->SetXY(150,30); 
                                            $this->myfpdf->MultiCell($width,$heigth,'Time: ','l',1,0); 
                                            $this->myfpdf->SetFont('Times','',20);
                                            $this->myfpdf->SetXY(172,30);  
                                            $this->myfpdf->MultiCell($width,$heigth,$selected_assignment_detail->time,'l',1,0);
                                            
                                            $this->myfpdf->SetFont('Times','B',20);
                                            $this->myfpdf->SetY(38); 
                                            $this->myfpdf->MultiCell($width,$heigth,'Store Name:','l',1,0); 
                                            $this->myfpdf->SetFont('Times','',20);
                                            $this->myfpdf->SetXY(95,38);  
                                            $this->myfpdf->MultiCell($width,$heigth,$selected_assignment_detail->outlet,'l',1,0);

 					    $this->myfpdf->ln(10);
                                            $this->myfpdf->SetFont('Times','B',20);
                                            $this->myfpdf->MultiCell($width,$heigth,'Call Center: ','l',1,0); 
                                            $this->myfpdf->SetFont('Times','',20);
                                            $this->myfpdf->MultiCell($width,$heigth,$selected_assignment_detail->call_center,'l',1,0);
 						$this->myfpdf->ln();
                                            $this->myfpdf->SetFont('Times','B',20);
                                            $this->myfpdf->MultiCell($width,$heigth,'Online: ','l',1,0); 
                                            $this->myfpdf->SetFont('Times','',20);
                                            $this->myfpdf->MultiCell($width,$heigth,$selected_assignment_detail->online,'l',1,0);

 					   $this->myfpdf->ln();
                                            $this->myfpdf->SetFont('Times','B',20);
                                            $this->myfpdf->MultiCell($width,$heigth,'Rider: ','l',1,0); 
                                            $this->myfpdf->SetFont('Times','',20);
                                            $this->myfpdf->MultiCell($width,$heigth,$selected_assignment_detail->rider,'l',1,0);

 						$this->myfpdf->ln();
                                            $this->myfpdf->SetFont('Times','B',20);
                                            $this->myfpdf->MultiCell($width,$heigth,'Billing: ','l',1,0); 
                                            $this->myfpdf->SetFont('Times','',20);
                                            $this->myfpdf->MultiCell($width,$heigth,$selected_assignment_detail->billing,'l',1,0);

                                            $this->myfpdf->ln();
                                            $this->myfpdf->SetFont('Times','B',20);
                                            $this->myfpdf->MultiCell($width,$heigth,'Bribe:','l',1,0); 
                                            $this->myfpdf->SetFont('Times','',20);  
                                            $this->myfpdf->MultiCell($width,$heigth,$selected_assignment_detail->bribe,'l',1,0);


                                            $this->myfpdf->ln();
                                            $this->myfpdf->SetFont('Times','B',20);
                                            $this->myfpdf->MultiCell($width,$heigth,'Food Packaging:','l',1,0); 
                                            $this->myfpdf->SetFont('Times','',20);  
                                            $this->myfpdf->MultiCell($width,$heigth,$selected_assignment_detail->food_packaging,'l',1,0);


                                            $this->myfpdf->ln();
                                            $this->myfpdf->SetFont('Times','B',20);
                                            $this->myfpdf->MultiCell($width,$heigth,'Food Itself:','l',1,0); 
                                            $this->myfpdf->SetFont('Times','',20);  
                                            $this->myfpdf->MultiCell($width,$heigth,$selected_assignment_detail->food_itself,'l',1,0);

                                            $this->myfpdf->ln();
                                            $this->myfpdf->SetFont('Times','B',20);
                                            $this->myfpdf->MultiCell($width,$heigth,'Loyalty Program:','l',1,0); 
                                            $this->myfpdf->SetFont('Times','',20);  
                                            $this->myfpdf->MultiCell($width,$heigth,$selected_assignment_detail->loyalty,'l',1,0);

                                            $this->myfpdf->ln();
                                            $this->myfpdf->SetFont('Times','B',20);
                                            $this->myfpdf->MultiCell($width,$heigth,'Extra Details:','l',1,0); 
                                            $this->myfpdf->SetFont('Times','',20);  
                                            $this->myfpdf->MultiCell($width,$heigth,$selected_assignment_detail->extra,'l',1,0);

                                           


                                            $this->myfpdf->SetFont('Times','',12);
                                            $base_path = base_url("uploads/");

                                            if($selected_assignment_detail->image1)
                                            {
					    $this->myfpdf->AddPage();
                                            $x = $this->myfpdf->GetX()+40;
                                            $y = $this->myfpdf->GetY()+10;
                                            
                                                  
                                                  $image_name = $selected_assignment_detail->image1;
                                                  $image_path = $base_path.$image_name;

                                            $this->myfpdf->Image($image_path,$x,$y,100);
                                            
                                            $this->myfpdf->SetFont('Times','',12);
                                            }
                                            
                                            


                                            if($selected_assignment_detail->image2)
                                            {
                                            $this->myfpdf->AddPage();
                                            $x1 = $this->myfpdf->GetX()+40;
                                            $y1 = $this->myfpdf->GetY()+10;
                                            $image_name = $selected_assignment_detail->image2;
                                            $image_path = $base_path.$image_name;
                                            $this->myfpdf->Image($image_path,$x1,$y1,100);
                                            
                                            $this->myfpdf->SetFont('Times','',12);
                                            
                                            }
					    
                                            if($selected_assignment_detail->image3)
                                            {
                                            $this->myfpdf->AddPage();
                                            $x1 = $this->myfpdf->GetX()+40;
                                            $y1 = $this->myfpdf->GetY()+10;
                                            $image_name = $selected_assignment_detail->image3;
                                            $image_path = $base_path.$image_name;
                                            $this->myfpdf->Image($image_path,$x1,$y1,100);
                                            
                                            $this->myfpdf->SetFont('Times','',12);
                                            }

                                            if($selected_assignment_detail->image4)
                                            {
                                            $this->myfpdf->AddPage();
                                            $x1 = $this->myfpdf->GetX()+40;
                                            $y1 = $this->myfpdf->GetY()+10;
                                            $image_name = $selected_assignment_detail->image4;
                                            $image_path = $base_path.$image_name;
                                            $this->myfpdf->Image($image_path,$x1,$y1,100);
                                            
                                            $this->myfpdf->SetFont('Times','',12);
                                            }

                                            if($selected_assignment_detail->image5)
                                            {
                                            $this->myfpdf->AddPage();
                                            $x1 = $this->myfpdf->GetX()+40;
                                            $y1 = $this->myfpdf->GetY()+10;
                                            $image_name = $selected_assignment_detail->image5;
                                            $image_path = $base_path.$image_name;
                                            $this->myfpdf->Image($image_path,$x1,$y1,100);
                                            
                                            
                                            }
                                            


                                            





ob_end_clean();
$this->myfpdf->Output('Report.pdf',"I");


?>
