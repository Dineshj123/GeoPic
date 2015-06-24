<html>
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
			<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
			<link href='http://fonts.googleapis.com/css?family=Courgette' rel='stylesheet' type='text/css'>
			<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
			<link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
			<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<title>
Graph
</title>
<body>
<div class = "container" style= "width :100%;" >
	<div class = "row" >
		<div class = "jumbotron" style = "background-image :url(graph_header.jpg);">
		<h1 style = "font-family : Shadows Into Light;color :white;" >Graph</h1>
		<p style= "color : white;font-family :Courgette ">
		The Graph shows the number of Total number of Likes received by recent Photos shared by <b>Instagram</b> users in the locations you have searched
		</p>
		<a href="GeoPic.php"><button type="button" class="btn btn-info btn-lg"  style = "margin-left : 73%;" >Search for more Geo-located photos!</button></a>
		</div>
	</div>
	<div class = "row" style="background-image : url(graph_img.jpg);margin-top : -30px;">
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
				$result = mysqli_query($conn,"SELECT * FROM photos ORDER BY id DESC");
				echo "<p style = 'text-align : center;font-family : Pacifico;font-size : 170%;'>total number of LIKES -></p>";
			if($result)
				if(mysqli_num_rows($result) > 0)
					while($row = mysqli_fetch_assoc($result)){
						//for($i=0;$i<5;$i++)
							$width = $row['likes'].'px';
							$name_of_location = $row['location'];
							$likes = $row['likes'];
							echo "<span style= 'text-align : center;font-family : Pacifico;font-size : 160%;color : #1E90FF;margin-left : 10px;' >$name_of_location</span>";
						echo "<div style='background-image : url(bargraph_backimg.jpg);width:$width;height:50px;margin-top : 10px;text-align : center;font-family : Pacifico;font-size : 200%;color : #000000;' >$likes </div>";
					}
			else echo "no data was found";
	?>
	<?php echo "<br/><br/><br/><br/><br/>";?>
	</div>
	
</div> 
</body>
</html>