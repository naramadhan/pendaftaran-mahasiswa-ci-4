<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Pendaftaran Mahasiswa' ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        header {
            background-color: #4CAF50;
            color: white;
            padding: 1rem;
            text-align: center;
        }
        main {
            padding: 1rem;
            max-width: 800px;
            margin: 2rem auto;
            background: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        footer {
            text-align: center;
            padding: 1rem;
            background-color: #4CAF50;
            color: white;
            margin-top: 2rem;
        }
        a {
            text-decoration: none;
            color: white;
            background-color: #4CAF50;
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 0.75rem;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        td.actions {
            text-align: center;
        }
        .btn-edit {
            background-color: #FFA500;
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 4px;
            text-decoration: none;
        }
        .btn-delete {
            background-color: #FF0000;
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 4px;
            text-decoration: none;
        }
        .btn-delete:hover {
            background-color: #CC0000;
        }
        .btn-edit:hover {
            background-color: #E59400;
        }
        .btn-submit {
            background-color: #4CAF50; 
            color: white;
            padding: 0.6rem 1.2rem;
            border: none;
            border-radius: 5px; 
            font-size: 16px; 
            cursor: pointer; 
            transition: background-color 0.3s ease; 
        }

        .btn-submit:hover {
            background-color: #45a049; /* Warna hijau sedikit lebih gelap saat hover */
        }

        form {
            display: inline-block;
        }
    </style>
</head>
<body>
    <header>
        <h1><?= $title ?? 'Pendaftaran Mahasiswa' ?></h1>
    </header>
    <main>
        <?= $this->renderSection('content') ?>
    </main>
    <footer>
        &copy; <?= date('Y') ?> Pendaftaran Mahasiswa
    </footer>
</body>
</html>
