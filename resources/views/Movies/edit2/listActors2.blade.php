
    <ul>
    @foreach($movie->actors as $actor)
        <li>{{ $actor->name.' '.$actor->last_name1.' '.$actor->last_name2 }}</li>
    @endforeach
    </ul>
