@extends('layouts.admin')

@section('admin-title', 'Créer un livre')

@section('admin-content')

<form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="admin-form">
    @csrf

    <div class="form__group">
        <label for="title" class="form__label">Titre *</label>
        <input type="text" id="title" name="title" class="form__input" value="{{ old('title') }}" required>
        @error('title') <span class="form__error">{{ $message }}</span> @enderror
    </div>

    <div class="form__group">
        <label for="author" class="form__label">Auteur *</label>
        <input type="text" id="author" name="author" class="form__input" value="{{ old('author') }}" required>
        @error('author') <span class="form__error">{{ $message }}</span> @enderror
    </div>

    <div class="form__group">
        <label for="genre" class="form__label">Genre *</label>
        <select id="genre" name="genre" class="form__input" required>
            <option value="">-- Sélectionner --</option>
            <option value="Fiction" @selected(old('genre') === 'Fiction')>Fiction</option>
            <option value="Non-Fiction" @selected(old('genre') === 'Non-Fiction')>Non-Fiction</option>
            <option value="Science-Fiction" @selected(old('genre') === 'Science-Fiction')>Science-Fiction</option>
            <option value="Fantasy" @selected(old('genre') === 'Fantasy')>Fantasy</option>
            <option value="Mystère" @selected(old('genre') === 'Mystère')>Mystère</option>
        </select>
        @error('genre') <span class="form__error">{{ $message }}</span> @enderror
    </div>

    <div class="form__group">
        <label for="age_range" class="form__label">Tranche d'âge *</label>
        <select id="age_range" name="age_range" class="form__input" required>
            <option value="">-- Sélectionner --</option>
            <option value="-3ans" @selected(old('age_range') === '-3ans')>Moins de 3 ans</option>
            <option value="3-6ans" @selected(old('age_range') === '3-6ans')>3-6 ans</option>
            <option value="6-10ans" @selected(old('age_range') === '6-10ans')>6-10 ans</option>
            <option value="10-15ans" @selected(old('age_range') === '10-15ans')>10-15 ans</option>
            <option value="15-18ans" @selected(old('age_range') === '15-18ans')>15-18 ans</option>
            <option value="+18ans" @selected(old('age_range') === '+18ans')>Plus de 18 ans</option>
        </select>
        @error('age_range') <span class="form__error">{{ $message }}</span> @enderror
    </div>

    <div class="form__group">
        <label for="price" class="form__label">Prix (€) *</label>
        <input type="number" id="price" name="price" class="form__input" value="{{ old('price', 0) }}" step="0.01" min="0" required>
        @error('price') <span class="form__error">{{ $message }}</span> @enderror
    </div>

    <div class="form__group">
        <label for="description" class="form__label">Description</label>
        <textarea id="description" name="description" class="form__input">{{ old('description') }}</textarea>
        @error('description') <span class="form__error">{{ $message }}</span> @enderror
    </div>

    <div class="form__group">
        <label for="image" class="form__label">Image de couverture</label>
        <input type="file" id="image" name="image" class="form__input" accept="image/*">
        @error('image') <span class="form__error">{{ $message }}</span> @enderror
    </div>

    <div class="form__group">
        <label for="pdf" class="form__label">Fichier PDF</label>
        <input type="file" id="pdf" name="pdf" class="form__input" accept="application/pdf">
        @error('pdf') <span class="form__error">{{ $message }}</span> @enderror
    </div>

    <div class="admin-form-actions">
        <button type="submit" class="button button--primary">Créer le livre</button>
        <a href="{{ route('admin.books.index') }}" class="button button--secondary">Annuler</a>
    </div>
</form>

@endsection