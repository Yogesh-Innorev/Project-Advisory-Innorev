<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banks</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            /* background-color: #f4f4f9; */
            background-color: #304767;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center;     /* Center vertically */
            min-height: 100vh;       /* Full viewport height */
        }

        .container {
            width: 100%;
            max-width: 900px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #003366;
            margin: 0 0 20px;
            font-size: 28px;
            text-align: center;
        }

        .button-container {
            text-align: right;
            margin-bottom: 20px;
        }

        .button-container a {
            text-decoration: none;
        }

        .button-container button {
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #003366;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button-container button:hover {
            background-color: #002244;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #003366;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Banks</h1>
        <div class="button-container">
            <a href="<?php echo site_url('header/addBanks'); ?>"><button>Add Bank</button></a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Bank Name</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($banks as $bank): ?>
                <tr>
                    <td><?php echo htmlspecialchars($bank['id']); ?></td>
                    <td><?php echo htmlspecialchars($bank['bank_name']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
