@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="container mt-2 mb-2">
    <div class="row justify-content-center mb-4">
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
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mb-4">
        <div class="col-12">
            <div class="card custom-container">
                <div class="card-header">
                    {{-- Delete User Message --}}
                    <div class="col-12 my-container container ">
                        @if (session('alert-message'))
                        <div class="alert alert-{{ session('alert-type') }}">
                        {{ session('alert-message') }}
                        </div>
                        @endif
                    </div>
                    <div class="col-12 m-3">
                        <h1 class="mb-3">I tuoi messaggi:</h1>

                    @forelse ($apartments  as $apartment)
                        @foreach ($apartment->messages as $message)
                        <div class="card chat " style="width: 18rem;">
                            <div class="card-body ">
                                <h5 class="card-title">
                                    Da: {{$message->email}}
                                </h5>
                                <p><strong class="pb-2">Appartamento:</strong></p>
                                <p>{{$apartment->title}}</p>
                                <div >
                                    <p class="card-text my-scroll">
                                        <strong>messaggio:</strong>
                                        <br>
                                        {{$message->email_content}}
                                    </p>
                                </div>
                                </div>
                            </div>
                        @endforeach
                    @empty
                        <div class="card-body border-bottom">
                            <p>
                                Non ci sono messaggi
                            </p>
                        </div>
                    @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row justify-content-center">
        {{-- Delete User Message
        <div class="col-12 my-container container ">
            @if (session('alert-message'))
            <div class="alert alert-{{ session('alert-type') }}">
            {{ session('alert-message') }}
            </div>
            @endif
        </div>
        <div class="col-12 custom-container m-3">
            <h1>I tuoi messaggi:</h1>
        </div>
        @forelse ($apartments  as $apartment)
            @foreach ($apartment->messages as $message)
                <div class="col-6 d-flex justify-content-center box">
                    <div class="card chat " style="width: 18rem;">
                        <div class="card-body ">
                            <h5 class="card-title">Da: {{$message->email}}</h5>
                                <div ><p class="card-text my-scroll">{{$message->email_content}} </p></div>
                                    <p class="card-text">{{$message->created_at}}</p>
                                    <a href="" class="btn btn-outline-primary">
                                        reply
                                    </a>
                                    <form action="{{ route('user.message.destroy', $message->id) }}" method="POST"
                                        class="messagge-destroyer" message-email_content="{{ ucfirst($message->email_content) }}"
                                            onclick="return confirm('Sei sicuro di voler eliminare il messaggio di {{ $message->name }}?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-pink btn-md btn-delete btn-outline-danger" type="submit">
                                            &#10008;
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
            @endforeach
        @empty
            <div class="card-body border-bottom">
                <p>
                    Non ci sono messaggi
                </p>
            </div>
        @endforelse
    </div> --}}
</div>
@endsection

@section('js-files')

<script defer>

</script>

<style scoped lang="scss">
div.custom-container{
    border: 3px solid rgb(217, 239, 251);
    height: 100%;

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

.chat  {
    padding:5px 6px 8px 6px;
    border-radius: 6px;
    margin-right: 40px;
    color:black;
    background-color: rgb(226, 238, 252);
    position: relative;
}
.chat:after {
content: "";
position:absolute;
margin-top:-12px;
margin-left:-5px;
border-left: 12px solid transparent;
border-right: 12px solid transparent;
border-bottom: 12px solid rgb(226, 238, 252);
transform:rotate(-225deg);
left: -6px;
bottom: -2px;
}
.card{
    border: none;
}
.box:nth-child(even) {
margin-top: 1rem;
}

</style>

@endsection
