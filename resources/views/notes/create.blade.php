<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Note</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f0e1e1; /* Pastel background */
            padding: 20px;
            border: 10px solid #ccc; /* Border for the whole page */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2); /* Shadow for depth */
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-family: 'Georgia', serif; /* Different font for title */
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none; /* No border */
            background: transparent; /* Transparent background */
            font-size: 16px;
            outline: none;
            color: #555; /* Darker text color for contrast */
        }
        textarea {
            width: 100%;
            height: 200px;
            padding: 10px;
            margin: 10px 0;
            border: none; /* No border */
            background: transparent; /* Transparent background */
            font-size: 16px;
            outline: none;
            resize: none; /* Disable resizing */
            color: #555; /* Darker text color for contrast */
        }
        input[type="text"]::placeholder,
        textarea::placeholder {
            color: #bbb; /* Lighter placeholder color */
        }
        .divider {
            width: 100%;
            height: 1px; /* Height of the line */
            background-color: #ccc; /* Line color */
            margin: 10px 0; /* Margin around the line */
        }
        input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <h1>Create a Note</h1>
    <form method="post" action="{{ route('notes.store') }}">
        @csrf        
        <!-- Removed @method('post') as it's redundant -->
        <div>
            <input type="text" id="title" name="title" placeholder="Title" required />
        </div>

        <div class="divider"></div> <!-- Subtle dividing line -->

        <div>
            <textarea id="body" name="body" placeholder="Write something..." required></textarea>
        </div>

        <div>
            <input type="submit" value="Save">
        </div>
    </form>
</body>
</html>
