<?php include_once("../include/BLL.php"); 
  $arrprojects=Array();
  $arrprojects=getAllProjects();
?>
<html>
  <head>
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="css\Admin_SidebarNav.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});
      google.charts.load('current', {'packages':['gauge']});
      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

     

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Mushrooms', 3],
          ['Onions', 1],
          ['Olives', 1],
          ['Zucchini', 1],
          ['Pepperoni', 2]
        ]);


        // Set chart options
        var options = {'title':'How Much Pizza I Ate Last Night',
                       'width':600,
                       'height':600};


             // Instantiate and draw our chart, passing in some options.
             var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);



        var data2 = google.visualization.arrayToDataTable([
         ['סטטוס פרויקט', 'כמות', { role: 'style' }],
        ['ממתין לאישור', <?php echo getCountOfProjectType(0);?> , '#b87333'],
        ['ממתין למכרז', <?php echo getCountOfProjectType(1);?> , '#b87333'],
        ['ממתין למימון', <?php echo getCountOfProjectType(2);?> , '#b87333'],
        ['בביצוע', <?php echo getCountOfProjectType(3);?> , '#b87333'],
        ['הושלם', <?php echo getCountOfProjectType(4);?> , '#b87333'],

         /*
         ['ממתין לאישור', , '#b87333'],            // RGB value
         ['Silver', 10.49, 'silver'],            // English color name
         ['Gold', 19.30, 'gold'],

       ['Platinum', 21.45, 'color: #e5e4e2' ], // CSS-style declaration
       */
      ]);

              // Set chart options
              var options2 = {'title':'How Much Pizza I Ate Last Night',
                       'width':600,
                       'height':600};

      var chart2 = new google.visualization.ColumnChart(document.getElementById('chart_div2'));
        chart2.draw(data2, options2);


        var data3 = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Memory', 80],
          ['CPU', 55],
          ['Network', 68]
        ]);

        var options3 = {
          width: 400, height: 120,
          redFrom: 90, redTo: 100,
          yellowFrom:75, yellowTo: 90,
          minorTicks: 5
        };

        var chart3 = new google.visualization.Gauge(document.getElementById('chart_div3'));

        chart3.draw(data3, options3);

       
      }




    </script>
   

   

  </head> 
  <body>
  <?php include_once("side-bar.php"); ?>
    <main class="main">
        <p>ברוך הבא לפאנל הניהול של המערכת</p>


    <!--Div that will hold the pie chart-->
    <div>
    <div id="chart_div"></div>
    <div id="chart_div2"></div>
    </div>
    <div id="chart_div3"></div>






    </main>
    

  </body>
</html>