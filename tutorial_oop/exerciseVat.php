<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.min.js"></script>
    <title>Loan</title>
    <style>
        .cont-body
        {
            padding-top:2%;
        }
        .txt-align
        {
            text-align:center;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="row">
                <div class="col-sm cont-body">
                    <label for="">Loan Amount</label>
                    <input class="form-control" type="text" name="txtamt" id="txtamt" placeholder="Rs">
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <label for="">Period</label>
                    <input class="form-control" type="text" name="txtperiod" id="txtperiod" placeholder="Months">
                </div>
            </div>
            <div class="row cont-body">
                <div class="col-sm">
                    <div class="custom-control custom-radio">
                        <input value="0.05" type="radio" id="homeln" name="ln" class="custom-control-input" checked>
                        <label class="custom-control-label" for="homeln">Home Loan</label>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="custom-control custom-radio">
                        <input type="radio" value="0.1" id="carln" name="ln" class="custom-control-input">
                        <label class="custom-control-label" for="carln">Car Loan</label>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="custom-control custom-radio">
                        <input type="radio" value="0.06" id="home2ln" name="ln" class="custom-control-input">
                        <label class="custom-control-label" for="home2ln">Home Loan 2</label>
                    </div>
                </div>
            </div>
            <div class="row cont-body txt-align">
                <div class="col-sm">
                    <input type="submit" id="btncal" class="btn btn-primary" name="btncal" value="Calculate">
                </div>
            </div>
        </form>
    </div>
    <?php

        Class loan
        {
            //instance variable
            private $period;
            private $amt;            

            public function setPeriod($newval)
            {
                $this->period = $newval;
            }

            public function getPeriod()
            {
                return $this->period;
            }

            public function setAmt($newval)
            {
                $this->amt = $newval;
            }

            public function getAmt()
            {
                return $this->amt;
            }

        }

        Class carLoan extends loan
        {
            public function calCarLoan($amt, $period)
            {
                static $car_loan_interest = 1.1;
                return ($amt * $car_loan_interest)/$period;
            }
        }

        Class homeLoan extends loan
        {
            
            public function calHomeLoan($amt, $period)
            {
                static $home_loan_interest = 1.05;
                return ($amt * $home_loan_interest)/$period;
            }
        }

        Class homeLoan2 extends homeLoan
        {
            public function calHomeLoan($amt, $period)
            {
                static $home2_loan_interest = 1.06;
                return ($amt * $home2_loan_interest)/$period;
            }
        }


        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $type_ln = $_POST["ln"];
            $amt = $_POST["txtamt"];
            $period = $_POST["txtperiod"];
            
            switch ($type_ln) {
                case 0.05:
                    $new_loan = new homeLoan;
                    $new_loan->setPeriod($period);
                    $new_loan->setAmt($amt);
                    echo "Loan Amount: ".$new_loan->calHomeLoan($new_loan->getAmt(), $new_loan->getPeriod());
                    break;

                case 0.1:
                    $new_loan = new carLoan;
                    $new_loan->setPeriod($period);
                    $new_loan->setAmt($amt);
                    echo "Loan Amount: ".$new_loan->calCarLoan($new_loan->getAmt(), $new_loan->getPeriod());
                    break;

                case 0.06:
                    $new_loan = new homeLoan2;
                    $new_loan->setPeriod($period);
                    $new_loan->setAmt($amt);
                    echo "Loan Amount: ".$new_loan->calHomeLoan($new_loan->getAmt(), $new_loan->getPeriod());
                    break;
            }
        }
    ?>
</body>
</html>