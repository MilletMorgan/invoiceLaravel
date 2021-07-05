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
        <td>{{ $organisation->id  }}</td>
        <td>{{ $organisation->slug  }}</td>
        <td>{{ $organisation->name  }}</td>
        <td>{{ $organisation->email  }}</td>
        <td>{{ $organisation->tel  }}</td>
        <td>
            {{ $organisation->missions->map(fn ($mission) => $mission->title)->join(', ')  }}
        </td>
    </tr>
    @endforeach

</table>
