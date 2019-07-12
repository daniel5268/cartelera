@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center flex-wrap">
        <div class="col-10 justify-content-center text-center">
            <h3 class="text-muted">Eventos de hoy</h3>
            <hr>
        </div>
		<div class="row mb-3 align-items-start">
        @foreach($today as $time=>$events)
        	@foreach ($events as $event)        			
				<div class="col-10 col-md-5 col-lg-4 mx-auto">
					<div class="img-div mx-auto d-flex justify-content-center">
						@isset($event['img'])
							<img  class="rounded img-fluid" src="{{$event['img']}}" alt="No se pudo cargar la imagen">
						@endisset
					</div>
					<div class="text-center"><strong>{{$event['name']}} - {{$time}}</strong></div>
					<div>Lugar: {{$event['location']}}</div>
					@isset($event['aditional'])
					<div>{{$event['aditional']}}</div>	
					<div class="text-justify">{{$event['description']}}</div>
					@endisset
					<hr>
				</div>				
        		
        	@endforeach
        @endforeach
		</div>
    </div>
    <div class="row justify-content-center flex-wrap">
        <div class="col-10 justify-content-center text-center">
            <h3 class="text-muted">Eventos futuros</h3>
            <hr>
        </div>
		<div class="row mb-3 align-items-start">
        @foreach($future as $time=>$events)
        	@foreach ($events as $event)        			
				<div class="col-10 col-md-5 col-lg-4 mx-auto">
					<div class="img-div mx-auto d-flex justify-content-center">
						@isset($event['img'])
							<img  class="rounded img-fluid" src="{{$event['img']}}" alt="No se pudo cargar la imagen">
						@endisset
					</div>
					<div class="text-center"><strong>{{$event['name']}} - {{$time}}</strong></div>
					<div>Lugar: {{$event['location']}}</div>
					@isset($event['aditional'])
					<div>{{$event['aditional']}}</div>	
					<div class="text-justify">{{$event['description']}}</div>
					@endisset
					<hr>
				</div>				
        		
        	@endforeach
        @endforeach
		</div>
    </div>
</div>
@endsection
