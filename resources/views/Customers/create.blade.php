<h1>create customer</h1>

<form action="{{ route('Customers.store') }}" method="POST">
    @csrf
    Name :<input type="text" name="name"> <br><br>
    Email :<input type="email" name="email"><br><br>
    SIRET :<input type="text" name="SIRET"><br><br>
    <button type="submit">Create</button> <br><br>
</form>
