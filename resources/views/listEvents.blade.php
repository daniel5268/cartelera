@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="table-reponsive col-auto d-flex mx-3 mt-4">
            <table class="table text-center">
                <thead class="thead-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Ubicación</th>
                        <th>Adicional</th>
                        <th>Descripción</th>
                        <th>Fecha del evento</th>
                        <th>Fecha de creación</th>
                    </tr>
                </thead>
                <tbody>                    
                @foreach ($data as $key => $event)
                    <tr>
                        <th>{{$event['name']}}</th>
                        <th>{{$event['location']}}</th>
                        <th>{{$event['aditional']}}</th>
                        <th>{{$event['description']}}</th>
                        <th>{{$event['date']}}</th>
                        <th>{{$event['created']}}</th>
                        
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>        
    </div>
</div>
@endsection
