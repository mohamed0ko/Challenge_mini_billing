<h1>Créer une facture</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('Invoices.store') }}" method="POST">
    @csrf

    <div>
        <label for="customer_id">Client :</label>
        <select name="customer_id" id="customer_id" required>
            <option value="">-- Sélectionner un client --</option>
            @foreach ($customers as $customer)
                <option value="{{ $customer->_id }}">{{ $customer->name }}</option>
            @endforeach
        </select>
    </div>



    <hr>

    <h3>Lignes de facture</h3>
    <div id="invoice-lines">
        <div class="line">
            <input type="text" name="lines[0][description]" placeholder="Description" required>
            <input type="number" name="lines[0][quantity]" placeholder="Quantité" min="1" required>
            <input type="number" step="0.01" name="lines[0][unit_price]" placeholder="Prix HT" required>
            <select name="lines[0][tva_rate]" required>
                <option value="0">0%</option>
                <option value="5.5">5.5%</option>
                <option value="10">10%</option>
                <option value="20">20%</option>
            </select>
            <button type="button" class="remove-line">X</button>
        </div>
    </div>

    <button type="button" id="add-line">+ Ajouter une ligne</button>

    <br><br>
    <button type="submit">Créer la facture</button>
</form>

<script>
    let lineIndex = 1;

    document.getElementById('add-line').addEventListener('click', function() {
        let newLine = document.createElement('div');
        newLine.classList.add('line');
        newLine.innerHTML = `
            <input type="text" name="lines[${lineIndex}][description]" placeholder="Description" required>
            <input type="number" name="lines[${lineIndex}][quantity]" placeholder="Quantité" min="1" required>
            <input type="number" step="0.01" name="lines[${lineIndex}][unit_price]" placeholder="Prix HT" required>
            <select name="lines[${lineIndex}][tva_rate]" required>
                <option value="0">0%</option>
                <option value="5.5">5.5%</option>
                <option value="10">10%</option>
                <option value="20">20%</option>
            </select>
            <button type="button" class="remove-line">X</button>
        `;
        document.getElementById('invoice-lines').appendChild(newLine);

        newLine.querySelector('.remove-line').addEventListener('click', function() {
            newLine.remove();
        });

        lineIndex++;
    });

    // Gérer la suppression de la première ligne
    document.querySelectorAll('.remove-line').forEach(button => {
        button.addEventListener('click', function() {
            this.parentElement.remove();
        });
    });
</script>
