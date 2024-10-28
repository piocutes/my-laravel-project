<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Note</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:  #bed1e6; /* Pastel background */
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .confirmation-box {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
            margin: 20px;
        }
        h2 {
            color: #d9534f; /* Bootstrap danger color */
            margin-bottom: 20px;
        }
        p {
            margin-bottom: 30px;
            color: #333;
        }
        .buttons {
            display: flex;
            justify-content: space-around;
        }
        .buttons form, .buttons a {
            flex: 1;
            margin: 0 10px;
        }
        .buttons form button, .buttons a button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .buttons form button {
            background-color: #d9534f; /* Bootstrap danger color */
            color: white;
        }
        .buttons form button:hover {
            background-color: #c9302c; /* Darker red on hover */
        }
        .buttons a button {
            background-color: #5bc0de; /* Bootstrap info color */
            color: white;
            text-decoration: none;
        }
        .buttons a button:hover {
            background-color: #31b0d5; /* Darker blue on hover */
        }
    </style>
</head>
<body>
    <div class="confirmation-box">
        <h2>Confirm Deletion</h2>
        <p>Are you sure you want to delete the note titled "<strong>{{ $note->title }}</strong>"?</p>
        <div class="buttons">
            <form method="POST" action="{{ route('notes.destroy', ['note' => $note]) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Yes</button>
            </form>
            <a href="{{ route('notes.index') }}">
                <button type="button">Cancel</button>
            </a>
        </div>
    </div>
</body>
</html>
