<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Note</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #bed1e6;
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            
        } 
        .container {
            width: 90%;
            max-width: 800px;
            padding: 20px;
            height: 500px;
            background-image: url('https://img.freepik.com/free-vector/cute-celebration-background-cute-grid-pattern-with-colorful-bokeh-vector_53876-146719.jpg'); /* Background image */
            background-size: cover; /* Ensure the image covers the entire background */
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Prevent the image from repeating */
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin: 40px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            
        }
        h1 {
            font-size: 24px;
            margin: 0;
        }
        small {
            display: block;
            margin: 10px 0;
            font-size: 14px;
            color: #666;
        }
        .content {
            max-height: 350px; /* Set a max height for scrolling */
            overflow-y: auto; /* Allow vertical scrolling */
            padding-bottom: 20px;
        }
        .content::-webkit-scrollbar {
            display: none; /* Hide scrollbar for WebKit browsers */
        }
        .content {
            -ms-overflow-style: none; /* Hide scrollbar for Internet Explorer and Edge */
            scrollbar-width: none; /* Hide scrollbar for Firefox */
        }
        p {
            font-size: 18px;
            line-height: 1.6;
            margin: 0;
        }
        .btn {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;   
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn-secondary {
            background-color: #6c757d;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <a href="{{ route('notes.index') }}" class="btn btn-secondary">Back to Notes</a>
            <div>
                <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('notes.delete', $note->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this note?');">Delete</a>
            </div>
        </div>
        <h1>{{ $note->title }}</h1>
        <small>Created: {{ $note->created_at->format('F d h:i A D') }} | {{ strlen($note->body) }}/10000 characters</small>
        <div class="content">
            <p>{{ $note->body }}</p>
        </div>
    </div>

</body>
</html>
