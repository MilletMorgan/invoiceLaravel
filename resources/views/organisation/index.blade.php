<table style="border-collapse: collapse">
    <tr>
        <th>Id</th>
        <th>Slug</th>
        <th>name</th>
        <th>email</th>
        <th>tel</th>
        <th>Mission name</th>
    </tr>
    @foreach($organisations as $organisation)
        <tr style="border-bottom: solid 1px black;">
            <td>{{ $organisation->id }}</td>
            <td>{{ $organisation->slug }}</td>
            <td>{{ $organisation->name }}</td>
            <td>{{ $organisation->email }}</td>
            <td>{{ $organisation->tel }}</td>
            <td>
                {{ $organisation->missions->map(fn ($mission) => $mission->title)->join(', ') }}
            </td>
            <td>
                <a href="{{route('organisations.show', $organisation->id)}}">
                    SHOW
                </a>
            </td>
        </tr>
    @endforeach
</table>

<div style="margin-top: 100px">
    <hr>
    <h1>Ajouter une organisation</h1>
    <form method="POST" action="{{route('organisations.store')}}">
    @csrf
        <label>
            Slug
            <input type="text" name="slug">
        </label>
        <br>
        <br>
        <label>
            Name
            <input type="text" name="name">
        </label>
        <br>
        <br>
        <label>
            Email
            <input type="email" name="email">
        </label>
        <br>
        <br>
        <label>
            Tel
            <input type="tel" name="tel">
        </label>
        <br>
        <br>
        <label>
            Address
            <input type="text" name="address">
        </label>
        <br>
        <br>
        <label>
            Type
            <input type="text" name="type">
        </label>
        <br>
        <br>
        <button type="submit">Enregistrer</button>
    </form>
</div>
