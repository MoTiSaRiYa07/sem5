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
$pname = $product['name'];
$amt = $data['bid_amount'];

// send a pdf
// HTML content
$html = "
<!DOCTYPE html>
<html>
<head>
    <title>Bid Winning</title>
</head>
<body style='color:red'>
<table>
<thead>
								<tr>
									<th >#</th>
									<th >Name</th>
									<th >Product</th>
									<th >Amount</th>
								</tr>
							</thead>
                            <tbody>
                                <tr>
                                    <td>$id</td>
                                    <td>$pname</td>
                                    <td>$amt</td>
                                </tr>
                            </tbody>
</table>    

<form>
    <input type='text'>
</form>
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
