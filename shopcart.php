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
  <body>
    <div class="container" style="width:500px" >
    <h3>PayPal Test--Shop Cart!</h3>
    <form action='expresscheckout.php' METHOD='POST' role="form" class="form-horizontal">
    <div class="form-group">
        <img src="resources/images/apple-thumb.jpg" alt="apple" class="img-thumbnail" style="float:left;">
        <label for="amt" class="col-sm-2 control-label" style="margin-top:26px;" >Amount:</label>
        <div class="col-sm-2" style="margin-top:16px;">
            <input name='amt'type="text" id="amt" class="form-control" value="10" readonly >
        </div>
    </div>
     <div class="form-group">
    <input type='image' name='submit' id="img1" onclick="changeimg();"  src='https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif' border='0' align='top' alt='Check out with PayPal'/>
    </div>
    </form>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.9.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script>
    function changeimg(){
       $("#img1").attr("src","resources/images/placeordering.gif"); 
    }
    </script>
  </body>
</html>
