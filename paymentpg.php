<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body {
      margin: 80px 15%;
      font-family: Arial;
      font-size: 17px;
      padding: 8px;
    }

    * {
      box-sizing: border-box;
    }

    .row {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-wrap: wrap;
      flex-wrap: wrap;
      margin: 0 -16px;
    }

    .col-25 {
      -ms-flex: 35%;
      flex: 35%;
    }

    .col-50 {
      -ms-flex: 40%;
      flex: 40%;
    }

    .col-75 {
      -ms-flex: 60%;
      flex: 60%;
    }

    .col-25,
    .col-50,
    .col-75 {
      padding: 0 16px;
    }

    .container {
      background-color: #f2f2f2;
      padding: 5px 20px 15px 20px;
      border: 1px solid lightgrey;
      border-radius: 3px;
    }

    input[type=text] {
      width: 100%;
      margin-bottom: 20px;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    label {
      margin-bottom: 10px;
      display: block;
    }

    .icon-container {
      margin-bottom: 20px;
      padding: 7px 0;
      font-size: 24px;
    }

    .btn {
      background-color: #04AA6D;
      color: white;
      padding: 12px;
      margin: 10px 0;
      border: none;
      width: 100%;
      border-radius: 3px;
      cursor: pointer;
      font-size: 17px;
    }

    .btn:hover {
      background-color: #45a049;
    }

    a {
      color: #2196F3;
    }

    hr {
      border: 1px solid lightgrey;
    }

    span.price {
      float: right;
      color: black;
    }

    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
    @media (max-width: 800px) {
      .row {
        flex-direction: column-reverse;
      }
      .col-25 {
        margin-bottom: 20px;
      }
    }
  </style>
</head>
<body>

    

<h2>Checkout</h2>
<p></p>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="addpurchase.php" method="post">
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="">
              </div>
            </div>
          </div>
          
        </div>

        <?php
          $useremail = $_POST['useremail'];
          $eventID = $_POST['eventID'];
          $ticketCount = $_POST['ticketcountdropdown'];
          $currentusername = $_POST['username'];
          $eventName = $_POST['eventname'];
          $ticketPrice = $_POST['ticketprice'];
        ?>

        <input type="hidden" name="useremail" value="<?php echo $useremail; ?>">
        <input type="hidden" name="eventID" value="<?php echo $eventID; ?>">
        <input type="hidden" name="ticketcountdropdown" value="<?php echo $ticketCount; ?>">
        <input type="hidden" name="username" value="<?php echo $currentusername; ?>">
        <input type="hidden" name="eventname" value="<?php echo $eventName; ?>">
        <input type="hidden" name="ticketprice" value="<?php echo $ticketPrice; ?>">

        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input type="submit" value="Continue to checkout" class="btn">
      </form>

      

    </div>
  </div>
  <div class="col-25">
    <div class="container">
      <h4>Purchase Summery</h4>
      <p>Event Name <span class="price"><b><?php echo $eventName; ?></b></span></p>
      <p>Single Ticket Price <span class="price"><?php echo $ticketPrice; ?> LKR</span></p>
      <p>Number of Tickets<span class="price"><?php echo $ticketCount; ?> Tickets</span></p>
      <p>Additional Fees<span class="price">00 LKR</span></p>

      <hr>
      <p>Total <span class="price" style="color:black"><b><?php $totalPrice=$ticketPrice*$ticketCount; echo $totalPrice; ?> LKR</b></span></p>
    </div>
  </div>
</div>

</body>
</html>
