# geopic
locate instagram photos by location!
# Basic Requirements
Wamp or xampp- 
Apache Version :
2.4.9   
PHP Version :
5.5.12  
Apache/2.4.9 (Win32) PHP/5.5.12
# General Instructions 
The project “GeoPic” utilizes the Google maps API and the Instagram API. The working of the website is as follows – The location is the required input from the user.  The input is sent to the Google maps application server and is received back in terms as latitude and longitude. This is then utilized by the Instagram API which accepts the location in terms of latitude and longitude   and return JSON content of all recent media geo-located at that location. It is then displayed to the user the number of total ‘likes’ the images as a whole have garnered is taken as the ”likes” value which is stored in the database along with the name and the id of the location.The value of the number of likes to a location is plotted as a bar graph representation. Be warned images that are returned are tagged by location and might appear random, irrelevant etc.  Some searches might contain a large number of photos and might be slow to display. The GeoPic.php is the main page and the graph.php is the page that contains the graph. Both pages are linked. The database is created automatically if it does not exist and so it is the table. The data base and the table names are – album and photos.
#Screenshots
*![Homepage](/Screenshots/1.png)
*![Search](/Screenshots/2.png)
*![Result](/Screenshots/3.png)
*![Graph](/Screenshots/4.png)
#Build instructions
1.	Create a new php file.
2.	Make a form that accepts name of the location and make it such that it does not accept special characters.
3.	Pass the form contents via the GET method to the Google API and receive the JSON content.
4.	Use the json_decode  function (second parameter set to ‘true’) and convert the content into an array.
5.	Now with location in terms of latitude and longitude, pass this into the following API URL :
   	https://api.instagram.com/v1/media/search?lat='.$lat.'&lng='.$lng.'&max_timestamp='.$time.'$min_timestamp='.$time_delay.'&client_id=[ID_HERE]
6.	Retrieve the JSON contents received as an array by using the same method as in step 4.
Traverse through each photo by using the array elements and get the id of each photo by the following method – $media_id = $instagram_array['data'][$i]['id'];
7.	Now send this media id to the following URL and receive the details of users who have liked the media – 
https://api.instagram.com/v1/media/'.$media_id.'/likes?client_id=[ID_HERE]
8.	Display the photos and store the name of the location ,time and the total number of people who have liked the photos in the database ’ album’ under the table ‘photos’.
9.	This content must be updated if the time difference between the last updated and the current time is greater than 3600.
10.	Create a new php file called graph.php
11.	In this, the data stored in the database is retrieved and b\made into bar graphs with the corresponding name and number of likes displayed.
12.	Make sure that you do not update data if it already exists or if time difference is less than an hour.
13.	All the CSS styling is done using Bootstrap.

