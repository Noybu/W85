<?php
/**
 * DashboardBuilder
 *
 * @author Diginix Technologies www.diginixtech.com
 * Support <support@dashboardbuider.net> - https://www.dashboardbuilder.net
 * @copyright (C) 2019 Dashboardbuilder.net
 * @version 3.5
 * @license: This code is under MIT license, you can find the complete information about the license here: https://dashboardbuilder.net/code-license
 */

include("inc/dashboard_dist.php");  // copy this file to inc folder 


// for chart #1
$data = new dashboardbuilder(); 
$data->type[0]=  "stack";
$data->type[1]=  "stack";

$data->source =  "Database"; 
$data->rdbms =  "sqlite"; 
$data->servername =  "";
$data->username =  "";
$data->password =  "";
$data->dbname =  "data/Northwind.db";
$data->xaxisSQL[0]=  "select c.categoryname, sum(a.quantity) as ^Sales 1997^, sum(a.quantity)+1000 as ^Sales 1998^ from products b, `Order Details` a, categories c where a.productid = b.productid and c.categoryid = b.categoryid group by c.categoryid order by c.categoryid";
$data->xaxisCol[0]=  "Sales 1997";
$data->xaxisSQL[1]=  "select c.categoryname, sum(a.quantity) as 'Sales 1997', sum(a.quantity)+1000 as 'Sales 1998' from products b, `Order Details` a, categories c where a.productid = b.productid and c.categoryid = b.categoryid group by c.categoryid order by c.categoryid";
$data->xaxisCol[1]=  "Sales 1998";
$data->yaxisSQL[0]=  "select c.categoryname, sum(a.quantity) as ^Sales 1997^, sum(a.quantity)+1000 as ^Sales 1998^ from products b, `Order Details` a, categories c where a.productid = b.productid and c.categoryid = b.categoryid group by c.categoryid order by c.categoryid";
$data->yaxisCol[0]=  "CategoryName";
$data->yaxisSQL[1]=  "select c.categoryname, sum(a.quantity) as 'Sales 1997', sum(a.quantity)+1000 as 'Sales 1998' from products b, `Order Details` a, categories c where a.productid = b.productid and c.categoryid = b.categoryid group by c.categoryid order by c.categoryid";
$data->yaxisCol[1]=  "CategoryName";

$data->name = "4";
$data->title = "Stack Chart";
$data->orientation = "h";
$data->xaxistitle = "";
$data->yaxistitle = "";
$data->showgrid = "true";
$data->showline = "true";
$data->height = "156";
$data->width = "";
$data->col = "0";
$data->tracename[0]=  "Sales 1997";
$data->tracename[1]=  "Sales 1998";
$data->color[0]=  "#401AFF";
$data->color[1]=  "#1AB6FF";

$result[0] = $data->result();

// for chart #2
$data = new dashboardbuilder(); 
$data->type[0]=  "bar";
$data->type[1]=  "line";

$data->source =  "Database"; 
$data->rdbms =  "sqlite"; 
$data->servername =  "";
$data->username =  "";
$data->password =  "";
$data->dbname =  "data/Northwind.db";
$data->xaxisSQL[0]=  "SELECT strftime(^%Y-%m^,o.shippeddate) as xaxis, sum(d.quantity) as yaxis from `order details` d, orders o where o.orderid = d.orderid group by strftime(^%Y-%m^,o.orderdate) limit 50";
$data->xaxisCol[0]=  "xaxis";
$data->xaxisSQL[1]=  "SELECT strftime('%Y-%m',o.shippeddate) as xaxis, sum(d.quantity) as yaxis from `order details` d, orders o where o.orderid = d.orderid group by strftime('%Y-%m',o.orderdate) limit 50";
$data->xaxisCol[1]=  "xaxis";
$data->yaxisSQL[0]=  "SELECT strftime(^%Y-%m^,o.shippeddate) as xaxis, sum(d.quantity) as yaxis from `order details` d, orders o where o.orderid = d.orderid group by strftime(^%Y-%m^,o.orderdate) limit 50";
$data->yaxisCol[0]=  "yaxis";
$data->yaxisSQL[1]=  "SELECT strftime('%Y-%m',o.shippeddate) as xaxis, sum(d.quantity) as yaxis from `order details` d, orders o where o.orderid = d.orderid group by strftime('%Y-%m',o.orderdate) limit 50";
$data->yaxisCol[1]=  "yaxis";

$data->name = "5";
$data->title = "";
$data->orientation = "v";
$data->xaxistitle = "";
$data->yaxistitle = "";
$data->showgrid = "true";
$data->showline = "true";
$data->height = "156";
$data->width = "";
$data->col = "1";
$data->color[0]=  "#1AA7FF";
$data->color[1]=  "#FF401A";

$result[1] = $data->result();

// for chart #3
$data = new dashboardbuilder(); 
$data->type[0]=  "area";
$data->type[1]=  "area";

$data->source =  "Database"; 
$data->rdbms =  "sqlite"; 
$data->servername =  "";
$data->username =  "";
$data->password =  "";
$data->dbname =  "data/Northwind.db";
$data->xaxisSQL[0]=  "SELECT strftime(^%Y-%m^,o.shippeddate) as xaxis, sum(d.quantity) as yaxis, sum(d.UnitPrice) as yaxis2 from `Order Details` d, orders o where o.orderid = d.orderid group by strftime(^%Y-%m^,o.orderdate) limit 50";
$data->xaxisCol[0]=  "xaxis";
$data->xaxisSQL[1]=  "SELECT strftime('%Y-%m',o.shippeddate) as xaxis, sum(d.quantity) as yaxis, sum(d.UnitPrice) as yaxis2 from `Order Details` d, orders o where o.orderid = d.orderid group by strftime('%Y-%m',o.orderdate) limit 50";
$data->xaxisCol[1]=  "xaxis";
$data->yaxisSQL[0]=  "SELECT strftime(^%Y-%m^,o.shippeddate) as xaxis, sum(d.quantity) as yaxis, sum(d.UnitPrice) as yaxis2 from `Order Details` d, orders o where o.orderid = d.orderid group by strftime(^%Y-%m^,o.orderdate) limit 50";
$data->yaxisCol[0]=  "yaxis";
$data->yaxisSQL[1]=  "SELECT strftime('%Y-%m',o.shippeddate) as xaxis, sum(d.quantity) as yaxis, sum(d.UnitPrice) as yaxis2 from `Order Details` d, orders o where o.orderid = d.orderid group by strftime('%Y-%m',o.orderdate) limit 50";
$data->yaxisCol[1]=  "yaxis2";

$data->name = "6";
$data->title = "";
$data->orientation = "v";
$data->xaxistitle = "";
$data->yaxistitle = "";
$data->showgrid = "true";
$data->showline = "true";
$data->height = "154";
$data->width = "";
$data->col = "2";
$data->tracename[0]=  "Sales";
$data->tracename[1]=  "Quantity";
$data->color[0]=  "#1AFBFF";
$data->color[1]=  "#1A79FF";

$result[2] = $data->result();

// for chart #4
$data = new dashboardbuilder(); 
$data->type[0]=  "line";

$data->source =  "Database"; 
$data->rdbms =  "sqlite"; 
$data->servername =  "";
$data->username =  "";
$data->password =  "";
$data->dbname =  "data/Northwind.db";
$data->xaxisSQL[0]=  "select c.categoryname, sum(a.quantity) as ^Sales 1997^, sum(a.quantity)+1000 as ^Sales 1998^ from products b, `Order Details` a, categories c where a.productid = b.productid and c.categoryid = b.categoryid group by c.categoryid order by c.categoryid";
$data->xaxisCol[0]=  "CategoryName";
$data->yaxisSQL[0]=  "select c.categoryname, sum(a.quantity) as ^Sales 1997^, sum(a.quantity)+1000 as ^Sales 1998^ from products b, `Order Details` a, categories c where a.productid = b.productid and c.categoryid = b.categoryid group by c.categoryid order by c.categoryid";
$data->yaxisCol[0]=  "Sales 1997";

$data->name = "7";
$data->title = "";
$data->orientation = "v";
$data->xaxistitle = "";
$data->yaxistitle = "";
$data->showgrid = "true";
$data->showline = "true";
$data->height = "179";
$data->width = "";
$data->col = "3";
$data->tracename[0]=  "Sales 1997";
$data->color[0]=  "#1A1DFF";

$result[3] = $data->result();

// for chart #5
$data = new dashboardbuilder(); 
$data->type[0]=  "bar";
$data->type[1]=  "line";
$data->xaxis[0]= ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
$data->xaxis[1]= ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
$data->yaxis[0]= ["12000","11000","10000","9000","8000","6000","4000","6000","7000","8000","10000","11000"];
$data->yaxis[1]= ["3574","4708","5332","6693","8843","12347","15180","11198","9789","9846","6620","5085"];

$data->name = "8";
$data->title = "Combination Chart 1";
$data->orientation = "v";
$data->xaxistitle = "";
$data->yaxistitle = "";
$data->showgrid = "true";
$data->showline = "true";
$data->height = "180";
$data->width = "";
$data->col = "4";
$data->tracename[0]=  "Rainy Day";
$data->tracename[1]=  "Profit";
$data->color[0]=  "#FBFF1A";
$data->color[1]=  "#FF291A";

$result[4] = $data->result();

// for chart #6
$data = new dashboardbuilder(); 
$data->type[0]=  "line";
$data->type[1]=  "bar";
$data->xaxis[0]= ["0","1","2","3","4","5"];
$data->xaxis[1]= ["0","1","2","3","4","5"];
$data->yaxis[0]= ["1.5","1","1.3","0.7","0.8","0.9"];
$data->yaxis[1]= ["1","0.5","0.7","-1.2","0.3","0.4"];

$data->name = "9";
$data->title = "Combination Chart 2";
$data->orientation = "v";
$data->xaxistitle = "";
$data->yaxistitle = "";
$data->showgrid = "true";
$data->showline = "true";
$data->height = "178";
$data->width = "";
$data->col = "5";
$data->color[0]=  "#FF571A";
$data->color[1]=  "#1A9FFF";

$result[5] = $data->result();?>

<!DOCTYPE html>
<html>
<head>
	<script src="assets/js/dashboard.min.js"></script> <!-- copy this file to assets/js folder -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> <!-- Bootstrap CSS file, change the path accordingly -->
	
<style>
@media screen and (min-width: 960px) {
.id0 {position:absolute;margin-top:0px;}
.id1 {position:absolute;margin-top:0px;}
.id2 {position:absolute;margin-top:1px;}
.id3 {position:absolute;margin-top:231px;}
.id4 {position:absolute;margin-top:231px;}
.id5 {position:absolute;margin-top:231px;}

}
.panel-heading {line-height:0.7em;}
#kpi {font-size:34px; font-weight:bold;text-align:center;}
#kpi_legand {font-size:11px; color:#999;text-align:center;}
</style>
</head>
<body> 
<div class="container-fluid main-container">
<div class="col-md-12 col-lg-12 col-xs-12">
<div class="row">
<div class="col-md-3 col-lg-3 col-md-offset-0 col-lg-offset-0 col-xs-12 id0">
<div class="panel panel-default">
<div class="panel-heading">Stack Chart</div>
	<div class="panel-body">
		<?php echo $result[0];?>
	</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-4 col-lg-4 col-md-offset-3 col-lg-offset-3 col-xs-12 id1">
<div class="panel panel-default">
<div class="panel-heading">Bar Chart</div>
	<div class="panel-body">
		<?php echo $result[1];?>
	</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-5 col-lg-5 col-md-offset-7 col-lg-offset-7 col-xs-12 id2">
<div class="panel panel-default">
<div class="panel-heading">Area Chart</div>
	<div class="panel-body">
		<?php echo $result[2];?>
	</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-3 col-lg-3 col-md-offset-0 col-lg-offset-0 col-xs-12 id3">
<div class="panel panel-default">
<div class="panel-heading">Line Chart</div>
	<div class="panel-body">
		<?php echo $result[3];?>
	</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-5 col-lg-5 col-md-offset-3 col-lg-offset-3 col-xs-12 id4">
<div class="panel panel-default">
<div class="panel-heading">Combination Chart 1</div>
	<div class="panel-body">
		<?php echo $result[4];?>
	</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-4 col-lg-4 col-md-offset-8 col-lg-offset-8 col-xs-12 id5">
<div class="panel panel-default">
<div class="panel-heading">Combination Chart 2</div>
	<div class="panel-body">
		<?php echo $result[5];?>
	</div>
</div>
</div>
</div>
</div>
</div>
</body>
