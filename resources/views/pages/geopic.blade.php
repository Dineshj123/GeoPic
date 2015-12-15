
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Geopic</title>

      <!--Include Bootstrap... -->
     <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  </head>
  <body>
  <div class="row">
      <div class="container">
        <div class="jumbotron">
          <h1>Geopic</h1>
        </div>
      </div>
  </div>

  <div class="row">
    <div class="col-sm-3">

    </div>
    <div class="col-sm-7">
      <form class="form-horizontal" role="form" action="/search" method="POST">
          <div class="form-group">
            <label class="control-label col-sm-2" for="location">Location:</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="location" placeholder="Enter loction" name="location">
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
  </body>
</html>
