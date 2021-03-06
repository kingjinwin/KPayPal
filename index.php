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
    <div class="container" style="width:300px" >
    <h3>PayPal Test!</h3>
    <form action='shopcart.php' METHOD='POST' role="form">
    <img src="resources/images/apple-full2.jpg" alt="apple" class="img-thumbnail">
    <div class="form-group">
        <label for="amt">Amount:</label>
        <input name='amt'type="text" id="amt" class="form-control" value="10" readonly />
    </div>
    <input type="hidden" name="sku" value="sku-1">
    <button type="submit" class="btn btn-success">Add to cart</button>
    </form>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.9.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
