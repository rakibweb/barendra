<?php
    include 'Model/connect_db.php';
    require('pdf/fpdf.php');
    
    $OrderCode = $_POST["txtOrderCOde"];
    $ShippingCharge = $_POST["txtShipping"];
    
    mysqli_query($con, "UPDATE tblorder SET Shippingcharge='$ShippingCharge' WHERE ordercode='$OrderCode'");
    //get invoices data
    $query = mysqli_query($con, "SELECT o.CustomerId, o.ShippingAddress, o.PaymentMethod, o.AlternativeNumber, o.Amount, o.date, o.Status, c.Name, c.Gender, c.Email, c.Phone, 
    c.UserName, c.Password, c.District, c.ShippingAddress, o.Shippingcharge, o.Discount FROM tblorder o INNER JOIN user c ON o.CustomerId=c.Id WHERE o.ordercode='$OrderCode'");
    $invoice = mysqli_fetch_assoc($query);
    $date = date_create($invoice['date']);
    //A4 width : 219mm
    //default margin : 10mm each side
    //writable horizontal : 219-(10*2)=189mm
    
    $pdf = new FPDF('P','mm','A4');
        
    $pdf->SetTopMargin(50);
    
    $pdf->AddPage();
    
    //set font to arial, bold, 14pt
    $pdf->SetFont('Arial','B',14);
    
    //Cell(width , height , text , border , end line , [align] )
    
    $pdf->Cell(130	,5,'barendro.com',0,0);
    $pdf->Cell(59	,5,'INVOICE',0,1);//end of line
    
    //set font to arial, regular, 12pt
    $pdf->SetFont('Arial','',12);
    
    $pdf->Cell(130	,5,'367-Anuranan, Boyalia Thanar More Alupotti',0,0);
    $pdf->Cell(59	,5,'',0,1);//end of line
    
    $pdf->Cell(130	,5,'Rajshahi- 6100, Bangladesh',0,0);
    $pdf->Cell(25	,5,'Date',0,0);
    $pdf->Cell(34	,5,date_format($date,"d M Y"),0,1);//end of line
    
    $pdf->Cell(130	,5,'Phone [09 669 966 888]',0,0);
    $pdf->Cell(25	,5,'Invoice #',0,0);
    $pdf->Cell(34	,5,$OrderCode,0,1);//end of line
    
    $pdf->Cell(130	,5,'Email [support@barendro.com]',0,0);
    $pdf->Cell(25	,5,'',0,0);
    $pdf->Cell(34	,5,'',0,1);//end of line
    
    //make a dummy empty cell as a vertical spacer
    $pdf->Cell(189	,10,'',0,1);//end of line
    
    //billing address
    $pdf->Cell(100	,5,'Bill to',0,1);//end of line
    
    //add dummy cell at beginning of each line for indentation
    $pdf->Cell(10	,5,'',0,0);
    $pdf->Cell(90	,5,$invoice['Name'],0,1);
    
    $pdf->Cell(10	,5,'',0,0);
    $pdf->Cell(90	,5,$invoice['ShippingAddress'],0,1);
    
    $pdf->Cell(10	,5,'',0,0);
    $pdf->Cell(90	,5,$invoice['Phone'],0,1);
    
    $pdf->Cell(10	,5,'',0,0);
    $pdf->Cell(90	,5,$invoice['Email'],0,1);
    
    //make a dummy empty cell as a vertical spacer
    $pdf->Cell(189	,10,'',0,1);//end of line
    
    //invoice contents
    $pdf->SetFont('Arial','B',12);
    
    $pdf->Cell(100	,5,'Description',1,0);
    $pdf->Cell(15	,5,'Qty',1,0);
    $pdf->Cell(15	,5,'Price',1,0);
    $pdf->Cell(25	,5,'Discount',1,0);
    $pdf->Cell(34	,5,'Amount',1,1);//end of line
    
    $pdf->SetFont('Arial','',10);
    
    //Numbers are right-aligned so we give 'R' after new line parameter
    
    //items
    $query = mysqli_query($con, "SELECT a.ProductID, p.ProductName, a.Merchant, a.UnitPrice, a.Quantity, c.Discount FROM tblorderdetails a INNER JOIN tblproducts p ON 
    a.ProductId=p.ProductID INNER JOIN tblorder c ON a.OrderID=c.ordercode WHERE c.ordercode='$OrderCode'");
    $discount = 0; //total tax
    $amount = 0; //total amount
    
    //display the items
    while($item = mysqli_fetch_array($query)){
    	$pdf->Cell(100	,7,$item['ProductName'],1,0);
    	//add thousand separator using number_format function
    	$pdf->Cell(15	,7,$item['Quantity'],1,0);
    	$pdf->Cell(15	,7,$item['UnitPrice'],1,0);
    	$pdf->Cell(25	,7,number_format($item['Discount']),1,0);
    	$pdf->Cell(34	,7,number_format($item['UnitPrice']*$item['Quantity']-$item['Discount']),1,1,'R');//end of line
    	//accumulate tax and amount
    	$discount += $item['Discount'];
    	$amount += $item['UnitPrice']*$item['Quantity'];
    }
    
    //summary
    $pdf->Cell(130	,5,'',0,0);
    $pdf->Cell(25	,5,'Subtotal',0,0);
    $pdf->Cell(8	,5,'Tk.',1,0);
    $pdf->Cell(26	,5,number_format($amount),1,1,'R');//end of line
    
    $pdf->Cell(130	,5,'',0,0);
    $pdf->Cell(25	,5,'Discount',0,0);
    $pdf->Cell(8	,5,'Tk',1,0);
    $pdf->Cell(26	,5,number_format($discount),1,1,'R');//end of line
    
    //$pdf->Cell(130	,5,'',0,0);
    //$pdf->Cell(25	,5,'Tax Rate',0,0);
    //$pdf->Cell(4	,5,'Tk.',1,0);
    //$pdf->Cell(30	,5,'10%',1,1,'R');//end of line
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(130	,5,'',0,0);
    $pdf->Cell(25	,5,'Total Due',0,0);
    $pdf->Cell(8	,5,'Tk.',1,0);
    $pdf->Cell(26	,5,number_format($amount - $discount),1,1,'R');//end of line
    
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(130	,10,'______________________',0,1,'L');//end of line
    
    $pdf->Cell(130	,5,'Manager',0,1,'L');//end of line
    
    $pdf->Cell(130	,5,'',0,0);
    $pdf->Cell(25	,5,'Shipping Cost:',0,0);
    $pdf->Cell(4	,5,'',0,'R');
    $pdf->Cell(10	,5,'Tk',0,'R');
    $pdf->Cell(5	,5,$invoice['Shippingcharge'],0,1,'R');//end of line
    
    
    $pdf->Output();
//end pdf
?>
