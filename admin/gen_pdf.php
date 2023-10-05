<?php include('db_connect.php'); ?>
<?php
require '../pdf_config.php';

$id = $_GET['id'];

echo $id;

$qry = "SELECT * FROM `bids` where id = $id";
$run = mysqli_query($conn, $qry);
$data = mysqli_fetch_array($run);
// print_r($data);
$product_id =  $data['product_id'];
$qry1 =   "SELECT * FROM `products` where id =$product_id";
$run = mysqli_query($conn, $qry1);
$product = mysqli_fetch_array($run);

// print_r($product);
$user_id = $data['user_id'];
$qry2 =   "SELECT * FROM `users` where id =$user_id";
$run = mysqli_query($conn, $qry2);
$user = mysqli_fetch_array($run);
// print_r($user);

$id = $data['id'];
$name = $user['name'];
$email = $user['email'];
$pname = $product['name'];
$amt = $data['bid_amount'];
 $img = $product['img_fname'];
 $date = $data['date_created'];

 // send a pdf
// HTML content
$html = "
<!DOCTYPE html>
<html>
<head>
    <title>Bid Winning</title>
    <style>

           table {
            width : 100%;
            thead {
                width :100%;
            }
           }
           table
           {
             border: 2px solid rgba(0,0,0,0.6);
            text-align: center;
            color: black;
            border-collapse: collapse;
            
                
        
        }
           tr
           {
            border: 3px dark srgba(0,0,0,0.6);
            text-align: center;
            color: black;
           }

  </style>
         
</head>
<body>
      <h1 style='font-size: 24px;color: red;'>  WIN AUCTION DETAILS</h1>

      <div style='text-align:right;'>
        <b>SENDER:</b> ANKUSHMOTISARIYA && MY TEAM MEMBER
    </div>
    <div style='text-align: left;border-top:3px solid #000;'>
        <div style='font-size: 24px;color: #666;'>RECIVER DETIL</div>
    </div>

                   
<table border='1'>
<thead>

								<tr>
									<th >Id</th>
									<th >Name</th>
                                    <th >Email</th>
									<th >Product</th>
									<th >Amount</th>
                                    <th >Date</th>


								</tr>
							</thead>
                            <tbody>
                                <tr>
                                      
                                    <td>$id</td>
                                    <td>$name</td>
                                    <td>$email</td>
                                    <td>$pname</td>
                                    <td>$amt</td>
                                    <td>$date</td>

                           </tr>
                            </tbody>
</table> 


<div style='text-align:right;'>
 <b>PAYMENT:</b>
</div>
<div style='text-align: left;border-top:3px solid #000;'>
<div style='font-size: 24px;color:  #273746; text-align :center;'>PAYMENT DETIL</div>
</div>
<p><h style='font-size: 24px;color: #666;'> MAKE YOUR PAYMENT TO </h><br/>
NAME: ANKUSH MOTISARIYA</br>
BANK: BANK OF BARODA<br/>
A/C: 05346346543634563423<br/>
GPAY: 8849048885<br/>
MAIL: KINGOFEMBROIDARY@GMAIL.COM<br/>
</p>

<div style='text-align: left;border-top:3px solid #000;'>
<div style='font-size: 24px;color: #666;'></div>
</div>

<p style='margin: 10px; pedding: 10px;'>

<h style='font-size: 24px;color: #666;'>PROJECT MEMBER DETILS </h><br/>
    
NAME: MANSI KAKADIYA</br>
BANK: BANK OF INDIA<br/>
A/C: 056756897854<br/>
GPAY: 9054265057<br/>
MAIL: KAKADIYAMANSI84@GMAIL.COM<br/>
</p>

<div style='text-align: left;border-top:3px solid #000;'>
<div style='font-size: 24px;color: #666;'></div>
</div>

<p style='margin: 10px; pedding: 10px;'>

<h style='font-size: 24px;color: #666;'>PROJECT MEMBER DETILS </h><br/>
    
NAME: TAXIL LAKHANI</br>
BANK: HDFC BANK<br/>
A/C:  8456457891<br/>
GPAY:  9924139884<br/>
MAIL: TAXIL.LAKHANI3143@GMAIL.COM<br/>
</p>
<p style='font-size: 15px;color: #666;'><i>Note : ANY PROBLEAM TO PAYMENT PLEASE CONTACT TO MY FROM AND SEND MAIL</p>


<h1>Shipping</h1>
  <p style='font-size: 24px;color: red; text-align :center;'>..PICK UP YOUR WIN PAINTING FROM HERE..</p>
  <hr />
  <div style='font-size: 24px;color:  #273746; text-align :center;'>ADDRESS DETIL</div>
    
ADDRESS:45 ASHIRWAD RESIDENCY SURAT </br>
COUNTRY: INDIA<br/>
STATE : GUJRAT<br/>
CITY: SURAT<br/>
ZIP CODE: 341318<br/>
LANDMARK : CANAL ROAD<br/>
</p>
<div style='text-align: left;border-top:3px solid #000;'>
<div style='font-size: 24px;color: #666;'></div>
</div>
<p style='font-size: 15px;color: #666;'><i>Note : ANY PROBLEAM TO ADDRESS PLEASE CONTACT TO ME AND MY PROJECT MEMBER</p>
      <h1 style='color: red; text-align :center;'> ....THANK YOU FOR SELLING.... </h1>

</body>
      </html>

";

  


$dompdf->loadHtml($html);

// Set paper size (optional)
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF (inline)
$dompdf->stream();
?>


