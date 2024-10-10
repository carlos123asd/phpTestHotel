<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms</title>
</head>
<body>
    <h1>Rooms List</h1>
    @if(!empty($data) && is_array($data))
        @foreach ($data as $room)
            <div>
                <h2>Room Number: {{ $room['roomNumber'] }}</h2>
                <p>Type: {{ $room['typeRoom'] }}</p>
                <p>Description: {{ $room['description'] }}</p>
                <p>Price: {{ $room['price'] }}</p>
                <p>Status: {{ $room['status'] }}</p>
                <p>Discount: {{ $room['discount'] }}%</p>
                <p>Offer: {{ $room['offer'] ? 'Yes' : 'No' }}</p>
                <p>Cancellation: {{ $room['cancellation'] }}</p>

                <h3>Photos:</h3>
                @if (!empty($room['photo']) && is_array($room['photo']))
                    @foreach ($room['photo'] as $photo)
                        <img src="{{ $photo }}" alt="Room Photo" width="200" height="150">
                    @endforeach
                @else
                    <p>No photos available</p>
                @endif

                <h3>Amenities:</h3>
                @if (!empty($room['amenities']) && is_array($room['amenities']))
                    <ul>
                        @foreach ($room['amenities'] as $amenity)
                            <li>{{ $amenity }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>No amenities available</p>
                @endif
            </div>
            <hr>
        @endforeach
    @else
        <p>No rooms available</p>
    @endif
</body>
</html>