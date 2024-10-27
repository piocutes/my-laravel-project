<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet"> <!-- Import Poppins font -->
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-image: url('https://static.vecteezy.com/system/resources/previews/003/323/638/non_2x/flat-teachers-day-background-free-vector.jpg'); /* Replace with your image URL */
            background-size: cover;
            background-position: center;
            color: white; /* Text color */
            font-family: 'Poppins', sans-serif; /* Use Poppins font */
        }

        h1 {
            font-size: 12vw; /* Adjusted size for a bolder look */
            text-align: center;
            margin-top: 100px; 
            margin-bottom: 20px;
            line-height: 90%
        }

        .button {
            margin-top: 20px;
            padding: 15px 30px;
            font-size: 1.2em;
            color: white;
            background-color: #007bff; /* Button color */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none; /* Remove underline */
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
    </style>
</head>
<body>
    <h1>WELCOME TO NOTES!</h1>
    <a href="{{ route('notes.index') }}" class="button">Go to your Notes!</a>
</body>
</html>



