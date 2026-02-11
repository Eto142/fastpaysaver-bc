<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Statement</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            color: #fff;
            background-color: #121d36;
        }
        .container {
            max-width: 900px;
            margin: 30px auto;
            background: #1e2a4a;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }
        .header {
            background-color: #0b1937;
            color: #fff;
            text-align: center;
            padding: 20px;
            position: relative;
        }
        .header img {
            position: absolute;
            top: 10px;
            left: 10px;
            height: 50px;
        }
        .header h1 {
            margin: 0;
            font-size: 26px;
        }
        .content {
            padding: 20px;
            color: #cbd4f3;
        }
        .content p {
            margin-bottom: 15px;
            font-size: 16px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            padding: 12px 15px;
            border: 1px solid #384a6e;
            text-align: center;
            font-size: 14px;
        }
        table th {
            background-color: #0b1937;
            color: #fff;
            font-weight: bold;
        }
        table tr:nth-child(even) {
            background-color: #2a3c5e;
        }
        table tr:hover {
            background-color: #3e5584;
            transition: all 0.3s ease-in-out;
        }
        .footer {
            background-color: #0b1937;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            font-size: 14px;
        }
        .amount-credit {
            color: #28a745;
            font-weight: bold;
        }
        .amount-debit {
            color: #dc3545;
            font-weight: bold;
        }
        .status-successful {
            color: #28a745;
            font-weight: bold;
        }
        .status-pending {
            color: #ffc107;
            font-weight: bold;
        }
        .status-failed {
            color: #dc3545;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{asset('assets/images/logo.png')}}" alt="Bank Logo">
            <h1>Bank Statement</h1>
        </div>
        <div class="content">
            <p>Hello <strong>{{ $user->first_name }}</strong>,</p>
            <p>Below is your recent bank statement for your reference:</p>
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
                        <td class="{{ $details['transaction'] == 'Loan' ? 'amount-credit' : 'amount-debit' }}">
                            @if($details['transaction'] == 'Loan')+
                            @else-
                            @endif
                            {{ number_format($details['transaction_amount'], 2) }}
                        </td>
                        <td class="
                            @if($details['transaction_status'] == 1) status-successful
                            @elseif($details['transaction_status'] == 0) status-pending
                            @else status-failed
                            @endif">
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
        </div>
        <div class="footer">
            <p>Thank you for banking with us. We appreciate your trust.</p>
        </div>
    </div>
</body>
</html>
