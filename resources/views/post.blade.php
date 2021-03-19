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
            <div class="alert alert-info position-static" align="center">

                {{-- <p>{{ $comment->user_id }}</p> --}}
                <p>{{ $user->name }}</p>
                <p>{{ $comment->text }}</p>
            </div>
        @endforeach
        <h4>Add comment</h4>

            {{-- <form>
             <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $data->id}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                    </div>
                </div>
                </form> --}}


                    <form method="post" action="{{ route('comment.add') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="text" class="form-control" />
                            <input type="hidden" name="news_id" value="{{ $data->id }}" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-warning" value="Add Comment" />
                        </div>

@include('layouts.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  </body>
</html>
