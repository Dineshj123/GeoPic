
<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <title>Geopic</title>

      <!--Include Bootstrap... -->
     <link rel="stylesheet" href="/stylesheet.css" media="screen" title="no title" charset="utf-8">
     <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
     <link href='https://fonts.googleapis.com/css?family=Satisfy' rel='stylesheet' type='text/css'>

  </head>
  <body>
    <div class="row" id="content">

  
        <div class="row" id="header">
          <div class="container">
            <div class="jumbotron" id="title">
              <h1>Geopic</h1>
            </div>
          </div>
        </div>

        <br><br><br>

        <div class="row" >

            <div class="col-sm-3">
            </div>

            <div class="col-sm-7" id="body">
              <form class="form-horizontal" role="form" action="/search" method="POST">
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="location">Location:</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="location" placeholder="Enter location" name="location">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-5">
                      <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                  </div>
              </form>
            </div>
        </div>

        <br><br><br><br><br><br>

        <div class="row" id="footer">

          <div class="col-sm-2"></div>

          <div class="col-sm-8" id="info" >
            <br>
              Find photos from your favourite locations...
            <br><br>
          </div>

          <div class="col-sm-2"></div>

          <br><br>

        </div>
      </div>
  </body>
</html>
