<?php
/**
 * undocumented class //TODO:// Have to fix the mysql injection
 */
require_once "./classes/database-class.php";
class BusinessClass extends Mysqlc
{
    private $col = ["account_name","type","op_bal","dbcr","address","city","state","postal_code",
    "state_code","phone", "mobile", "email", "vat", "pan", "gstin", "aadhar", "bank_account","ifsc_code"
    ,"timestamp"];
    public function push($array,$conn)
    {
         $this->insert("business",$this->col,[$array["a"], $array["b"], $array["c"],
         $array["d"], $array["e"], $array["f"], $array["g"], $array["h"],
         $array["i"], $array["j"], $array["k"], $array["l"], $array["m"],
         $array["n"], $array["o"], $array["p"], $array["q"], $array["r"], time() ],$conn);
        return 1;
    }
}

?>