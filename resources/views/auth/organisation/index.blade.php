@include('layouts.app')

<table class="shadow w-full" style="border-collapse: collapse">
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
                <a href="{{route('organisations.show',  $organisation->id)}}">
                    SHOW
                </a>
            </td>
        </tr>
    @endforeach
</table>

<div style="margin-top: 100px">
    <hr>
    <h1 class="text-2xl mb-5">Ajouter une organisation</h1>
    <form method="POST" action="{{route('organisations.store')}}">
        @csrf
        <label>
            Slug
            <br>
            <input class="border rounded" type="text" name="slug">
        </label>
        <br>
        <br>
        <label>
            Name
            <br>
            <input class="border rounded" type="text" name="name">
        </label>
        <br>
        <br>
        <label>
            Email
            <br>
            <input class="border rounded" type="email" name="email">
        </label>
        <br>
        <br>
        <label>
            Tel
            <br>
            <input class="border rounded" type="tel" name="tel">
        </label>
        <br>
        <br>
        <label>
            Address
            <br>
            <input class="border rounded" type="text" name="address">
        </label>
        <br>
        <br>
        <label>
            Type
            <br>
            <input class="border rounded" type="text" name="type">
        </label>
        <br>
        <br>
        <button class="border rounded p-3 transition bg-blue-300 hover:bg-blue-400" type="submit">Enregistrer</button>
    </form>
</div>
