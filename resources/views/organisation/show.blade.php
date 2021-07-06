@push('head')
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endpush

<h1>Une organisation</h1>

<button class="btn btn-primary"> bouton</button>
<h2>Liste des missions lié à l'organisation '{{$organisation->name}}': </h2>

<ul>
    @foreach($organisation->missions as $mission)
        <li>
            {{ $mission->id }}
            |
            {{ $mission->title }}
        </li>
    @endforeach
</ul>

<div style="margin-top: 100px">
    <hr>
    <h1>Modifier l'organisation</h1>
    <form method="POST" action="{{route('organisations.update', $organisation->id)}}">
        @csrf
        @method('PUT')
        <label>
            Slug
            <input type="text" name="slug" value="{{ $organisation->slug }}">
        </label>
        <br>
        <br>
        <label>
            Name
            <input type="text" name="name" value="{{ $organisation->name }}">
        </label>
        <br>
        <br>
        <label>
            Email
            <input type="email" name="email" value="{{ $organisation->email }}">
        </label>
        <br>
        <br>
        <label>
            Tel
            <input type="tel" name="tel" value="{{ $organisation->tel }}">
        </label>
        <br>
        <br>
        <label>
            Address
            <input type="text" name="address" value="{{ $organisation->address }}">
        </label>
        <br>
        <br>
        <label>
            Type
            <input type="text" name="type" value="{{ $organisation->type }}">
        </label>
        <br>
        <br>
        <button type="submit">Enregistrer</button>
    </form>
</div>




