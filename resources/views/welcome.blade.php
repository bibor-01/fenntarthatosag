<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="../css/welcome.css">
    <script src="../js/ajax.js"></script>
    <script src="../js/tevekenysegClass.js"></script>
    <script src="../js/tevekenyseg.js"></script>
    <script src="../js/bejegyzes.js"></script>

    <title>Laravel</title>

</head>
<main>

    <body class="antialiased">
        <div
            class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log
                            in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <form>
                {{ csrf_field() }}
                <fieldset>
                    <h4>Mit tettél ma a földért?</h4>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <select id="inputState" class="form-control osztalySelect" name="osztalySelect">
                                <option selected>Válassz osztályt!</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4 tevekenysegValaszt">
                            <select id="inputState" class="form-control" name="tevekenysegSelect">
                                <option selected>Válassz tevékenységet</option>
                                <option class="tevekenysegElem" value=""></option>
                            </select>

                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-primary mb-2 kuldes">Küldés</button>
                        </div>
                        <input type="hidden" name="allapot" class="allapor" value="0">

                        <div class="form-group col-md-4">
                            <select id="basic-live" class="form-control osztalySelectKereses" data-live-search="true">
                                <option data-tokens="ketchup mustard">Osztály Kiválasztása</option>
                            </select>
                        </div>

                </fieldset>

            </form>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Osztály

                        </th>

                        <th scope="col">Tevékenység</th>
                        <th scope="col">Pont</th>
                        <th scope="col">Státusz</th>
                    </tr>
                </thead>
                @foreach ($bejegyzesek as $bejegyzes)
                    @foreach ($tevekenyseg as $elem)
                        @if ($bejegyzes->tevekenyseg_id == $elem->id)
                            <tbody class="sablon"></tbody>
                            <tbody class="tabla">
                                <tr class="elemek">
                                    <td class="osztaly">{{ $bejegyzes->osztaly_id }}</td>
                                    <td class="tevekenyseg">{{ $bejegyzes->tevekenyseg_id }}</td>
                                    <td class="pont">{{ $elem->pontszam }}</td>
                                    <td class="statusz">
                                        {{ $bejegyzes->allapot == 1 ? 'Jóváhagyva' : 'nincs jóváhagyva' }}</td>
                                </tr>
                            </tbody>
                        @endif
                    @endforeach
                @endforeach

            </table>


        </div>
    </body>

</main>

</html>
