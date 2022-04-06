@foreach($movie->genres as $genre)
    <li>{{ $genre->name }}</li>
@endforeach
