
@foreach($instagram_array['data'] as $instagram)
<img src="{{$instagram['images']['low_resolution']['url']}}" alt="{{$instagram['location']['name']}}" />   <br>
@endforeach
