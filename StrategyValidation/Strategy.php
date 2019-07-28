<?php


interface Strategy {
    function doValidation($input);
    
    function checkExist($input);
}
