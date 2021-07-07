@include('layouts.app')

<table style="border-collapse: collapse; width: 100%;">
    <tr>
        <th>Id</th>
        <th>Reference</th>
        <th>Organisation_id</th>
        <th>Title</th>
        <th>Comment</th>
        <th>Deposit</th>
    </tr>

    @foreach($missions as $mission)
        <tr style="border-bottom: solid 1px black;">
            <td>{{ $mission->id }}</td>
            <td>{{ $mission->reference }}</td>
            <td>{{ $mission->organisation_id }}</td>
            <td>{{ $mission->title }}</td>
            <td>{{ $mission->comment }}</td>
            <td>{{ $mission->deposit }}</td>
        </tr>
    @endforeach
</table>
