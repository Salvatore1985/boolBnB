@extends('layouts.app')

@section('content')
    <div class="container w-75 mx-auto">
        <div class="row">
            {{-- Create Apartment Button --}}
            <div class="col-12 text-end my-4">
                {{-- Enter route --}}
                @if (!count($apartments) == 0)
                    <a href="{{ route('user.apartments.create') }} " class="btn btn-sm btn-success">
                        Aggiungi un appartamento
                    </a>
                @else
                    <a href="{{ route('user.apartments.create') }} " class="btn btn-sm btn-success">
                        Diventa un Host
                    </a>
                @endif
            </div>

            {{-- Delete Apartment Message --}}
            <div class="col-12">
                @if (session('alert-message'))
                    <div class="alert alert-{{ session('alert-type') }}">
                        {{ session('alert-message') }}
                    </div>
                @endif
            </div>
            @forelse ($apartments as $apartment)
                <div class="col-6 ">
                    <div class="card-deck">
                        <div class="card mb-5">
                            @foreach ($apartment->images as $image)
                                @if (str_starts_with($image->link, 'https://') || str_starts_with($image->link, 'http://'))
                                    <img class="card-img-top img-apartment" src="{{ $image->link }}"
                                        alt="{{ $apartment->title }}">
                                @elseif (!str_starts_with($image->link, 'https://') || !str_starts_with($image->link, 'http://'))
                                    <img class="card-img-top img-apartment"
                                        src="{{ asset('/storage') . '/' . $image->link }}"
                                        alt="{{ $apartment->title }}">
                                @endif
                            @endforeach
                            {{-- @if (property_exists('link', $apartment->images))
                                @if (str_starts_with($apartment->images[0]->link, 'https://') || str_starts_with($apartment->images[0]->link, 'http://'))
                                    <img class="card-img-top img-apartment" src="{{ $apartment->images[0]->link }}"
                                        alt="{{ $apartment->title }}">
                                @else
                                    <img class="card-img-top img-apartment"
                                        src="{{ asset('/storage') . '/' . $apartment->images[0]->link }}"
                                        alt="{{ $apartment->title }}">
                                @endif
                                @else
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAMFBMVEXh6vH////5+vrl7fPv8/f0+fzt9Pbf6vD+/f/j6/Lf6vL///3f6fLr8fbv8/by9vm0HxD7AAACbUlEQVR4nO3c65abIBRAYVHTDALx/d+2VBuDII6zLHro2t/fmEn2HETn2jQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADkG29irNHa4I9G9+qu83B2BTauu01JIIYUUUkghhbcX/ipFTGH3LKOTUmi6Qq/QGQrLovA8Ckuj8LzqC/98A2ZX5YXd2Lajf6beOaTmwm5+tnnsBNZc+NTt/OaNanWT/U5hzYWjWjzyh1VSqK1ONpTPW/fyz66kcHCqixJtHwSqPvvUKgq1D/Rjik61MZzhWPd5aJ3fTfwR6yn+P4XzBFU8RevCwvzPJCoo9IFmepdmPUUdFuqaZzgt0fcUw8T+88Ar/wrSC/UywemgcKE+7Tg/ZNRY8V2bDScYT9G6r+mdu+fOK8guXE8wmaK/Vet6980PPmUXDvEEVXLRCL942lwGkguny0RSmF76//ILuh/SE1JyYXIObk/xzfn17NJH5BZ+LvSHpmjno10yRbmFySYTDHFjivONnZ9iHC+3MLNE31NcJy7zNsn9m9DC9DIRTXG9UD977jTF1UIVWpjbZDJTDM/YeLsRWfjdBKMprj8d8RRFFm5d6Dca31OM99z1diOwMHehT01TTBe0WV00BBYem+AyRbdxcDhFgYX6YN80RZu5LTCSZ9gcLzSqz+xIZvloAgt/MsN8u+QZUkghhRRSSCGFFFJIIYWXFKqv85Towr3fcDpKSy78xygsjcLzKCyNwvPEFCpthxKsVlIKXVeGE1NYHoUUUkghhRRSeFfh2D6u0o53BOpmuOz/RA17f8MHAAAAAAAAAAAAAAAAAAAAAAAAAAAAALjcb3yLQG5tF3tgAAAAAElFTkSuQmCC" alt="no image">
                            @endif --}}
                            {{-- @dump($apartment->images->link[0]) --}}
                            <div class="card-body shadow rounded p-4">
                                <h1 class="card-title  text-muted ">{{ $apartment->title }}</h1>
                                <hr>
                                <p class="card-text ">Descrizione: {{ $apartment->description }}</p>
                                <section class="d-flex justify-content-between shadow rounded">
                                    <div class="p-4">
                                        <pre class="card-text ">Numero di stanze: {{ $apartment->n_rooms }}</pre>
                                        <pre class="card-text">Numero di letti: {{ $apartment->n_beds }}</pre>
                                        <pre class="card-text">Numero di bagni: {{ $apartment->n_bathrooms }}</pre>
                                        <pre class="card-text">Numero di piani: {{ $apartment->n_floor }}</pre>
                                        <pre class="card-text">Metri quadri: {{ $apartment->sqr_meters }}</pre>
                                        <pre class="card-text">Prezzo: {{ $apartment->price }} €</pre>
                                        <pre class="card-text">Creato il: {{ $apartment->created_at }}</pre>
                                    </div>
                                    <div class="d-block">
                                        <ul class="list-group p-4">
                                            <li class="card-text list-style-type-circle">Servizi: </li>
                                            @forelse ($apartment->services as $service)
                                                <li class="list-style-type-none">
                                                    <pre>{{ $service->name }}</pre>
                                                </li>

                                            @empty
                                                <p class="card-text">nessun servizio Extra</p>
                                            @endforelse
                                        </ul>

                                    </div>
                                </section>
                                @if ($apartment->is_visible)
                                    <h4 class="card-text py-4 "><small class="text-muted font-weight-bold">Visibile</small>
                                    </h4>
                                @else
                                    <h4 class="card-text py-4 "><small class="text-muted font-weight-bold">Non
                                            Visibile</small></h4>
                                @endif
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('user.apartments.edit', $apartment) }} "class="btn btn-warning">
                                        &#9998; Modifica
                                    </a>
                                    {{-- delete form --}}
                                    <form action="{{ route('user.apartments.destroy', $apartment) }}" method="POST"
                                        class="apartment-destroyer" apartment-name="{{ ucfirst($apartment->title) }}"
                                        onclick="return confirm('Sei sicuro di voler eliminare {{ $apartment->title }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-md btn-delete btn-outline-danger" type="submit">
                                            &#10006; Elimina
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h2>
                    Non hai nessun appartamenti
                </h2>
            @endforelse
            <div class="col-12">
                <div class=" d-flex justify-content-center text-center p-3">
                    {{ $apartments->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
