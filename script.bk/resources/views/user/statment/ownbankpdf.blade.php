

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="Robots" content="index,follow"/>
    {{-- <link rel="stylesheet" type="text/css" href="{{asset ('backend/admin/assets/css/report.css') }}" media="all" /> --}}

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
                {{ __('Ownbank report for') }} {{ Auth::user()->name }}
            </strong>
            </center>

            <hr>

            <table>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('Trx ID') }}</th>
                        <th scope="col">{{ __('Amount') }}</th>
                        <th scope="col">{{ __('Account No.') }}</th>
                        <th scope="col">{{ __('Balance') }}</th>
                        <th scope="col">{{ __('Fee') }}</th>
                        <th scope="col">{{ __('Date / Time') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $key => $transaction)
                    <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $transaction->trxid }}</td>
                          <td>{{ $transaction->amount }}</td>
                          <td>{{ Auth::user()->account_number }}</td>
                          <td>{{ $transaction->balance }}</td>
                          <td>{{ $transaction->fee }}</td>
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
