<?php include('db_connect.php'); ?>
<?php
require '../pdf_config.php';

$id = $_GET['id'];
// 
// echo $id;

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

?>
 <!-- send a pdf -->
 <!-- HTML conten -->
<!DOCTYPE html>
<html>

<head>
    <title>Bid Winning</title>

    <style>
        table {
            width: 100%;

        }
        thead {
            width: 100%;
        }

        table {
             /* border: 1px solid rgba(0,0,0,0.6); */
            text-align: center;
            color: black;
            border-collapse: collapse;
        }

        tr {
            border: 3px dark srgba(0, 0, 0, 0.6);
            text-align: center;
            color: black;
        }
    </style>

</head>

<body>
    <h1> WIN AUCTION DETAILS</h1>
    <table border='1'>
        <thead>

            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Product</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Img</th>
            </tr>
        </thead>
        <tbody>
            <tr>

                <td><?php echo $id ?></td>
                <td><?php echo $name ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $pname ?></td>
                <td><?php echo $amt ?></td>
                <td><?php echo $date ?></td>
                <td><img src='<?php echo "../admin/assets/uploads/$img" ?>' width="20px"></td>

            </tr>
        </tbody>
    </table>
</body>

</html>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- <button id="printButton">Print This Page</button> -->

<script>
    $(document).ready(function() {
        // $("#printButton").click(function() {
            // $(this).hide();
            window.print();
        });
    // });
</script>