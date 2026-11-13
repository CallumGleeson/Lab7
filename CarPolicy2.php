<?php

class CarPolicy
{
    public $policyNumber;
    public $yearlyPremium;
    public $dateOfLastClaim;

    public function __construct($policyNumber, $yearlyPremium)
    {
        $this->policyNumber = $policyNumber;
        $this->yearlyPremium = $yearlyPremium;
    }

    public function setDateOfLastClaim($dateOfLastClaim)
    {
        $this->dateOfLastClaim = $dateOfLastClaim;
    }

    public function getTotalYearsNoClaims()
    {
        $currentDate = new DateTime();
        $lastDate = new DateTime($this->dateOfLastClaim);
        $interval = $currentDate->diff($lastDate);

        return $interval->format("%y");
    }
    public function getDiscount()
    {
        $years = $this->getTotalYearsNoClaims();

        if ($years > 5) {
            return $this->yearlyPremium * 0.15;
        } elseif ($years >= 3) {
            return $this->yearlyPremium * 0.10;
        } else {
            return 0;
        }
    }

    public function getDiscountedPremium()
    {
        return $this->yearlyPremium - $this->getDiscount();
    }
    public function __toString()
    {
        return "PN: " . $this->policyNumber;
    }
}