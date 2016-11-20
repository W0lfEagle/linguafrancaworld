<?php
require_once('stripe-php-3.1.0/init.php');
// Set your secret key: remember to change this to your live secret key in production
// See your keys here https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey("sk_live_gehijoNI7z8ORnxrKd2MOgBQ");

// Get the credit card details submitted by the form
$token = $_POST['stripeToken'];

// Create the charge on Stripe's servers - this will charge the user's card
try {
$charge = \Stripe\Charge::create(array(
  "amount" => 1999, // amount in cents, again
  "currency" => "usd",
  "source" => $token,
  "description" => "One Class")
);
} catch(\Stripe\Error\Card $e) {
  // The card has been declined
	header("Location: paymentfail.php");
	exit;
}
header("Location: paymentthanks.php");
?>