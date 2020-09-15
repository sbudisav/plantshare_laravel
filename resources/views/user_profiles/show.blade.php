@extends ('layout')

@section ('content')

<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Your Profile 
        </div>
        <div> 
            {{ $user->about }}
        </div>

        <div>
        Here would be all the plants
        </div>
            @foreach ($user->posts as $post)
                <h2><a style="text-decoration:none;" href="{{ $post->path() }}">{{ $post->title }}</a></h2>
                <h4> By: {{ $user->username }} </h4>
                <p>{{$post->body}}</p><hr style="width: 600px">
            @endforeach

    </div>
</div>
@endsection