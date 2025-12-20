@extends('base')

@section('main')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Ajouter un Contact</h3>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{ route('contacts.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="first_name">Prénom</label>
                            <input type="text" class="form-control" name="first_name" required>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="last_name">Nom</label>
                            <input type="text" class="form-control" name="last_name" required>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="job_title">Poste</label>
                        <input type="text" class="form-control" name="job_title">
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group mb-4">
                            <label for="city">Ville</label>
                            <input type="text" class="form-control" name="city">
                        </div>
                        <div class="col-md-6 form-group mb-4">
                            <label for="country">Pays</label>
                            <input type="text" class="form-control" name="country">
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success">Enregistrer</button>
                        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
