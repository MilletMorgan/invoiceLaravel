@include('layouts.app')

<script src="https://unpkg.com/petite-vue" defer init></script>

<h1 class="text-3xl">Organisation '{{$organisation->name}}'</h1>

<table class="shadow" style="border-collapse: collapse">
  <tr>
    <th>Id</th>
    <th>Slug</th>
    <th>name</th>
    <th>email</th>
    <th>tel</th>
    <th>Mission name</th>
  </tr>
  <tr style="border-bottom: solid 1px black;">
    <td>{{ $organisation->id }}</td>
    <td>{{ $organisation->slug }}</td>
    <td>{{ $organisation->name }}</td>
    <td>{{ $organisation->email }}</td>
    <td>{{ $organisation->tel }}</td>
    <td>
      {{ $organisation->missions->map(fn ($mission) => $mission->title)->join(', ') }}
    </td>
  </tr>
</table>

<div class="grid grid-cols-2 gap-4 border-t mt-5">
  <div class="col-span-1 border-r">
    <h1 class="text-3xl mb-5">Modifier l'organisation</h1>

    <form method="POST" action="{{route('organisations.update', $organisation->id)}}">
      @csrf
      @method('PUT')
      <label>
        Slug
        <br>
        <input class="border rounded" type="text" name="slug" value="{{ $organisation->slug }}">
      </label>
      <br>
      <br>
      <label>
        Name
        <br>
        <input class="border rounded" type="text" name="name" value="{{ $organisation->name }}">
      </label>
      <br>
      <br>
      <label>
        Email
        <br>
        <input class="border rounded" type="email" name="email" value="{{ $organisation->email }}">
      </label>
      <br>
      <br>
      <label>
        Tel
        <br>
        <input class="border rounded" type="tel" name="tel" value="{{ $organisation->tel }}">
      </label>
      <br>
      <br>
      <label>
        Address
        <br>
        <input class="border rounded" type="text" name="address" value="{{ $organisation->address }}">
      </label>
      <br>
      <br>
      <label>
        Type
        <br>
        <input class="border rounded" type="text" name="type" value="{{ $organisation->type }}">
      </label>
      <br>
      <br>
      <button class="border rounded p-3 transition bg-blue-300 hover:bg-blue-400" type="submit">
        Modifier l'organisation
      </button>
    </form>
  </div>
  <div class="col-span-1">
    <h1 class="text-3xl mb-5">Ajouter une mission</h1>
    <form method="POST" action="{{route('missions.store', ['organisation' => $organisation->id])}}">
      @csrf
      <label>
        Reference
        <br>
        <input class="border rounded" type="text" name="reference">
      </label>
      <br>
      <br>
      <label>
        Title
        <br>
        <input class="border rounded" type="text" name="title">
      </label>
      <br>
      <br>
      <label>
        comment
        <br>
        <textarea class="border rounded" name="comment"> </textarea>
      </label>
      <br>
      <br>
      <label>
        deposit
        <br>
        <input class="border rounded" type="number" name="deposit">
      </label>
      <br>
      <br>
      <label>
        Ended at
        <br>
        <input class="border rounded" type="date" name="ended_at">
      </label>
      <br>
      <br>


      <!-- anywhere on the page -->
      <div v-scope="{ mission_lines: [] }">
        <button class="border rounded p-3 transition bg-gray-300 hover:bg-gray-400"
                @click.prevent="mission_lines.push({title: '', quantity: 0, price: 0, unity: ''})">
          Ajouter une ligne
        </button>

        <div v-for="(line, index) in mission_lines">
          <div class="my-3">
            <label>
              <div class="border-t">
                <p>
                  Ligne @{{ index + 1 }}
                </p>

                <label>
                  Title
                  <br>
                  <input class="border rounded" type="text" :name="`mission_lines[${index}][title]`">
                </label>
                <br>
                <label>
                  Quantity
                  <br>
                  <input class="border rounded" min="0" type="number" :name="`mission_lines[${index}][quantity]`">
                </label>
                <br>
                <label>
                  Price
                  <br>
                  <input class="border rounded" min="0" type="number" :name="`mission_lines[${index}][price]`">
                </label>
                <br>
                <label>
                  Unity
                  <br>
                  <input class="border rounded" type="text" :name="`mission_lines[${index}][unity]`">
                </label>
                <br>
              </div>
            </label>
          </div>
        </div>
      </div>

      <button class="border rounded p-3 transition bg-blue-300 hover:bg-blue-400" type="submit">
        Créer une mission
      </button>
    </form>
  </div>
</div>


