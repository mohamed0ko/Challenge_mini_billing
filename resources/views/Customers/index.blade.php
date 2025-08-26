<h1>hii</h1>
<a href="{{ route('Customers.create') }}">create</a>

@foreach ($customers as $customer)
    <ul>
        <li>Name: {{ $customer->name }}</li>
        <li>Email: {{ $customer->email }}</li>
        <li>SIRET: {{ $customer->SIRET }}</li>
        <li>SIRET: {{ $customer->_id }}</li>
        <a href="{{ route('Customers.edit', $customer->_id) }}"> update</a>
        <form action="{{ route('Customers.destroy', $customer->_id) }}" method="POST"
            onsubmit="return confirm('Are you sure?')">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </ul>
@endforeach
