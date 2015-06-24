<!-- php included to retrieve images based on the given location-->
<?php
	if(!empty($_GET['location'])){
		
		//getting location(lat,lng) by passing location anme 
		$maps_url =  'https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($_GET['location']);
		$maps_json = file_get_contents($maps_url);
		$maps_array = json_decode($maps_json,true);
		//var_dump($maps_array);
		
		//extracting lat and lng from maps_array
		$lat = $maps_array['results'][0]['geometry']['location']['lat'];
		$lng = $maps_array['results'][0]['geometry']['location']['lng'];
		
		//passing this to instagram to retrive media from Instagram server
		$time = time();
		$time_delay = $time-3600;
		$instagram_url = 'https://api.instagram.com/v1/media/search?lat='.$lat.'&lng='.$lng.'&max_timestamp='.$time.'$min_timestamp='.$time_delay.'&client_id=165301c23525430788db2fd7938a3411';
		$instagram_json = file_get_contents($instagram_url);
		$instagram_array = json_decode($instagram_json,true);
		
		
	}
?>




<html>
	<head>	
		<title>
			GeoPic
		</title>
		
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
			<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
			<link href='http://fonts.googleapis.com/css?family=Courgette' rel='stylesheet' type='text/css'>
			<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
			<link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
			<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
			
			
			<style>
				.container {
								padding-right: 0; /*15px in bootstrap.css*/
								padding-left: 0;  /*idem*/
								margin-right: auto;
								margin-left: auto;
							}
				.carousel-inner > .item > img,
				.carousel-inner > .item > a > img {
													height : 60%;
													width: 50%;
													margin : auto;
													}
				
			</style>
			<script>
			function loadingeraser(){
				
				
				document.getElementById("loadable").style.backgroundImage = "url(710.GIF)";
				document.getElementById("loadable").style.backgroundAttachment = "scroll";
				document.getElementById("loadable").style.backgroundPosition = "center center";
				document.getElementById("loadable").innerHTML = "";
				
			}
			</script>
	</head>
	
	<body onload="fill_col();">
	
	<!--header-->
	<div class = "container" style = "width : 98%;">
		
		<div class = "row" >
			<div class = "jumbotron" style = "background-image : url(col-search.jpg);font-family : Lobster;color : white;font-size : 300%;">
				<h1>GeoPic - Pictures From Your Favourite Places</h1> 
					<h3 style = "text-align : right;color : azure;">-powered by instagram</h3>
			</div>
		</div>
	<!--Search Box-->
		<div class = "row" style="margin-top : -20px;">
			<div class = "col-sm-3" style = "background-color : lightgrey;height:600px;">
			<br/><br/><p style="font-family:Shadows Into Light;font-size:280%;font-weight:600%;color:white;">GeoPic</p><br/><br/><br/>
				<form action = "GeoPic.php" role ="form">
					<div class = "form-group">
							<label>Get Recent Photos from Instagram at any location around the globe!</label><br/><br/>
							<span class="glyphicon glyphicon-search" aria-hidden="true"></span><b>Search</b>
							<input type = "text" name = "location" class = "form-control" style = "background-image: url(sky-blue.jpg);font-weight : 300%;" pattern = "^[A-Za-z\s]{1,}[\.\,]{0,1}[A-Za-z\s]{0,}$" required></input><br/>
							<br/><p style = "font-family: 'Courgette', cursive;"><b>Note:</b>search yields photos geo-located at the given location.<br/>searching like 'Yosemite,California' or 'Taj Mahal,Agra' may yield more accurate results</p><br/>
							<button type="submit" class="btn btn-default" onclick="loadingeraser();" >Search</button><br/>
							<br/>
							<p style = "font-family: 'Courgette', cursive;"><b>Search for photos from your favourite destination, and get know how popular the destination is.</b></p>
							
					</div>
				</form>
			</div>
		
			<div class = "col-sm-9" id= "loadable" style = "background-image : url(album-back.jpg);height : 600px;background-repeat: no-repeat;">
				<br/>
				<p id="welcome_text" style="font-family : Pacifico;font-size : 150%;font-weight:400%;text-align:center;">Search photos from a new Location!<br/><?php if(!empty($_GET['location']))echo "current location - ".$_GET['location'];?></p>
				<?php
				//getting the size 
					if(!empty($instagram_array)){
					$size = sizeof($instagram_array['data']);
					//echo $size;
					}
					
				?>
				<?php
				$no_of_likes =0;
			if(!empty($instagram_array)){
			$size = sizeof($instagram_array['data']);
			
				for($i=0; $i<$size; $i++ ){
					
					$media_id = $instagram_array['data'][$i]['id'];
					
					$instagram_url1 = 'https://api.instagram.com/v1/media/'.$media_id.'/likes?client_id=165301c23525430788db2fd7938a3411';
					$instagram_json1 = file_get_contents($instagram_url1);
					$instagram_array1 = json_decode($instagram_json1,true);
					
					$no_of_likes += sizeof($instagram_array1['data']);
					
					
				}
				//echo $no_of_likes;
			}
			
		?>
				<?php
				//creating connection to server
				$conn=mysqli_connect("localhost","root","") or die("could connect to server : ".mysqli_connect_error());
				//creating a database
				if(!$insert=mysqli_query($conn,"CREATE DATABASE IF NOT EXISTS album"))
				echo "Data bose not created : ".mysqli_error();
				//closing exisitng connection
				mysqli_close($conn);
				//connecting to database 
				$conn=mysqli_connect("localhost","root","","album") or die("could connect to server : ".mysqli_connect_error());
				//creating table if it does not exist
				if(!$insert=mysqli_query($conn,"CREATE TABLE IF NOT EXISTS photos(
																id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                      							location VARCHAR(100) NOT NULL,
																likes INT(100)  NULL,
																time INT(100) NOT NULL
																
																)"))
				echo "table not created : ".mysqli_error($conn);
				if(isset($_GET['location'])){
					$_GET['location'] = trim($_GET['location']);
					$location_searched = strtolower($_GET['location']);
					$time_of_result = time();
					$result = mysqli_query($conn,"SELECT time FROM photos WHERE location='$location_searched' LIMIT 1");
					$row=mysqli_fetch_assoc($result);
					$time_diff = $time - $row['time'];
					if($time_diff > 3600)
						$update = mysqli_query($conn,"UPDATE photos SET likes='$no_of_likes',time='$time' WHERE location='$location_searched' ");
					//echo $time_diff;
					if(mysqli_num_rows($result) == 0)
						if(!$insert=mysqli_query($conn,"INSERT INTO photos VALUES ('','$location_searched','$no_of_likes','$time_of_result')"))
							echo "<p/>not inserted : ".mysqli_error($conn);
					else echo "";
					}
				//else echo "not inserted";
				
							
				
				
				?>	
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<?php
						if(!empty($size)){for($i=0;$i<$size;$i++){
							if($i)
								echo "<li data-target='#myCarousel' data-slide-to=$i></li>";
							else
								echo "<li data-target='#myCarousel' data-slide-to=$i class='active'></li>";
						}}
						
						?>
					</ol>
					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
						<?php
							if(!empty($size)){for($i=0;$i<$size;$i++){
								if($i==0)
									echo "<div class='item active'>";
								else
									echo "<div class='item'>";
								$image_name = $instagram_array['data'][$i]['images']['low_resolution']['url'];
								echo"<img src=$image_name width='500' height='400'>
									</div>";
							}}
							
						?>
					</div>
					 <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			<br/><br/>
					<!--analytics-->
					
					<a href="graph.php"><button type="button" class="btn btn-info btn-lg"  style = "margin-left : 43%;" >View Analytics</button></a>
						
			</div>
		</div>
	</div>
	
		
	</body>
	
</html>