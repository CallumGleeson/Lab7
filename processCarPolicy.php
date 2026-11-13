<?php
date_default_timezone_set("Europe/Dublin");

include("CarPolicy2.php");

$policyNumber = $_POST["policyNumber"];
$yearlyPremium = $_POST["yearlyPremium"];
$dateOfLastClaim = $_POST["dateOfLastClaim"];

$myCarpolicy = new CarPolicy($XM123456, $yearlyPremium);
$myCarpolicy->setDateOfLastClaim($dateOfLastClaim);

echo "Your initial premium is " . $yearlyPremium . "<br>";
echo "Your discounted premium is " . $myCarpolicy->getDiscountedPremium();