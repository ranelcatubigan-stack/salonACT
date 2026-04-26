<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Service Management</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>



<div class="container">
  <h1>Service Management</h1>

<button class="btn-submit" onclick="window.location.href='/categories'">Categories</button>

  <form action="/services123" method="POST" class="service-form">
    @csrf

    

    <div class="form-group">
      <label for="name123">Name:</label>
      <input type="text" id="name" name="name123">
    </div>

    <div class="form-group">
  <label for="category_id">Category:</label>

  <select name="category_id123" id="category_id" required>
    <option value="">Select Category</option>

    @foreach($categories as $category)
      <option value="{{ $category->id }}">
        {{ $category->category_name }}
      </option>
    @endforeach

  </select>
</div>

    <div class="form-group">
      <label for="price123">Price:</label>
      <input type="text" id="price" name="price123">
    </div>

    

    <button type="submit" class="btn-submit">Save</button>
  </form>

  <hr>

  <table class="product-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($items as $item)
      <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->category->category_name }}</td>
        <td>{{ $item->price }}</td>

        <td>
          <a href="/products/{{ $item->id }}/edit">Edit</a>
          <form action="/products/{{ $item->id }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>



</body>
</html>