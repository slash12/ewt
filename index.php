<?php require("includes/dbconnect.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HomePage | NSS</title>
    <link rel="icon" href="img/icons/tab-icon.png">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/izitoast.min.css">
    <link rel="stylesheet" href="css/fontawesomeall.css">
    <script src="js/moment.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/izitoast.min.js"></script>
    <script>
    //View Share
        function getshare()
        {
            $.ajax({
                    type: "post",
                    url: "includes/getshare.php",
                    success: function(data)
                    {                        
                        if(data.trim() == "fail")
                        {
                            iziToast.error({
                                    title: 'Error',
                                    message: 'Fail to get share details',
                                });
                        }
                        else
                        {
                            var t = $('#tblshare').DataTable();
                            var data_json = JSON.parse(data);
                            data_json.forEach(function(item, index)
                            {
                                t.row.add([item.share, "<button onclick='update_share(this)' type='button' title='Update' class='up-share' data-shareval='"+item.share+"' data-shareid='"+item.share_id+"'><i class='fas fa-pencil-alt'></i></button> | <button onclick='delete_share(this)' title='Delete' type='button' class='del-share' data-shareid="+item.share_id+"><i class='fas fa-trash'></i></button>"]).draw(false);
                            });

                            data_json.forEach(function(item, index)
                            {
                                $("#sltshare").append("<option value='"+item.share_id+"'>"+item.share+"</option>");
                            });
                        }
                    }       
                });
        }
    //View Share

    //View Portfolio
        function getPortfolio()
        {
            $.ajax({
                    type: "post",
                    url: "includes/getportfolio.php",
                    success: function(data)
                    {                        
                        if(data.trim() == "fail")
                        {
                            iziToast.error({
                                    title: 'Error',
                                    message: 'Fail to get portfolio details',
                                });
                        }
                        else
                        {
                            var t = $('#tblportfolio').DataTable();
                            var data_json = JSON.parse(data);
                            data_json.forEach(function(item, index)
                            {
                                t.row.add([item.portfolio, "<button onclick='update_portfolio(this)' type='button' title='Update' class='up-portfolio' data-portfolioval='"+item.portfolio+"' data-portfolioid='"+item.portfolio_id+"'><i class='fas fa-pencil-alt'></i></button> | <button onclick='delete_portfolio(this)' title='Delete' type='button' class='del-portfolio' data-portfolioid="+item.portfolio_id+"><i class='fas fa-trash'></i></button>"]).draw(false);
                            });

                            data_json.forEach(function(item, index)
                            {
                                $("#sltportfolio").append("<option value='"+item.portfolio_id+"'>"+item.portfolio+"</option>");
                            });
                        }
                    }       
                });
        }
    //View Portfolio

        $(document).ready(function() {
            getshare();
            getPortfolio();
            $("#btnups").hide();
            $("#btnupp").hide();
        });
    </script>
</head>
<body>
<!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">EWT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor03">
            <ul class="navbar-nav mr-auto">
                <!-- <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li> -->
            </ul>
            <!-- <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form> -->            
        </div>
    </nav>
<!-- /Navbar -->

<!-- Tab for share, portfolio, transaction, transaction list, transaction chart-->
    <div class="container body-cont">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#share">Share</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#portfolio">Portfolio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#transaction">Transaction</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#transaction_list">Transaction List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#transaction_chart">Transaction Chart</a>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade" id="share">
                <div class="container body-cont">
                    <form id="frmshare" method="post">
                        <div class="row">
                            <div class="col-sm-2 txt-align">
                                <label for="sname">Share Name</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="hidden" name="hfsid" id="hfsid">
                                <input type="text" class="form-control" name="txtsname" id="txtsname" placeholder="Enter Share Name">                    
                            </div>
                            <div class="col-sm-3">
                                <input type="button" class="btn btn-primary" name="btnadds" id="btnadds" Value="Save Share">  
                                <input type="button" class="btn btn-primary" name="btnups" id="btnups" Value="Update Share">                    
                            </div>
                        </div>
                    </form>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm sub-body">
                            <table class="table table-hover table-dark" id="tblshare">
                                <thead>
                                    <tr>
                                        <th>Share Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody-share">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Ajax Share -->
                <script>
                //Insert Share 
                    $('#btnadds').on('click',function(e) 
                    {
                    var sname = $("#txtsname").val();
                    $.ajax({
                            data: {sname:sname},
                            type: "post",
                            url: "includes/addshare.php",
                            success: function(data)
                            {                            
                                if(data.trim() == "empty")
                                {
                                    iziToast.error({
                                        title: 'Error',
                                        message: 'Please enter a share name',
                                    });
                                }

                                if(data.trim() == "success")
                                {
                                    iziToast.success({
                                        title: 'Success',
                                        message: 'Share was successfully added',
                                    });
                                    $("#txtsname").val("");
                                    setTimeout(location.reload.bind(location), 1000);                                
                                }                              
                            }       
                    });
                    });
                //Insert Share 

                //Update Share
                    function update_share(r)
                    {
                        var share = $(r).attr("data-shareval");
                        var share_id = $(r).attr("data-shareid");

                        $("#txtsname").val(share);
                        $("#hfsid").val(share_id);
                        $("#btnadds").hide();
                        $("#btnups").show();
                    }
                    
                    $("#btnups").on("click", function()
                    {
                        $("#btnadds").show();
                        $("#btnups").hide();

                        var share = $("#txtsname").val();
                        var share_id = $("#hfsid").val();

                        // console.log(share);

                        $.ajax({
                            type: "post",
                            data:  {share:share, share_id:share_id},
                            url:   "includes/upshare.php",
                            success: function(data)
                            {
                                if(data.trim() == "success")
                                {
                                    iziToast.success({
                                            title: 'Success',
                                            message: 'Share successfully updated!',
                                        });
                                    setTimeout(location.reload.bind(location), 1000);        
                                }

                                if(data.trim() == "fail")
                                {
                                    iziToast.error({
                                            title: 'Error',
                                            message: 'Error updating share',
                                        });
                                }
                            }       
                        });
                    });
                //Update Share
                
                //Delete Share
                    function delete_share(r)
                    {
                        var share_id = $(r).attr("data-shareid");
                        $.ajax({
                            type: "post",
                            data:  {share_id:share_id},
                            url:   "includes/delshare.php",
                            success: function(data)
                            {
                                if(data.trim() == "success")
                                {
                                    iziToast.success({
                                            title: 'Success',
                                            message: 'Share successfully deleted!',
                                        });
                                    setTimeout(location.reload.bind(location), 1000);        
                                }

                                if(data.trim() == "fail")
                                {
                                    iziToast.error({
                                            title: 'Error',
                                            message: 'Error deleting share',
                                        });
                                }
                            }       
                        });
                    }
                //Delete Share
                </script>
            <!-- Ajax Share -->
            
            <div class="tab-pane fade" id="portfolio">
                <div class="container body-cont">
                    <form id="frmportfolio" method="post">
                        <div class="row">
                            <div class="col-sm-2 txt-align">
                                <label for="sname">Portfolio Name</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="hidden" name="hfpid" id="hfpid">
                                <input type="text" class="form-control" name="txtpname" id="txtpname" placeholder="Enter Porfolio Name">                    
                            </div>
                            <div class="col-sm-4">
                                <input type="button" class="btn btn-primary" name="btnaddp" id="btnaddp" Value="Save Portfolio">  
                                <input type="button" class="btn btn-primary" name="btnupp" id="btnupp" Value="Update Portfolio">                    
                            </div>
                        </div>
                    </form>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm sub-body">
                            <table class="table table-hover table-dark" id="tblportfolio">
                                <thead>
                                    <tr>
                                        <th>Portfolio Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody-portfolio">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ajax Portfolio -->
                <script>
                    //Insert Portfolio 
                        $('#btnaddp').on('click',function(e) 
                        {
                        var pname = $("#txtpname").val();
                        $.ajax({
                                data: {pname:pname},
                                type: "post",
                                url: "includes/addportfolio.php",
                                success: function(data)
                                {                            
                                    if(data.trim() == "empty")
                                    {
                                        iziToast.error({
                                            title: 'Error',
                                            message: 'Please enter a portfolio name',
                                        });
                                    }

                                    if(data.trim() == "success")
                                    {
                                        iziToast.success({
                                            title: 'Success',
                                            message: 'Portfolio was successfully added',
                                        });
                                        $("#txtpname").val("");
                                        setTimeout(location.reload.bind(location), 1000);                                
                                    }            
                                    console.log(data);                 
                                }       
                            });
                        // console.log(pname);
                        });
                    //Insert Portfolio 

                    //Update Portfolio
                        function update_portfolio(r)
                        {
                            var portfolio = $(r).attr("data-portfolioval");
                            var portfolio_id = $(r).attr("data-portfolioid");

                            $("#txtpname").val(portfolio);
                            $("#hfpid").val(portfolio_id);
                            $("#btnaddp").hide();
                            $("#btnupp").show();
                        }
                        
                        $("#btnupp").on("click", function()
                        {
                            $("#btnaddp").show();
                            $("#btnupp").hide();

                            var portfolio = $("#txtpname").val();
                            var portfolio_id = $("#hfpid").val();                                                

                            $.ajax({
                                type: "post",
                                data:  {portfolio:portfolio, portfolio_id:portfolio_id},
                                url:   "includes/upportfolio.php",
                                success: function(data)
                                {
                                    if(data.trim() == "success")
                                    {
                                        iziToast.success({
                                                title: 'Success',
                                                message: 'Portfolio successfully updated!',
                                            });
                                        setTimeout(location.reload.bind(location), 1000);        
                                    }

                                    if(data.trim() == "fail")
                                    {
                                        iziToast.error({
                                                title: 'Error',
                                                message: 'Error updating portfolio',
                                            });
                                    }                                
                                }       
                            });
                        });
                    //Update Portfolio
                    
                    //Delete Portfolio
                        function delete_portfolio(r)
                        {
                            var portfolio_id = $(r).attr("data-portfolioid");                        
                            $.ajax({
                                type: "post",
                                data:  {portfolio_id:portfolio_id},
                                url:   "includes/delportfolio.php",
                                success: function(data)
                                {
                                    if(data.trim() == "success")
                                    {
                                        iziToast.success({
                                                title: 'Success',
                                                message: 'Portfolio successfully deleted!',
                                            });
                                        setTimeout(location.reload.bind(location), 1000);        
                                    }

                                    if(data.trim() == "fail")
                                    {
                                        iziToast.error({
                                                title: 'Error',
                                                message: 'Error deleting portfolio',
                                            });
                                    }
                                }       
                            });
                        }
                    //Delete Portfolio
                </script>
            <!-- Ajax Portfolio -->

            <div class="tab-pane fade" id="transaction">
                <div class="container body-cont">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="row">
                            <div class="col-sm">
                                <label for="txttransac">Transaction Name</label>
                                <input type="text" name="txttransac" class="form-control" id="txttransac" placeholder="Transaction Name" required>
                            </div>
                            <div class="col-sm">
                                <label for="sltshare">Share</label>
                                <select name="sltshare" id="sltshare" class="form-control"></select>  
                            </div>     
                            <div class="col-sm">
                                <label for="sltportfolio">Portfolio</label>
                                <select name="sltportfolio" id="sltportfolio" class="form-control"></select>  
                            </div> 
                        </div>
                            <div class="row body-cont">
                                <div class="col-sm">
                                    <label for="txtqty">Price</label>
                                    <input type="text" class="form-control" name="txtprice" id="txtprice" placeholder="Price" required>
                                </div>
                                <div class="col-sm">
                                    <label for="txtqty">Quantity</label>
                                    <input type="text" class="form-control" name="txtqty" id="txtqty" placeholder="Quantity" required>
                                </div>
                                <div class="col-sm radio-cont">
                                    <label for="transac">Transaction:</label>
                                    <div class="custom-control custom-radio">
                                        <input value="0" type="radio" id="transac_sell" name="transac" class="custom-control-input" checked>
                                        <label class="custom-control-label" for="transac_sell">Sell</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="transac_buy" name="transac" class="custom-control-input">
                                        <label class="custom-control-label" for="transac_buy">Buy</label>
                                    </div>
                                </div>
                            </div> 
                            <div class="row row-btn">
                                <button type="submit" name="btnaddtrans" id="btnaddtrans" class="btn btn-primary">Add</button>
                            </div>          
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="tab-pane fade " id="transaction_list">
                <div class="container">
                        <div class="row">
                            <div class="col-sm sub-body">
                                <table class="table table-hover table-dark" id="tbltrans">
                                    <thead>
                                        <tr>
                                            <th>Transaction id</th>
                                            <th>Share Name</th>
                                            <th>Portfolio</th>
                                            <th>Type</th>
                                            <th>Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody-transac">
                                        <?php 
                                            $get_transac_sql = "SELECT
                                            t.transaction_id as transaction_id,
                                            s.share as share,
                                            p.portfolio as portfolio,
                                            t.type as type,
                                            t.Qty as qty
                                        FROM
                                            tbl_transaction t,
                                            tbl_share s,
                                            tbl_portfolio p
                                        WHERE
                                            s.share_id = t.share_id AND p.portfolio_id = t.portfolio_id";

                                            $get_transac_qry = mysqli_query($dbc, $get_transac_sql);
                                            if($get_transac_qry)
                                            {
                                                while($row = mysqli_fetch_array($get_transac_qry, MYSQLI_ASSOC))
                                                {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $row["transaction_id"] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["share"] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["portfolio"] ?>
                                                        </td>
                                                        <td>
                                                            <?php 
                                                                if($row["type"] == "0")
                                                                {
                                                                    echo "Buy";
                                                                } 
                                                                else
                                                                {
                                                                    echo "Sell";
                                                                }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["qty"] ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                echo "fail: ".mysqli_error($dbc);
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="tab-pane fade" id="transaction_chart">
                <div style="width:55%;">
                    <canvas id="myChart" width="450" height="350"></canvas>
                </div>
                <script>
                    $(document).ready(function()
                    {
                        $.ajax({
                        url: "includes/getTransac.php",
                        data:{},
                        type: 'POST',
                        success: function(data)
                        {
                            console.log(data);
                            if(data)
                            {
                                var data_json = JSON.parse(data);
                                // console.log(data_json.name);
                                var ticks = data_json.date_created;
                                // console.log(ticks);
                                var ctx = document.getElementById("myChart").getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: data_json.name,
                                        datasets: [{
                                            label: 'Transaction',
                                            data: data_json.price,
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero:true
                                                }
                                            }],
                                            xAxes:[{
                                                ticks: {
                                                autoSkip: false,
                                                min: ticks[ticks.length - 1],
                                                max: ticks[0]
                                                },
                                                afterBuildTicks: function(scale) {
                                                scale.ticks = ticks;
                                                return;
                                                },
                                                beforeUpdate: function(oScale) {
                                                return;
                                                }
                                        }]
                                        }
                                    }
                                });
                            }
                        },
                        error: function()
                        {
                            console.log("error");
                        }
                        });
                    });
                </script>
            </div>

        </div>
    </div>
<!-- /Tab for share, portfolio, transaction, transaction list, Transaction chart-->
<?php 
    if(isset($_POST["btnaddtrans"]))
    {
        $share_id = $_POST["sltshare"];
        $portfolio_id = $_POST["sltportfolio"];
        $qty = $_POST["txtqty"];
        $type = $_POST["transac"];
        $tname = $_POST["txttransac"];
        $price = $_POST["txtprice"];

        if(!is_numeric($qty) && $qty < 1)
        {
            echo "<script>iziToast.warning({
                title: 'Error',
                message: 'Quantity should be a number greater than zero',
            });</script>";
        }
        elseif(!is_numeric($price) && $price < 1)
        {
            echo "<script>iziToast.warning({
                title: 'Error',
                message: 'Price should be a number greater than zero',
            });</script>";
        }
        else
        {
            $insert_trans_qry=mysqli_query($dbc, "INSERT INTO `tbl_transaction`(`tname`, `share_id`, `portfolio_id`, `type`, `Qty`, `price`) VALUES ('$tname', '$share_id', '$portfolio_id', '$type', '$qty', '$price')");
            if($insert_trans_qry)
            {
                echo "<script>iziToast.success({
                    title: 'Success',
                    message: 'New Transaction added',
                });</script>";
            }
            else
            {
                echo "<script>iziToast.warning({
                    title: 'Error',
                    message: 'Error adding transaction',
                });</script>";                
            }
        }
    }
?>


<script>
    $(document).ready(function()
    {   
        $("#tbltrans").DataTable();
    });
</script>
</body>
</html>