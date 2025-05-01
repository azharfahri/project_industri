<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Berita</title>
</head>

<body>

    <!-- navbar -->
    @include('layouts.user.navbar')
    <!-- end navbar -->

    <main>
        @yield('content')
        <div class="container">
            <div class="row">
                <div class="col">
                    <header class="bg-primary py-5"
                        style="background-image: url({{ asset('gambar/berita.jpg/') }}); background-size: cover; background-position: center;">
                        <div class="container px-4 px-lg-5 my-5">
                            <div class="text-center text-white">
                                <h1 class="display-4 fw-bolder">Neweswes</h1>
                                <p class="lead fw-normal text-white mb-5">Temukan berita terupdate hanya disini</p>
                            </div>
                        </div>
                    </header>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @php $no = 1; @endphp
                @foreach ($berita as $data)
                    <div class="col md-2">
                        <div class="card mt-5" style="width: 18rem;">
                            <img src="{{ asset('/images/berita/' . $data->cover) }}" class="card-img-top"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $data->judul }}</h5>
                                <p class="card-text">{{ $data->deskripsi }}</p>
                                <p>{{ $data->tanggal }}</p>
                                <a href="#" class="btn btn-primary">baca selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

            </div>
        </div>







    </main>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>
<footer>

</footer>

</html>
