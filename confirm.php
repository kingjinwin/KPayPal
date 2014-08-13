<?php
    /*==================================================================
     PayPal Express Checkout Call
     ===================================================================
    */
require_once ("paypalfunctions.php");
$PaymentOption = $_POST['paymentoption'];
if ( $PaymentOption == "PayPal" )
{
    /*
    '------------------------------------
    ' The paymentAmount is the total value of 
    ' the shopping cart, that was set 
    ' earlier in a session variable 
    ' by the shopping cart page
    '------------------------------------
    */
    
    $finalPaymentAmount =  $_POST['pp_amt']+$_POST['pp_shipfee'];
    $_SESSION['TOKEN'] = $_POST['token'];
    //$_SESSION['PaymentType'] = 'Authorization';
    $_SESSION['PaymentType'] = 'Sale';
    $_SESSION['currencyCodeType'] = 'USD';
    $_SESSION['payer_id'] = $_POST['pp_payerid'];
        
    /*
    '------------------------------------
    ' Calls the DoExpressCheckoutPayment API call
    '
    ' The ConfirmPayment function is defined in the file PayPalFunctions.jsp,
    ' that is included at the top of this file.
    '-------------------------------------------------
    */

    $resArray = ConfirmPayment ( $finalPaymentAmount );
    $ack = strtoupper($resArray["ACK"]);
    if( $ack == "SUCCESS" || $ack == "SUCCESSWITHWARNING" )
    {
        /*
        '********************************************************************************************************************
        '
        ' THE PARTNER SHOULD SAVE THE KEY TRANSACTION RELATED INFORMATION LIKE 
        '                    transactionId & orderTime 
        '  IN THEIR OWN  DATABASE
        ' AND THE REST OF THE INFORMATION CAN BE USED TO UNDERSTAND THE STATUS OF THE PAYMENT 
        '
        '********************************************************************************************************************
        */

        $transactionId      = $resArray["PAYMENTINFO_0_TRANSACTIONID"]; // ' Unique transaction ID of the payment. Note:  If the PaymentAction of the request was Authorization or Order, this value is your AuthorizationID for use with the Authorization & Capture APIs. 
        $transactionType    = $resArray["PAYMENTINFO_0_TRANSACTIONTYPE"]; //' The type of transaction Possible values: l  cart l  express-checkout 
        $paymentType        = $resArray["PAYMENTINFO_0_PAYMENTTYPE"];  //' Indicates whether the payment is instant or delayed. Possible values: l  none l  echeck l  instant 
        $orderTime          = $resArray["PAYMENTINFO_0_ORDERTIME"];  //' Time/date stamp of payment
        $amt                = $resArray["PAYMENTINFO_0_AMT"];  //' The final amount charged, including any shipping and taxes from your Merchant Profile.
        $currencyCode       = $resArray["PAYMENTINFO_0_CURRENCYCODE"];  //' A three-character currency code for one of the currencies listed in PayPay-Supported Transactional Currencies. Default: USD. 
        $feeAmt             = $resArray["PAYMENTINFO_0_FEEAMT"];  //' PayPal fee amount charged for the transaction
        //$settleAmt          = $resArray["PAYMENTINFO_0_SETTLEAMT"];  //' Amount deposited in your PayPal account after a currency conversion.
        $taxAmt             = $resArray["PAYMENTINFO_0_TAXAMT"];  //' Tax charged on the transaction.
        //$exchangeRate       = $resArray["PAYMENTINFO_0_EXCHANGERATE"];  //' Exchange rate if a currency conversion occurred. Relevant only if your are billing in their non-primary currency. If the customer chooses to pay with a currency other than the non-primary currency, the conversion occurs in the customer's account.
        
        /*
        ' Status of the payment: 
                'Completed: The payment has been completed, and the funds have been added successfully to your account balance.
                'Pending: The payment is pending. See the PendingReason element for more information. 
        */
        
        $paymentStatus  = $resArray["PAYMENTINFO_0_PAYMENTSTATUS"]; 

        /*
        'The reason the payment is pending:
        '  none: No pending reason 
        '  address: The payment is pending because your customer did not include a confirmed shipping address and your Payment Receiving Preferences is set such that you want to manually accept or deny each of these payments. To change your preference, go to the Preferences section of your Profile. 
        '  echeck: The payment is pending because it was made by an eCheck that has not yet cleared. 
        '  intl: The payment is pending because you hold a non-U.S. account and do not have a withdrawal mechanism. You must manually accept or deny this payment from your Account Overview.       
        '  multi-currency: You do not have a balance in the currency sent, and you do not have your Payment Receiving Preferences set to automatically convert and accept this payment. You must manually accept or deny this payment. 
        '  verify: The payment is pending because you are not yet verified. You must verify your account before you can accept this payment. 
        '  other: The payment is pending for a reason other than those listed above. For more information, contact PayPal customer service. 
        */
        
        $pendingReason  = $resArray["PAYMENTINFO_0_PENDINGREASON"];  

        /*
        'The reason for a reversal if TransactionType is reversal:
        '  none: No reason code 
        '  chargeback: A reversal has occurred on this transaction due to a chargeback by your customer. 
        '  guarantee: A reversal has occurred on this transaction due to your customer triggering a money-back guarantee. 
        '  buyer-complaint: A reversal has occurred on this transaction due to a complaint about the transaction from your customer. 
        '  refund: A reversal has occurred on this transaction because you have given the customer a refund. 
        '  other: A reversal has occurred on this transaction due to a reason not listed above. 
        */
        
        $reasonCode     = $resArray["PAYMENTINFO_0_REASONCODE"];   
    }
    else  
    {
        //Display a user friendly Error on the page using any of the following error information returned by PayPal
        $ErrorCode = urldecode($resArray["L_ERRORCODE0"]);
        $ErrorShortMsg = urldecode($resArray["L_SHORTMESSAGE0"]);
        $ErrorLongMsg = urldecode($resArray["L_LONGMESSAGE0"]);
        $ErrorSeverityCode = urldecode($resArray["L_SEVERITYCODE0"]);
        
        echo "GetExpressCheckoutDetails API call failed. ";
        echo "Detailed Error Message: " . $ErrorLongMsg;
        echo "Short Error Message: " . $ErrorShortMsg;
        echo "Error Code: " . $ErrorCode;
        echo "Error Severity Code: " . $ErrorSeverityCode;
    }
}       
        
$invoice = 'K'.rand(100,999);
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
  <body>
    <div class="container" style="width:300px" >
    <h3>Invoice Review</h3>
        <div class="table-responsive">
          <table class="table">
          <tr>
            <th>Invoice</td>
            <th>Transaction</td>
            <th>Amount</td>
          </tr>
          <tr>
            <td><?php echo $invoice; ?></td>
            <td><?php echo $transactionId; ?></td>
            <td><?php echo $amt;?></td>
          </tr>
          </table>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.9.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
