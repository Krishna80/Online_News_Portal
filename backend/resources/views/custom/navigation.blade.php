{{-- Navigation Categories --}}
@foreach($categories as $category)
    <li>
        <div class="verse">
            <a href="{{ url('/category/' . $category->id) }}">{{ $category->name }}</a>
        </div>
    </li>
@endforeach
