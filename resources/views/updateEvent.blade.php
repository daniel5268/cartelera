@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{route('updateEvent')}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$data['name']}}" required autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="img" class="col-md-4 col-form-label text-md-right">{{ __('Imagen') }}</label>  
                    <div class="col-md-6">
                        <div class="custom-file"> 
                            <input type="file" class="custom-file-input @error('img') is-invalid @enderror" name="img" value="{{$data['img']}}" id="img" aria-describedby="inputGroupFileAddon01">
                            <label id="img-label" class="custom-file-label" for="img"></label>
                        </div>
                        @error('img')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>
                <div class="form-group row">
                    <label for="date" class="col-md-4 col-form-label text-md-right">Fecha</label>
                    <div class="col-md-6">
                        <input class="form-control @error('date') is-invalid @enderror" type="date" id="example-date-input" name="date" value="{{$data['date']}}" required="">
                        @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-4 col-form-label text-md-right">Hora</label>
                    <div class="col-6">
                        <input class="form-control @error('time') is-invalid @enderror" type="time" id="time" name="time" value="{{$data['time']}}" required>
                        @error('time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Ubicación') }}</label>

                    <div class="col-md-6">
                        <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{$data['location']}}" required autofocus>

                        @error('location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="aditional" class="col-md-4 col-form-label text-md-right">{{ __('Información adicional') }}</label>

                    <div class="col-md-6">
                        <input id="aditional" type="text" class="form-control @error('aditional') is-invalid @enderror" name="aditional" value="{{$data['aditional']}}" autofocus>

                        @error('aditional')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">Descripción</label>
                    <div class="col-md-6">                        
                        <textarea id="description" required class="md-textarea form-control" name="description">{{$data['description']}}</textarea>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <input type="hidden" name="id" value="{{$data['id']}}">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Modificar evento') }}
                        </button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection
