<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Bank Statement</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            max-width: 100px;
        }
        .header h2 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }
        .header p {
            color: #777;
            font-size: 16px;
        }
        .user-details, .transaction-details {
            margin-bottom: 20px;
        }
        .user-details p, .transaction-details p {
            font-size: 16px;
            color: #333;
        }
        .transaction-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .transaction-table th, .transaction-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .transaction-table th {
            background-color: #343a40;
            color: #fff;
        }
        .transaction-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .transaction-table tr:hover {
            background-color: #f1f1f1;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <img src="{{ asset('logo.png') }}" alt="Bank Logo">
            <h2>Your Bank Statement</h2>
            <p>Issued by FastPay Saver Bank</p>
        </div>

        <!-- User Details -->
        <div class="user-details">
            <p><strong>Account Holder:</strong> {{ $data['first_name'] }} {{ $data['last_name'] }}</p> <!-- Added last_name for completeness -->
            <p><strong>Date Range:</strong> {{ $data['start_date'] }} to {{ $data['end_date'] }}</p>
        </div>

        <!-- Transaction Details -->
        <div class="transaction-details">
            <h3>Transaction Details:</h3>
            <table class="transaction-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Amount ({{ Auth::user()->currency }})</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data['transactions'] as $transaction) <!-- Access transactions from the $data array -->
                        <tr>
                            <!-- Ensure $transaction is an object with a "created_at" property -->
                            <td>{{ \Carbon\Carbon::parse($transaction->created_at)->toFormattedDateString() }}</td>
                            <td>{{ $transaction->transaction_description }}</td>
                            <td>
                                @if($transaction->transaction == 'Loan') 
                                    +{{ number_format($transaction->transaction_amount, 2) }}
                                @else
                                    -{{ number_format($transaction->transaction_amount, 2) }}
                                @endif
                            </td>
                            <td>
                                @if($transaction->transaction_status == '1')
                                    <span style="color: green;">Successful</span>
                                @elseif($transaction->transaction_status == '0')
                                    <span style="color: blue;">Pending</span>
                                @else
                                    <span style="color: red;">Failed</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Generated on {{ \Carbon\Carbon::now()->toFormattedDateString() }} | FastPay Saver Bank</p>
        </div>
    </div>
</body>
</html>
