<html>
    <head>
        <title>Net Salary</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Heebo:wght@300&family=Poppins:wght@100;200;300;400;500;600&display=swap" />
        <link rel="styleSheet" type="text/css" href="css/bootstrap.min.css" />
        <link rel="styleSheet" type="text/css" href="css/base.css" />
    </head>
    <body class="bg-dark">
        <div class="wrapper container m-auto bg-dark text-light">
            <h1 class="m-2 text-secondary">Net Salary</h1>
            <form class="form form-bordered" action="netsalary.php" method="GET">
                <label class="form-label m-2">Basic Salary</label> 
                <input class="form-control m-2" type="text" name="basicSalary"/>
                <label class="form-label m-2">Tax Rate</label> 
                <input class="form-control m-2" type="text" name="taxRate"/>
                <label class="form-label m-2">Bonus Rate</label> 
                <input class="form-control m-2" type="text" name="bonusRate"/>
                <input class="btn btn-success m-2" type="submit" name="getNetSalary" value="Get Net Salary"/>
            </form>  

            <?php
                if(isset($_GET['getNetSalary'])){
                    //Collact Data
                    $basicSalary = $_GET['basicSalary'];
                    $taxRate     = $_GET['taxRate'];
                    $bonusRate   = $_GET['bonusRate'];
                    //Check Data Valid && No
                    if($basicSalary == null){
                        echo'<div class="alert alert-danger m-2" >Please Insert value of Beasic Salary</div>';
                    }elseif(!is_numeric($basicSalary)){
                        echo'<div class="alert alert-danger m-2">Value of Beasic Salary Must Be Numpers</div>';
                    }elseif($taxRate == null){
                        echo'<div class="alert alert-danger m-2">Please Insert value of Tax Rate</div>';   
                    }elseif(!is_numeric($taxRate)){
                        echo'<div class="alert alert-danger m-2">Value of Tax Rate Must Be Numpers</div>';
                    }elseif(!($taxRate >= 0 && $taxRate <= 1 )){
                        echo'<div class="alert alert-danger m-2">Value of Tax Rate Must Be 0 Between 1 </div>';
                    }elseif($bonusRate == null){
                        echo'<div class="alert alert-danger m-2">Please Insert value of Bonus Rate</div>'; 
                    }elseif(!is_numeric($bonusRate)){
                        echo'<div class="alert alert-danger m-2">Value of Bonus Rate Must Be Numpers </div>';
                    }elseif(!($bonusRate >= 0 && $bonusRate <= 1 )){
                        echo'<div class="alert alert-danger m-2">Value of Bonus Rate Must Be  0 Between 1</div>';
                    }else{
                        //opretion
                        $taxvalue   = $basicSalary * $taxRate ;
                        $bonusvalue = $basicSalary * $bonusRate ;
                        $netsalary  = $basicSalary - $taxvalue + $bonusvalue;
                        //output
                        echo '
                        <table class="table table-radius m-2 ">
                            <tr class="table-info">
                                <td>Beasic Salary</td>
                                <td>'.$basicSalary.'</td>
                            </tr>
                            <tr class="table-info">
                                <td>Tax Rate</td>
                                <td>'.$taxRate.'</td>
                            </tr>
                            <tr class="table-info">
                                <td>Tax Value</td>
                                <td>'.$taxvalue.'</td>
                            </tr>
                            <tr class="table-info">
                                <td>Bonus Rate</td>
                                <td>'.$bonusRate.'</td>
                            </tr>
                            <tr class="table-info">
                                <td>Bonus Value</td>
                                <td>'.$bonusvalue.'</td>
                            </tr>
                            <tr class="table-success">
                                <th>Net Salary</th>
                                <th>'.$netsalary.'</th>
                            </tr>
                        </table>';
                    }
                }
            ?> 
            
        </div>
        <script src="js/bootstrap.min"></script>
        <script src="js/plugins.js"></script>
    </body>
</html>