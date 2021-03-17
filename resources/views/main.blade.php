@extends('layouts.title')

<body>

@include('layouts.header')

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Новостной блог</h1>
        <p class="lead text-muted">Приветственный текст</p>
        <p>
          <a href={{ route('create') }} class="btn btn-primary my-2">Новый пост</a>
          <a href="#" class="btn btn-secondary my-2">Secondary action</a>
        </p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          @foreach($data as $el)
        <div class="col">
          <div class="card shadow-sm">
            {{-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> --}}

            <img src={{ asset( $el->image) }} width="100%" height="255" alt="lorem">

            <div class="card-body">
              <p class="card-text">{{ $el->title }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href={{ route('show', $el->id) }} class="btn btn-sm btn-outline-secondary">View</a>
                  {{-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> --}}
                </div>
                <small class="text-muted" >{{ $el->date }}</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach

      </div>
      {{-- {{ $data->links() }} --}}
    </div>
  </div>

</main>

@include('layouts.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  </body>
</html>
