<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Newsletter Kampung Skouw Yambe</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: linear-gradient(135deg, #22c55e, #16a34a);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: bold;
        }
        .header p {
            margin: 10px 0 0 0;
            font-size: 16px;
            opacity: 0.9;
        }
        .content {
            padding: 40px 30px;
        }
        .welcome-text {
            font-size: 18px;
            margin-bottom: 25px;
            color: #374151;
        }
        .features {
            background-color: #f9fafb;
            border-radius: 8px;
            padding: 25px;
            margin: 25px 0;
        }
        .features h3 {
            color: #22c55e;
            margin-top: 0;
            font-size: 20px;
        }
        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        .feature-icon {
            width: 20px;
            height: 20px;
            background-color: #22c55e;
            border-radius: 50%;
            margin-right: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 12px;
            font-weight: bold;
        }
        .footer {
            background-color: #f3f4f6;
            padding: 25px 30px;
            text-align: center;
            border-top: 1px solid #e5e7eb;
        }
        .footer p {
            margin: 0;
            color: #6b7280;
            font-size: 14px;
        }
        .unsubscribe-link {
            color: #6b7280;
            text-decoration: none;
            font-size: 12px;
        }
        .unsubscribe-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎉 Selamat Datang!</h1>
            <p>Anda telah berhasil berlangganan Newsletter Kampung Skouw Yambe</p>
        </div>
        
        <div class="content">
            <div class="welcome-text">
                Halo! Terima kasih telah berlangganan newsletter kami. Sekarang Anda akan mendapatkan informasi terbaru seputar kegiatan dan perkembangan Kampung Skouw Yambe langsung ke email Anda.
            </div>
            
            <div class="features">
                <h3>📰 Yang Akan Anda Dapatkan:</h3>
                <div class="feature-item">
                    <div class="feature-icon">✓</div>
                    <span>Berita terbaru seputar kampung</span>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">✓</div>
                    <span>Informasi kegiatan dan acara</span>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">✓</div>
                    <span>Update pembangunan dan infrastruktur</span>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">✓</div>
                    <span>Potensi wisata dan UMKM</span>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">✓</div>
                    <span>Kegiatan budaya dan adat</span>
                </div>
            </div>
            
            <p style="color: #6b7280; font-size: 14px;">
                Newsletter akan dikirim secara berkala. Jika Anda tidak ingin menerima email ini lagi, Anda dapat berhenti berlangganan kapan saja.
            </p>
        </div>
        
        <div class="footer">
            <p><strong>Kampung Skouw Yambe</strong></p>
            <p>Muara Tami, Jayapura, Papua</p>
            <p style="margin-top: 15px;">
                <a href="{{ url('/') }}" style="color: #22c55e; text-decoration: none;">Kunjungi Website Kami</a>
            </p>
            <p style="margin-top: 20px; font-size: 12px;">
                <a href="{{ url('/newsletter/unsubscribe?email=' . $subscriber->email) }}" class="unsubscribe-link">
                    Berhenti Berlangganan
                </a>
            </p>
        </div>
    </div>
</body>
</html>
