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
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow: hidden;
        }

        .container {
            width: calc(100% - 40px);
            height: calc(100vh - 40px);
            max-width: 800px;
            padding: 20px;
            background-image: url('https://img.freepik.com/free-vector/cute-celebration-background-cute-grid-pattern-with-colorful-bokeh-vector_53876-146719.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            box-sizing: border-box;
            margin: 20px;
            overflow: auto;
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap; 
        }

        .left-buttons {
            display: flex;
            gap: 10px;
        }
        
        h1 {
            font-size: 24px;
            margin: 0;
        }

        small {
            font-size: 14px;
            color: #666;
            display: block;
            margin: 10px 0;
        }

        .content {
            max-height: 350px;
            overflow-y: auto;
            padding-bottom: 20px;
            flex-grow: 1; 
        }

        .content::-webkit-scrollbar {
            display: none;
        }
        
        .content {
            -ms-overflow-style: none; 
            scrollbar-width: none; 
        }

        p {
            font-size: 18px;
            line-height: 1.6;
            margin: 0;
        }

        .btn {
            padding: 8px 12px; 
            font-size: 14px; 
            border-radius: 5px;
            text-decoration: none;
            color: white;
            display: inline-block;
            text-align: center;
            white-space: nowrap;
            flex-shrink: 0; 
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

        /* Responsive styling */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            h1 {
                font-size: 22px;
            }

            p {
                font-size: 16px;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 20px;
            }

            small, p {
                font-size: 14px;
            }

            .btn {
                padding: 6px 10px; 
                font-size: 12px;
                width: auto; 
            }

            .content {
                max-height: 400px; 
            }

            .right-buttons {
                flex-direction: column;
                gap: 5px; 
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <div class="left-buttons">
                <a href="{{ route('notes.index') }}" class="btn btn-secondary">Back to Notes</a>
            </div>
        </div>
        <h1>{{ $note->title }}</h1>
        <small>Created: {{ $note->created_at->format('F d h:i A D') }} | {{ strlen($note->body) }}/10000 characters</small>
        <div class="content">
            <p>{{ $note->body }}</p>
        </div>
        <div class="right-buttons" style="display: flex; gap: 10px; margin-top: 20px;">
            <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('notes.delete', $note->id) }}" class="btn btn-danger">Delete</a>
        </div>
    </div>

</body>
</html>
