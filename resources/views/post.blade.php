@extends('layouts.title')

<body>

@include('layouts.header')

    <div class="mx-auto" style="width: 1000px;">
        <h1>{{$data->title}}</h1>
    </div>
    <img src={{ asset( $data->image) }}  class="rounded mx-auto d-block"  alt="lorem">
        <div class="col-lg-8 col-md-10 mx-auto">
            <p class="text-justify">{{ $data->text }}</p>
        </div>

    @foreach($data->comments as $comment)
        <div class="alert alert-info position-static col-lg-8 mx-auto" align="center">
             {{-- <p>{{ $comment->user_id }}</p> --}}
             <p>{{ $user->name }}</p>
             <p>{{ $comment->text }}</p>
        </div>
    @endforeach
    <h4 class="text-center">Add comment</h4>
        <form method="post" action="{{ route('comment.add') }}">
              @csrf
              <div class="form-group col-lg-8 mx-auto" >
                    <input type="text" name="text" class="form-control" />
                    <input type="hidden" name="news_id" value="{{ $data->id }}" />
              </div>
              <div class="form-group row col-lg-1 mx-auto">
                    <input type="submit" class="btn btn-success" value="Add Comment" align="enter" style="margin-top:10px;" />
              </div>
     @include('layouts.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  </body>
</html>
