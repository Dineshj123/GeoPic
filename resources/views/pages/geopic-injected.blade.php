<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Geopic</title>

    <link rel="stylesheet" href="/stylesheet.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Satisfy' rel='stylesheet' type='text/css'>

  </head>
  <body>

    <div class="row" id="header">
      <div class="container">
        <div class="jumbotron" id="title">
          <h1>Geopic</h1>
        </div>
      </div>
    </div>
    <br><br><br>
    <div class="row">
          <div class="col-sm-3">
          </div>
          <div class="col-sm-6">
            <div id="geocarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  @for($i=0;$i<$size;$i++)
                    @if($i==0)
                      <li data-target="#geocarousal" data-slide-to="0" class="active"></li>
                    @else
                      <li data-target="#geocarousal" data-slide-to={{$i}}></li>
                    @endif
                  @endfor
                </ol>
          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            @for($i=0;$i<$size;$i++)
              @if($i == 0)
                <div class="item active">
              @else
                <div class="item">
              @endif
                <img src="{{$instagram_array['data'][$i]['images']['low_resolution']['url']}}" alt="{{$instagram_array['data'][$i]['location']['name']}}" />
              </div>
            @endfor

          <!-- Left and right controls -->
          <a class="left carousel-control" href="#geocarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>

          <a class="right carousel-control" href="#geocarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>

        </div>
    </div>
  </div>
  <div class="col-sm-3">
  </div>
</div>
<br>
<div class="row">
  <div class="col-sm-2">
  </div>
  <div class="col-sm-8">
    <a href="/geopic">
      <button type="button" name="button" class="btn btn-info btn-block">search</button>
    </a>
  </div>
  <div class="col-sm-2">
  </div>
</div>

  </body>
</html>
