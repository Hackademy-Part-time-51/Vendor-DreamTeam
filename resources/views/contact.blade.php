<x-layout>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show text-center " role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container text-blu mb-3">
        <h1 class="card-title display-3 my-3 text-center">Contattaci</h1>
        <p class="fs-4 text-center text-muted mb-5">Hai domande o hai bisogno di assistenza? Siamo qui per aiutarti!</p>
        <hr>
        <div class="row justify-content-center my-5">
            <div class="col-lg-8">
                <div class="card bg-blu text-white border-0 shadow-sm">
                    <div class="card-body p-5">
                        <h2 class="card-title text-center mb-5">Invia un Messaggio</h2>
                        <form action="/sendemail" method="POST">
                            @csrf
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" placeholder="Il tuo nome" required
                                            value=" {{ Auth::user()->name }}">
                                        <label for="name">Nome</label>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" placeholder="La tua email" required
                                            value="{{ Auth::user()->email }}">
                                        <label for="email">Email</label>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control text-blu @error('message') is-invalid @enderror" id="message" name="message"
                                            style="height: 150px" placeholder="Scrivi qui il tuo messaggio">{{ old('message') }}</textarea>
                                        <label for="message" class="text-blu fs-6">Il tuo messaggio...</label>
                                        @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                                {{ $error }}
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit"
                                        class="btn btn-add text-white border scalebig btn-lg w-100 py-3">
                                        <i class="bi bi-send-fill me-2"></i>Invia Messaggio
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
</x-layout>
