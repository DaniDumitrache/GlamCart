<?php
class Convert
{

       public function GetConvertPrice($amount)
       {



              $eur = 4.90;

              switch ($_SESSION['curency']) {


                     case 'RON':
                            $total = $eur * $amount;
                            $total = number_format((float)$total, 2, '.', '') . " RON";
                            break;

                     default:
                            $total = number_format((float)$amount, 2, '.', '') . "&euro;";
                            break;
              }

              return $this->total = $total;
       }
}
