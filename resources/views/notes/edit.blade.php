<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Note</title>
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
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2); /* Shadow for depth */
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-family: 'Georgia', serif; /* Different font for title */
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc; /* Border for input and textarea */
            border-radius: 4px; /* Rounded corners */
            font-size: 16px;
            outline: none;
            color: #555; /* Darker text color for contrast */
            background: #fff; /* White background */
        }
        input[type="text"]::placeholder,
        textarea::placeholder {
            color: #bbb; /* Lighter placeholder color */
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
    <h1>Edit Note</h1>
    <form method="post" action="{{ route('notes.update', ['note' => $note]) }}">
        @csrf 
        @method('put')        

        <div>
            <input type="text" id="title" name="title" placeholder="Title" value="{{ old('title', $note->title) }}">
        </div>

        <div>
            <textarea id="body" name="body" placeholder="Write something...">{{ old('body', $note->body) }}</textarea>
        </div>

        <div>
            <input type="submit" value="Save changes">
        </div>
    </form>
</body>
</html>
