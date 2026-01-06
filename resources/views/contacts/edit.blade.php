@extends('base')

@section('main')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow">
                <div class="card-header bg-warning">
                    <h3 class="mb-0 text-dark">Modifier le Contact</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('contacts.update', $contact->id) }}">
                        @method('PATCH')
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="first_name">Prénom</label>
                                <input type="text" class="form-control" name="first_name"
                                    value="{{ $contact->first_name }}">
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="last_name">Nom</label>
                                <input type="text" class="form-control" name="last_name" value="{{ $contact->last_name }}">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $contact->email }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="job_title">Poste</label>
                            <input type="text" class="form-control" name="job_title" value="{{ $contact->job_title }}">
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="city">Ville</label>
                                <input type="text" class="form-control" name="city" value="{{ $contact->city }}">
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="country">Pays</label>
                                <input type="text" class="form-control" name="country" value="{{ $contact->country }}">
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                            <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection