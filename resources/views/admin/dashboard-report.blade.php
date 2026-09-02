<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>D'Mahesa Admin Dashboard Report</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            color: #333;
            line-height: 1.5;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #e9c349;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }
        .header h1 {
            margin: 0;
            color: #0b132b;
            font-size: 28px;
        }
        .header p {
            margin: 5px 0 0;
            color: #555;
            font-size: 14px;
        }
        .section-title {
            background-color: #0b132b;
            color: #e9c349;
            padding: 8px 15px;
            font-size: 18px;
            margin-bottom: 15px;
            border-radius: 3px;
        }
        .stats-table {
            width: 100%;
            margin-bottom: 30px;
            border-collapse: collapse;
        }
        .stats-table td {
            width: 50%;
            padding: 15px;
            border: 1px solid #ddd;
            text-align: center;
            background-color: #f9f9f9;
        }
        .stats-value {
            font-size: 32px;
            font-weight: bold;
            color: #0b132b;
            display: block;
            margin-top: 10px;
        }
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        .data-table th, .data-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
            font-size: 14px;
        }
        .data-table th {
            background-color: #f2f2f2;
            color: #0b132b;
            font-weight: bold;
        }
        .data-table tr:nth-child(even) {
            background-color: #fafafa;
        }
        .badge {
            background-color: #e9c349;
            color: #3c2f00;
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #888;
            margin-top: 50px;
            border-top: 1px solid #eee;
            padding-top: 10px;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>D'Mahesa Law Firm</h1>
        <p>Admin Dashboard Overview Report</p>
        <p>Generated on: {{ now()->format('d M Y, H:i') }} | Requested by: {{ Auth::user()->name }}</p>
    </div>

    <div class="section-title">Key Statistics</div>
    <table class="stats-table">
        <tr>
            <td>
                Total Advocates
                <span class="stats-value">{{ $advocatesCount }}</span>
            </td>
            <td>
                Total Publications
                <span class="stats-value">{{ $newsCount }}</span>
            </td>
        </tr>
    </table>

    <div class="section-title">Recent Publications</div>
    <table class="data-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Type</th>
                <th>Author</th>
                <th>Date Published</th>
            </tr>
        </thead>
        <tbody>
            @forelse($recentNews as $item)
            <tr>
                <td>{{ $item->title }}</td>
                <td>
                    <span class="badge">{{ $item->type }}</span>
                </td>
                <td>{{ $item->admin ? $item->admin->name : 'N/A' }}</td>
                <td>{{ $item->created_at->format('d M Y') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" style="text-align: center;">No publications available.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="section-title">Our Advocates (Top 6)</div>
    <table class="data-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Role</th>
                <th>Added On</th>
            </tr>
        </thead>
        <tbody>
            @forelse($advocates as $advocate)
            <tr>
                <td><strong>{{ $advocate->name }}</strong></td>
                <td>{{ $advocate->role }}</td>
                <td>{{ $advocate->created_at->format('d M Y') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="3" style="text-align: center;">No advocates available.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        &copy; {{ date('Y') }} D'Mahesa Law Firm. All rights reserved.<br>
        This is an automatically generated report.
    </div>

</body>
</html>
