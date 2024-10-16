<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Description</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            /* background-color: #f4f4f9; */
            background-color: #304767;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        h1 {
            color: #003366;
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; /* To include padding and border in the width */
        }

        button {
            background-color: #003366;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box; /* To include padding and border in the width */
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #002244;
        }

        .error {
            color: red;
            margin-top: -15px;
            margin-bottom: 15px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="<?php echo site_url('header/storeDescription'); ?>" method="post">
            <h1>Add Description</h1>
            <label for="description_text">Description</label>
            <input type="text" name="description_text" id="description_text" placeholder="Enter Description" required>
            <br>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
