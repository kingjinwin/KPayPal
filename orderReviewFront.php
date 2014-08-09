<?php
include 'orderReview.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelvin Jin's Store</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body >
  <div class="container" style="width:300px" >
    <form action='confirm.php' METHOD='POST' role="form">
        <div class="form-group">
        <label for="pp_email">Email address</label>
        <input type="email" class="form-control" id="pp_email" placeholder="Enter email" name="pp_email" readonly value="<?php echo $email;?>">
        </div>
        <div class="form-group">
        <label for="exampleInputPassword1">PayerStatus</label>
        <input type="text" class="form-control" id="pp_status" placeholder="Text input" name="pp_status" readonly value="<?php echo $payerStatus?>">
        </div>
        <div class="form-group">
        <label for="pp_firstname">First Name</label>
        <input type="text" class="form-control" id="pp_firstname" placeholder="Text input" name="pp_firstname" readonly value="<?php echo $firstName;?>">
        </div>
        <div class="form-group">
        <label for="pp_lastname">Last Name</label>
        <input type="text" class="form-control" id="pp_lastname" placeholder="Text input" name="pp_lastname" readonly value="<?php echo $lastName?>">
        </div>
        <div class="form-group">
        <label for="pp_cntry">Country Code</label>
        <input type="text" class="form-control" id="pp_cntry" placeholder="Text input" name="pp_cntry" readonly value="<?php echo $cntryCode;?>">
        </div>
        <div class="form-group">
        <label for="pp_stn">Ship to Name</label>
        <input type="text" class="form-control" id="pp_stn" placeholder="Text input" name="pp_stn" readonly value="<?php echo $SHIPTONAME; ?>">
        </div>
        <div class="form-group">
        <label for="pp_sts">Ship to Street</label>
        <input type="text" class="form-control" id="pp_sts" placeholder="Text input" name="pp_sts" readonly value="<?php echo $SHIPTOSTREET;?>">
        </div>
        <div class="form-group">
        <label for="pp_sts2">Ship to Street2</label>
        <input type="text" class="form-control" id="pp_sts2"  name="pp_sts2" readonly value="<?php echo $SHIPTOSTREET2;?>">
        </div>
        <div class="form-group">
        <label for="pp_stc">Ship to City</label>
        <input type="text" class="form-control" id="pp_stc" placeholder="Text input" name="pp_stc" readonly value="<?php echo $SCity;?>">
        </div>
        <div class="form-group">
        <label for="pp_stst">Ship to State</label>
        <input type="text" class="form-control" id="pp_stst" placeholder="Text input" name="pp_stst" readonly value="<?php echo $SState;?>">
        </div>
        <div class="form-group">
        <label for="pp_stz">Ship to Zip</label>
        <input type="text" class="form-control" id="pp_stz" placeholder="Text input" name="pp_stz" readonly value="<?php echo $SHIPTOZIP;?>">
        </div>
        <div class="form-group">
        <label for="pp_stcc">Ship to CountryCode</label>
        <input type="text" class="form-control" id="pp_stcc" placeholder="Text input" name="pp_stcc" readonly value="<?php echo $SHIPTOCOUNTRYCODE;?>">
        </div>
        <div class="form-group">
        <label for="pp_stcn">Ship to CountryName</label>
        <input type="text" class="form-control" id="pp_stcn" placeholder="Text input" name="pp_stcn" readonly value="<?php echo $SHIPTOCOUNTRYNAME;?>">
        </div>
        <div class="form-group">
        <label for="pp_as">Address Status</label>
        <input type="text" class="form-control" id="pp_as" placeholder="Text input" name="pp_as" readonly value="<?php echo $addressStatus;?>">
        </div>
        <div class="form-group">
        <label for="pp_amt">Amount</label>
        <input type="text" class="form-control" id="pp_amt" placeholder="Text input" name="pp_amt"readonly value="<?php echo $amt;?>">
        </div>
        <div class="form-group">
        <label for="pp_shipfee">Ship Fee</label>
        <input type="text" class="form-control" id="pp_shipfee" placeholder="Text input" name="pp_shipfee" readonly value="5" >
        </div>

        <input type="hidden" name="pp_payerid" value="<?php echo $payerId;?>"/>
        <input type="hidden" name="token" value="<?php echo $token;?>"/>
        <input type="hidden" name="paymentoption" value="PayPal"/>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.9.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
