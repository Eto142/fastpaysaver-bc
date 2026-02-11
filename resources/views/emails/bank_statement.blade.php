<!DOCTYPE html>
<html>
<head>
    <title>Bank Statement</title>
    <style>
        body { font-family: Arial, sans-serif; color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <h2>Bank Statement</h2>
    <p>Hello {{ $user->first_name }},</p>
    <p>Here is your recent bank statement:</p>

    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Description</th>
                <th>Type</th>
                <th>Amount ({{ $user->currency }})</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $details)
            <tr>
                <td>{{ \Carbon\Carbon::parse($details['created_at'])->toFormattedDateString() }}</td>
                <td>{{ $details['transaction_description'] }}</td>
                <td>{{ $details['transaction'] }}</td>
                <td>
                    @if($details['transaction'] == 'Loan') +
                    @else -
                    @endif
                    {{ number_format($details['transaction_amount'], 2) }}
                </td>
                <td>
                    @if($details['transaction_status'] == 1)
                        Successful
                    @elseif($details['transaction_status'] == 0)
                        Pending
                    @else
                        Failed
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p>Thank you for banking with us.</p>
</body>
</html>
