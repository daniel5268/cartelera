@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="table-reponsive col-auto d-flex mx-3 mt-4">
            <table class="table text-center" id="eventsTable">
                <thead class="thead-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Ubicación</th>
                        <th>Adicional</th>
                        <th>Descripción</th>
                        <th>Fecha del evento</th>
                        <th>Fecha de creación</th>
                        <th>Imagen</th>
                        <th>Actualizar</th>
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
                        <th>                            
                        @isset($event['img'])
                        <a href="{{$event['img']}}" target="_blank">img</a>
                        @else
                        N/A
                        @endisset
                        </th>
                        <th>
                            <a href="{{route('updateEventForm',$key)}}">ir</a>
                        </th>                        
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>        
    </div>
</div>
@endsection
