<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <title>User List</title>
  <style>
    table {
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
    }
</style>
</head>
<body>
  <!-- Responsive table and its contents such as the users data -->
<div class="table-responsive">
    <table  class="table table-sm">
      <h1 class="display-4">User List</h1>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
          <!-- foreach loop iterates over the $users data, creating a table row for each user -->
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user['id'] }}</td>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['age'] }}</td>
                    <td>{{ $user['email'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Generate pagination links (based on the current page and the total number of pages) and also make it look better  -->
{{ $users->links('pagination::bootstrap-4') }}

</body>
</html>