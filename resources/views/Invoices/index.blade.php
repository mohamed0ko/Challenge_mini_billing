<h1>hii</h1>
<a href="{{ route('Invoices.create') }}">create</a>

@foreach ($invoices as $invoice)
    <ul>
        <li>Name: {{ $invoice->customer_id }}</li>
        <li>Email: {{ $invoice->date }}</li>

        @foreach ($invoice->lines as $line)
            <li>product: {{ $line['description'] }}</li>
            <li>Quantité: {{ $line['quantity'] }}</li>
            <li>Prix unitaire HT: {{ $line['unit_price'] }}</li>
            <li>TVA: {{ $line['tva_rate'] }}%</li>
        @endforeach


        <a href="{{ route('Invoices.edit', $invoice->_id) }}"> update</a>
        <form action="{{ route('Invoices.destroy', $invoice->_id) }}" method="POST"
            onsubmit="return confirm('Are you sure?')">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </ul>
@endforeach
