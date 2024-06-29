{{-- <h1>Forget Password Email</h1>
   
You can reset password from bellow link:
<a href="{{ route('reset.password.get', $token) }}">Reset Password</a> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            background-color: #ffffff;
            margin: 50px auto;
            padding: 20px;
            max-width: 600px;
            border: 1px solid #dddddd;
            border-radius: 5px;
        }
        .email-header {
            text-align: center;
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 0;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        .email-header h1 {
            margin: 0;
        }
        .email-body {
            padding: 20px;
            line-height: 1.6;
        }
        .email-body a {
            color: #007bff;
            text-decoration: none;
        }
        .email-footer {
            text-align: center;
            padding: 10px 0;
            font-size: 12px;
            color: #666666;
            border-top: 1px solid #dddddd;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Lupa Password</h1>
        </div>
        <div class="email-body">
            <p>Halo,</p>
            <p>Anda menerima email ini karena kami menerima permintaan pengaturan ulang kata sandi untuk akun Anda. Anda dapat mengatur ulang kata sandi Anda melalui tautan di bawah ini:</p>
            <p style="text-align: center;">
                <a href="{{ route('reset.password.get', $token) }}" style="display: inline-block; background-color: #007bff; color: #ffffff; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Atur Ulang Kata Sandi</a>
            </p>
            <p>Jika Anda tidak meminta pengaturan ulang kata sandi, tidak ada tindakan lebih lanjut yang diperlukan dari Anda.</p>
            <p>Terima kasih,<br>Sistem Silat</p>
        </div>
        <div class="email-footer">
            <p>&copy; 2024 Perusahaan Anda. Semua Hak Dilindungi.</p>
            <p>Alamat Perusahaan Anda | Telepon: +62 123 4567 890 | Email: support@perusahaananda.com</p>
        </div>
    </div>
</body>
</html>