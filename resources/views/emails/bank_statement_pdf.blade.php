<table style="width: 100%; border-collapse: collapse; font-size: 14px;">
    <thead>
        <tr>
            <th style="border: 1px solid #ddd; padding: 8px; background: #343a40; color: #fff;">Date</th>
            <th style="border: 1px solid #ddd; padding: 8px; background: #343a40; color: #fff;">Description</th>
            <th style="border: 1px solid #ddd; padding: 8px; background: #343a40; color: #fff;">Amount</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transactions as $transaction)
        <tr>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $transaction['date'] }}</td>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $transaction['description'] }}</td>
            <td style="border: 1px solid #ddd; padding: 8px; text-align: right;">{{ $transaction['amount'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
