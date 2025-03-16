<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            text-align: center;
            overflow: hidden;
        }
        .container {
            max-width: 600px;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }
        h1 {
            font-size: 100px;
            margin: 0;
            color: #e74c3c;
            animation: fadeIn 1s ease-in-out;
        }
        h2 {
            font-size: 24px;
            margin: 10px 0;
            animation: fadeIn 1.5s ease-in-out;
        }
        p {
            font-size: 16px;
            margin: 20px 0;
            animation: fadeIn 2s ease-in-out;
        }
        a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            background-color: #3498db;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
            animation: fadeIn 2.5s ease-in-out;
        }
        a:hover {
            background-color: #2980b9;
        }
        .image-container {
            position: absolute;
            top: -50px;
            right: -50px;
            opacity: 0.1;
            animation: float 3s ease-in-out infinite;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes float {
            0% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>404</h1>
        <h2>Halaman Tidak Ditemukan</h2>
        <p>Maaf, halaman yang Anda cari tidak ada. Mungkin sudah dihapus atau tidak tersedia.</p>
        <a href="dashboard" class="button">Kembali ke Beranda</a>
        <img src="https://via.placeholder.com/400" alt="404 Illustration" class="image-container">
    </div>

    <script>
        // Anda dapat menambahkan interaksi JavaScript di sini jika diperlukan
        console.log("Halaman 404 Not Found");
    </script>
</body>
</html>