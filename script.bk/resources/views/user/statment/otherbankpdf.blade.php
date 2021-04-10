<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="Robots" content="index,follow"/>
    <style>
        .header{
            font-family: arial, sans-serif;
            font-size: 20px;
        }
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }

        @page {
            margin-left: 25px;
            margin-right: 25px;
            margin-top: 25px;
            margin-bottom: 25px;
        }
    </style>
</head>
<body>
<div id="wrapper">
    <div id="">
        <div class="issue_info">
            <center class="header">
            <strong>
                {{ __('Otherbank report for') }} {{ Auth::user()->name }}
            </strong>
            </center>
            <hr>
            <table>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('Bank Name') }}</th>
                        <th scope="col">{{ __('Account Number') }}</th>
                        <th scope="col">{{ __('Amount') }}</th>
                        <th scope="col">{{ __('Currency') }}</th>
                        <th scope="col">{{ __('Currency Rate') }}</th>
                        <th scope="col">{{ __('Status') }}</th>
                        <th scope="col">{{ __('Date') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $key => $transaction)
                    <tr>
                        @php
                        $info = json_decode($transaction->info);
                        @endphp
                        <td>{{ $key+1 }}</td>
                        <td>{{ $transaction->bank->name }}</td>
                        <td>{{ $info->branch }}</td>
                        <td>{{ $transaction->amount }}</td>
                        <td>{{ $transaction->term->title }}</td>
                        <td>{{ $transaction->currency_rate }}</td>
                        <td>{{ $transaction->status == 1 ? 'Success' : ($transaction->status == 2 ? 'Pending' : 'Failed')  }}</td>
                        <td>{{ $transaction->created_at->isoFormat('LLL') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br/><br/>
        </div>
    </div>
</div>
</body>
</html>
