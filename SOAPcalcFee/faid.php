<?php
/*Author: Low Ee Hui (18WMR08374) RSD3G2*/
class faid {

    private $percentages, $fee;

    public function faid($percentages = 0.5, $fee = 20000) {
        $this->percentages = $percentages;
        $this->fee = $fee;
    }

    public function getPercentages() {
        return $this->percentages;
    }

    public function getFee() {
        return $this->fee;
    }

    public function setPercentages($percentages) {
        $this->percentages = $percentages;
    }

    public function setFee($fee) {
        $this->fee = $fee;
    }
    
    public function gettotalsup(){
        $totalsup = $this->percentages * $this->fee;
        return $totalsup;
    }
    
    public function getmonthlysup(){
        $monthlysup = $this->gettotalsup() / 12;
        return $monthlysup;
    }

}
