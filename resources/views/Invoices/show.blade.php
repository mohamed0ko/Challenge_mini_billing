<h1>Détails de la facture</h1>

<p><strong>Client :</strong> {{ $customers->name }}</p>
<p><strong>Date :</strong> {{ $invoices->date }}</p>

<h3>Lignes de facture :</h3>
<ul>
    @foreach ($invoices->lines as $line)
        <li>
            Description: {{ $line['description'] }}
        </li>
        <li> Quantité: {{ $line['quantity'] }}</li>
        <li> Prix HT: {{ $line['unit_price'] }} $</li>
        <li> TVA: {{ $line['tva_rate'] }}%</li>
    @endforeach
</ul>

<p><strong>Total HT :</strong> {{ $invoices->total_ht }} €</p>
<p><strong>Total TVA :</strong> {{ $invoices->total_tva }} €</p>
<p><strong>Total TTC :</strong> {{ $invoices->total_ttc }} €</p>
