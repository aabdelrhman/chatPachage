<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">email</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <th scope="row">1</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td><form action="{{ route('create-channel') }}" method="post">
                    @csrf
                    <input type="hidden" name="users[0][user_id]" value="{{ $user->id }}">
                    <input type="submit">
                </form></td>
            </tr>
        @endforeach

    </tbody>
  </table>
