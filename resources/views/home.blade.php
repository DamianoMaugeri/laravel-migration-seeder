@extends('layouts.master')

@section('content')
<main>

    <div class="container p-4 d-flex justify-content-center gap-5 current">
        <div>{{$orario}}</div>
        <div>{{$data}}</div>
    </div>

    <div class="container">
        <div class="row">
            <h2>treni in partenza</h2>
        </div>
        <div class="row">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th class="text-warning">Azienda</th>
                        <th>Codice</th>
                        <th>Partenza</th>
                        <th>Arrivo</th>
                        <th>Ore</th>
                        <th>Carrozze</th>
                        <th>Stato</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trains as $train)
                    <tr @class([
                        'text-danger' => $train->cancellato,
                        'text-warning' => !$train->puntuale && !$train->cancellato,
                        'text-light' => $train->puntuale && !$train->cancellato,
                    ])>
                        <td>{{$train['azienda']}}</td>
                        <td>{{$train['codice_treno']}}</td>
                        <td>{{$train['stazione_di_partenza']}}</td>
                        <td>{{$train['stazione_di_arrivo']}}</td>
                        <td>{{\Carbon\Carbon::parse($train['partenza'])->format('H:i') }}</td>
                        <td>{{$train['totale_carrozze']}}</td>
                        <td>
                            @if (!$train['puntuale'] && !$train['cancellato']) In Ritardo
                            @elseif($train['cancellato']) Cancellato
                            @else Puntuale
                                
                            @endif
                        </td>
                    </tr>
                        
                    @endforeach
                </tbody>
            </table>

        </div>
        
    </div>
       

</main>
    
@endsection