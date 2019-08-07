<html>
  <head>
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="css\Admin_SidebarNav.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
   
  </head> 
  <body>
    <aside>
      <div id="logo">
        <img src="..\images\logo.png">
      </div>
      <div id="AdminLogin">
        <p>ברוך הבא</p>
        <button>התנתק</button>
      </div>
      <div class="component">
        <a href="listOfService.php">נותני שירות שממתינים לאישור</a>
      </div>
      <div class="component">
        <a href="listOfProjects.php">פרוייקטים שמחכים לאישור</a>
      </div>
      <div class="component">
        <a href="listOfBid.php" id="active">מכרזים פתוחים</a>
      </div>
    </aside>  
    <main>
        <h1>מכרזים פתוחים</h1>
        <table>
            <tr id="firstLine">
                <td class="tdFirstLine" style="width: 20%;">המכרז</td>
                <td class="tdFirstLine" style="width: 20%;">תאור</td>
                <td class="tdFirstLine" style="width: 20%;">מיקום</td>
                <td class="tdFirstLine" style="width: 20%;">bbb</td>
            </tr>
            <tr class="trRow">
                <td>tttttt</td>
                <td>tttttt</td>
                <td>tttttt</td>
                <td style="text-align:center;">  
                    <p>לצפייה</p>
                </td>
            </tr>

        </table>

    </main>

  </body>
</html>