@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center ">
        <div class="col-12">
            <div class="card custom-container">
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

                        

                        {{-- <h5> @if($messages) Messaggio : @else Non ci sono messaggi  @endif</h5>  --}}
                        {{-- @dd($messages) --}}
                        {{-- @dd($message) --}}


                        {{-- {{ $messages ? "Messaggi" : "Nessun Messaggio" }} --}}
                                        {{-- Delete User Message --}}
                                <div class="col-12 my-container ">
                                    @if (session('alert-message'))
                                        <div class="alert alert-{{ session('alert-type') }}">
                                            {{ session('alert-message') }}
                                        </div>
                                    @endif
                                @forelse ($apartments  as $apartment)
                                    @foreach ($apartment->messages as $message)
                                    <div class="d-flex justify-content-between mb-2 align-items-center p-2 border-bottom  ">
                                        <a tabindex="0" class="btn btn-lg btn-danger" role="button" data-toggle="popover" data-trigger="focus" 
                                        title="{{$message->created_at}}" 
                                        data-content="{{ $message->email_content }}"> Ricevuto da: {{$message->email}}
                                    </a>
                                    <form action="{{ route('user.message.destroy', $message->id) }}" method="POST"
                                        class="messagge-destroyer" message-email_content="{{ ucfirst($message->email_content) }}"
                                        onclick="return confirm('Sei sicuro di voler eliminare il messaggio di {{ $message->name }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-pink btn-md btn-delete btn-outline-danger" type="submit">
                                            &#10008; Elimina
                                        </button>
                                    </form>                     
                                    </div>                                                       
                                    @endforeach
                                    @empty
                                    <div class="card-body border-bottom">Non ci sono messaggi</div>
                                    @endforelse
                    </div>                               
                </div>               
            </div>
        </div>
    </div> 
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

<style scoped lang="scss">

div.custom-container{
    border: 3px solid rgb(217, 239, 251);
    
}
.btn-pink {
    color: #fff !important;
    background-color: #ff385c !important;
    border: 2px solid #ff385c !important;
    font-weight: 600 !important;
    transition: all 0.3s !important;   
}
.btn-pink:hover {
        color: #ff385c !important;
        background-color: transparent !important;
        box-shadow: 0 0 6px 0 #ff385c !important;
    }
</style>

@endsection
