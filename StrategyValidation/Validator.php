<?php
/*Author: Chan Vin Sheng (18WMR08274) RSD3G2*/
require 'Strategy.php';

class Validator {
  private $strategy;
  
  public function __construct($strategy) {
    $this->strategy = $strategy;
  }
  
  public function executeValidatorStrategy($input) {
    return $this->strategy->doValidation($input);
  }
  
   public function executeExistStrategy($input) {
    return $this->strategy->checkExist($input);
  }
  
}
