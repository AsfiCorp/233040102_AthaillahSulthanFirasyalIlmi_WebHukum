<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Website Inquiry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #0b132b;
            color: #e9c349;
            padding: 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .header h2 {
            margin: 0;
            letter-spacing: 1px;
        }
        .content {
            background-color: #f9f9f9;
            padding: 20px;
            border-left: 1px solid #ddd;
            border-right: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
            border-radius: 0 0 5px 5px;
        }
        .field {
            margin-bottom: 15px;
        }
        .label {
            font-weight: bold;
            color: #555;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 1px;
        }
        .value {
            background: #fff;
            padding: 10px;
            border: 1px solid #eee;
            border-radius: 4px;
            margin-top: 5px;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #999;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>D'MAHESA LAW FIRM</h2>
        <p style="margin: 0; font-size: 14px;">New Website Inquiry</p>
    </div>

    <div class="content">
        <p>Anda menerima pesan baru dari formulir kontak website.</p>

        <div class="field">
            <div class="label">Full Name</div>
            <div class="value">{{ $data['full_name'] }}</div>
        </div>

        <div class="field">
            <div class="label">Email Address</div>
            <div class="value">
                <a href="mailto:{{ $data['email'] }}">{{ $data['email'] }}</a>
            </div>
        </div>

        <div class="field">
            <div class="label">Phone Number</div>
            <div class="value">{{ $data['phone'] ?? '-' }}</div>
        </div>

        <div class="field">
            <div class="label">Matter Summary</div>
            <div class="value" style="white-space: pre-wrap;">{{ $data['matter_summary'] }}</div>
        </div>
    </div>

    <div class="footer">
        This email was sent automatically from the D'Mahesa Law Firm website contact form.
    </div>

</body>
</html>
