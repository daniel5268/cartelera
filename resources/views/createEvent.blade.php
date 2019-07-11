@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('createEvent') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>

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
                            <input type="file"  class="custom-file-input @error('img') is-invalid @enderror" name="img" id="img" aria-describedby="inputGroupFileAddon01">
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
                        <input class="form-control @error('date') is-invalid @enderror" type="date" id="example-date-input" name="date" value="{{ old('date') }}" required="">
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
                        <input class="form-control @error('time') is-invalid @enderror" type="time" id="time" name="time" value="{{ old('time') }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Ubicación') }}</label>

                    <div class="col-md-6">
                        <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}" required autofocus>

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
                        <input id="aditional" type="text" class="form-control @error('aditional') is-invalid @enderror" name="aditional" value="{{ old('aditional') }}" autofocus>

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
                        <textarea id="description" required class="md-textarea form-control" name="description">{{ old('description') }}</textarea>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Crear evento') }}
                        </button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection
