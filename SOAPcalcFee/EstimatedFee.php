<?php

class EstimatedFee {
  private $totalCreditHours;
  private $duration;
  const ONETIMEPAYMENT = 450;
  const FEEPERCREDIT = 375;
  const OTHERFEES = 900;

  public function EstimatedFee($totalCreditHours=0, $duration=0) {
    $this->totalCreditHours = $totalCreditHours;
    $this->duration = $duration;
  }

  function getTotalCreditHours() {
      return $this->totalCreditHours;
  }

  function getDuration() {
      return $this->duration;
  }

  function setTotalCreditHours($totalCreditHours) {
      $this->totalCreditHours = $totalCreditHours;
  }

  function setDuration($duration) {
      $this->duration = $duration;
  }

  public function getTotalAmount() {
    $totalAmount = EstimatedFee::ONETIMEPAYMENT + (EstimatedFee::OTHERFEES * $this->duration) + (EstimatedFee::FEEPERCREDIT * $this->totalCreditHours);
    return $totalAmount;
  }
  
  public function getYearlyAmount() {
    $yearlyAmount = $this->getTotalAmount() / $this->duration;
    return $yearlyAmount;
  }
 
}