@extends('layouts.principal')

@section('titulo', 'Opções')

@section('conteudo')

    <div class="options">
        <ul>
            <li><a class="warning {{ request()->is('opcoes/1') ? 'selected' : '' }}"  href="{{ route('opcoes', 1) }}">Warning</a></li>
            <li><a class="info {{ request()->is('opcoes/2') ? 'selected' : '' }}"     href="{{ route('opcoes', 2) }}">Info</a></li>
            <li><a class="success {{ request()->is('opcoes/3') ? 'selected' : '' }}"  href="{{ route('opcoes', 3) }}">Success</a></li>
            <li><a class="error {{ request()->is('opcoes/4') ? 'selected' : '' }}"    href="{{ route('opcoes', 4) }}">Error</a></li>
        </ul>
    </div>

    @if(isset($opcao))
        @switch($opcao)
            @case(1)
                <x-alerta titulo="Warning" tipo="warning">
                    <p><strong>Warning</strong></p>
                    <p>Ocorreu um erro inesperado</p>
                </x-alerta>
                @break
            @case(2)
                <x-alerta titulo="Info" tipo="info">
                    <p><strong>Info</strong></p>
                    <p>Ocorreu um erro inesperado</p>
                </x-alerta>
                @break
            @case(3)
                <x-alerta titulo="Success" tipo="success">
                    <p><strong>Success</strong></p>
                    <p>Ocorreu um erro inesperado</p>
                </x-alerta>
                @break
            @case(4)
                <x-alerta titulo="Error" tipo="error">
                    <p><strong>Error</strong></p>
                    <p>Ocorreu um erro inesperado</p>
                </x-alerta>
                @break
            @default
        @endswitch
    @endif

@endsection