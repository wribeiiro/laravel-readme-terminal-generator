@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('create.readme')}}" method="post">
        @csrf
        <div class="row justify-content-center">
            
            @if (session('errors'))
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        {{ session('errors') }}
                    </div>
                </div>
            @endif

            <div class="col-md-12">
                <label for="username">Usuário ou Nome: </label>
                <input class="form-control form-group" type="text" name="username" id="username" required>
            </div>

            <div class="col-md-12">
                <label for="about">Sobre Você: </label>
                <textarea class="form-control form-group" name="about" id="about" rows="10" required></textarea>
            </div>

            <div class="col-md-12">
                <input class="btn btn-primary" type="submit" value="Enviar">
            </div>
        </div>
    </form>
</div>
@endsection
