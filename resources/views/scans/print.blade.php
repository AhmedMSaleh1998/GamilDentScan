<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            direction: rtl;
            text-align: right;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px 8px;
            font-size: 14px;
        }
        th {
            background: #f2f2f2;
        }
    </style>
</head>
<body onload="window.print()">
    <table>
        <tr>
            <th>اسم المريض</th>
            <td>{{ $patient->name }}</td>
        </tr>
        <tr>
            <th>العمر</th>
            <td>{{ $patient->age() ?? 'غير متوفر' }}</td>
        </tr>
        <tr>
            <th>نوع الفحص</th>
            <td>{{ $scanType->name }}</td>
        </tr>
        <tr>
            <th>توقيت الفحص</th>
            <td>{{ $scan->confirmation_time }}</td>
        </tr>
    </table>
</body>
</html>
