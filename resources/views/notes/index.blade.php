<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9; /* Pastel background */
            color: #333;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #5a5a5a;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        th {
            background-color: #f0e0e0; /* Pastel header color */
        }
        td {
            background-color: #fbfbfb; /* Light background for table rows */
        }
        a, form {
            display: inline-block;
            margin: 0;
            padding: 0;
        }
        a {
            text-decoration: none;
            color: #007bff;
            transition: color 0.3s;
        }
        a:hover {
            color: #0056b3; /* Darker blue on hover */
        }
        button {
            background: none;
            border: none;
            color: #d9534f; /* Bootstrap danger color */
            cursor: pointer;
            padding: 0;
            font: inherit;
            text-decoration: underline;
        }
        button:hover {
            color: #c9302c; /* Darker red on hover */
        }
        @media (max-width: 600px) {
            th, td {
                font-size: 14px; /* Responsive font size */
            }
            .container {
                padding: 10px; /* Reduce padding on smaller screens */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Notes</h1>
        <a href="{{ route('notes.create') }}" style="display: block; text-align: center; margin-bottom: 20px; font-weight: bold;">Create New Note</a>
        <table>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
            @foreach($notes as $note) <!-- Corrected variable naming -->
                <tr>
                    <td>{{ $note->title }}</td>
                    <td>{{ $note->body }}</td>
                    <td>
                        <a href="{{ route('notes.edit', ['note' => $note]) }}">Edit</a> |
                        <a href="{{ route('notes.delete', ['note' => $note]) }}">Delete</a> <!-- New Delete Link -->
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    @if(session('success'))
    <div style="background-color: #dff0d8; color: #3c763d; padding: 10px; border-radius: 4px; margin-bottom: 20px;">
        {{ session('success') }}
    </div>
    @endif

</body>
</html>
