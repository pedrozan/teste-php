@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Visualizar Banner</h2>
        </div>
        <div class="pull-right">
            <a href="{{ route('banners.index') }}" class="label label-primary pull-right"> Voltar</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Titulo:</strong>
            {{ $banner->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Conteúdo:</strong>
            <br>
            <img src="{{ $banner->imagePath }}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Publicado em:</strong>
            {{ $banner->created_at }}
        </div>
    </div>
</div>
@endsection