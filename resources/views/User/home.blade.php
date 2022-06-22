@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>
                        Ciao {{ Auth::user()->name }} !
                    </h1>                   
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h4>Login effettuato con successo!</h4>  

                                        {{-- Delete User Message --}}
                                <div class="col-12">
                                    @if (session('alert-message'))
                                        <div class="alert alert-{{ session('alert-type') }}">
                                            {{ session('alert-message') }}
                                        </div>
                                    @endif
                                @forelse ($apartments  as $apartment)
                                    @foreach ($apartment->messages as $message)
                                    <div>
                                        <a tabindex="0" class="btn btn-lg btn-danger" role="button" data-toggle="popover" data-trigger="focus" 
                                        title="{{$message->created_at}}" 
                                        data-content="{{ $message->email_content }}"> Ricevuto da: {{$message->email}}
                                    </a>
                                    </div>

                                    <form action="{{ route('user.message.destroy', $message->id) }}" method="POST"
                                        class="messagge-destroyer" message-email_content="{{ ucfirst($message->email_content) }}"
                                        onclick="return confirm('Sei sicuro di voler eliminare il messaggio di {{ $message->name }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-md btn-delete btn-outline-danger" type="submit">
                                            &#10008; Elimina
                                        </button>
                                    </form>                                        
                                    @endforeach
                                @empty
                                    <div class="card-body border-bottom">Non ci sono messaggi</div>
                                @endforelse

                                


                                </div>
                                {{-- @if ($message->email !== 0 )
                                Hai {{count($apartment->messages)}} 
                                @elseif ($message->email === 1)
                                    <h5>Hai un solo messaggio </h5>
                                @else
                                    <h5>Non hai messaggi </h5>
                                @endif --}}
                                
                                {{-- @dd($apartment->messages)
                    @foreach ($apartments as $apartment)
                    @foreach ($apartment->messages as $message)
                    <a tabindex="0" class="btn btn-lg btn-danger" role="button" data-toggle="popover" data-trigger="focus" title="{{$message->created_at}}" data-content="{{ $message->email_content }}">Messaggio ricevuto da: {{$message->email}}</a>
                @endforeach
                @endforeach
                </div>               
            </div>
        </div>
    </div> --}}
</div>
@endsection

@section('js-files')

<script defer>
$('.popover-dismiss').popover({
    trigger: 'focus'
})

$(function () {
    $('[data-toggle="popover"]').popover()
})

</script>

@endsection
