<h1>create customer</h1>

<form action="{{ route('Invoices.update', $invoice->_id) }}" method="post">
    @csrf
    @method('PUT')
    Name :<input type="text" name="name" value="{{ $invoice->name }}"> <br><br>
    Email :<input type="email" name="email" value="{{ $invoice->email }}"><br><br>
    SIRET :<input type="text" name="SIRET" value="{{ $invoice->SIRET }}"><br><br>
    <button type="submit">Update</button> <br><br>
</form>
