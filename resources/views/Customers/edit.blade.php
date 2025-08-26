<h1>create customer</h1>

<form action="{{ route('Customers.update', $customer->_id) }}" method="post">
    @csrf
    @method('PUT')
    Name :<input type="text" name="name" value="{{ $customer->name }}"> <br><br>
    Email :<input type="email" name="email" value="{{ $customer->email }}"><br><br>
    SIRET :<input type="text" name="SIRET" value="{{ $customer->SIRET }}"><br><br>
    <button type="submit">Update</button> <br><br>
</form>
