<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style type="text/css">
    h1 {

        text-align: center
    }

    .btn {

        font-family: sans-serif;
        font-size: 12px;
        font-weight: bold;
        color: white;
        border-radius: 10px;
        padding: 8px 11px;
        margin-top: 10px;
    }

    .table {
        margin-top: 25px;
    }

    label {
        margin-top: 10px;
        font-weight: bold;
    }

    input {
        margin-top: 5px
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row" style="display:flex; flex-direction:row; justify-content:center; align-items: center;">
            <h1>Akar Kuadrat Bilangan</h1>
            <div class="col-md-6">
                <form action="{{route('hitung-akar-api')}}" method="POST">
                    @csrf
                    <label for="bilangan">Masukan Bilangan:</label><br>
                    <input type="number" id="bilangan" class="form form-control @error('bilangan') is invalid @enderror"
                        name="bilangan"><br>
                    @error('bilangan')
                    <div class="invalid-feedback" style="display:block">
                        {{ $message  }}
                    </div>
                    @enderror
                    <button type="submit" class="btn btn-success">submit API</button>
                </form>
            </div>
            <div class="col-md-6">
                <form action="{{route('hitung-akar-plsql')}}" method="POST">
                    @csrf
                    <label for="bilangan1">Masukan Bilangan:</label><br>
                    <input type="number" id="bilangan1"
                        class="form form-control @error('bilangan1') is invalid @enderror" name="bilangan1"><br>
                    @error('bilangan1')
                    <div class="invalid-feedback" style="display:block">
                        {{ $message  }}
                    </div>
                    @enderror

                    <button type="submit" class="btn btn-primary">submit PLSQL</button>
                </form>
            </div>
        </div>

        <table class="table">


            <thead class="table table-primary">
                <tr>
                    <!-- <th scope="col">Num</th> -->
                    <th scope="col">Input</th>
                    <th scope="col">Angka</th>
                    <th scope="col">Mhetodheee</th>
                    <th scope="col">Waktu</th>
                </tr>
            </thead>
            <tbody>
                @foreach($response as $res)
                <tr>
                    <th scope="row">{{$res->input}}</th>
                    <td>
                        {{ sprintf("%.3f",$res->angka) }}
                        @if(floor($res->angka))
                        @php intval($res->angka) @endphp
                        @else
                        @php $res->angka @endphp
                        @endif
                    </td>
                    <td>{{$res->jenis}}</td>
                    <td>
                        @php $data = sprintf("%.8f",$res->waktu) @endphp
                        {{number_format($data,9)}}
                    </td>
                </tr>
                @endforeach
        </table>
    </div>

    </tbody>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>