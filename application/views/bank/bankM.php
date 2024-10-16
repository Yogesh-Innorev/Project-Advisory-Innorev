<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BANK</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: darkblue;
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px; /* Added padding for spacing */
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .form-group label {
            width: 150px; /* Fixed width for labels */
            margin-right: 20px;
            font-weight: bold;
        }

        .form-group input[type="text"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: none;
            background-color: #fff;
        }

        button {
            background-color: darkblue;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            box-shadow: none;
            display: block;
            margin: 0 auto; /* Center the button */
        }

        button:hover {
            background-color: #003366;
        }

        .error {
            color: red;
            margin-top: -15px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <form action="<?php echo site_url('header/storeBankM'); ?>" method="post">
        <h1>Add Banks</h1><br>
        <div class="form-group">
            <label for="description_text">Bank</label>
            <input type="text" name="description_text" id="description_text" required>
        </div>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
