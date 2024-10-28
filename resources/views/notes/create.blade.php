<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Note</title>
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
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        small {
            font-size: 14px;
            color: #666;
        }

        input[type="text"], textarea {
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            font-size: 18px;
            margin-bottom: 10px;
            box-sizing: border-box;
            background: none;
        }

        textarea {
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            font-size: 18px;
            background: none;
            resize: none;
            font-family: Arial, sans-serif;
            flex-grow: 1; 
            overflow-y: auto; 
            box-sizing: border-box;
            max-height: calc(100% - 150px); 
        }

        /* Hide the scrollbar */
        textarea::-webkit-scrollbar {
            display: none;
        }
        textarea {
            -ms-overflow-style: none; 
            scrollbar-width: none;
        }

        .btn {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            margin: 10px;
            display: inline-block;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;

        }

        .btn-secondary {
            background-color: #6c757d;
        }

        /* Responsive styling */
        @media (max-width: 768px) {
            .container {
                width: 95%;
                padding: 15px;
            }

            input[type="text"], textarea {
                font-size: 16px;
                padding: 8px;
            }

            .btn {
                font-size: 14px;
                padding: 8px 12px;
            }
        }

        @media (max-width: 375px) {
            input[type="text"], textarea {
                font-size: 14px;
                padding: 6px;
            }
        }
    </style>
    <script>
        function updateCharacterCount() {
            const textarea = document.getElementById('noteBody');
            const characterCount = textarea.value.length;
            const maxCharacters = 10000;
            document.getElementById('characterCount').textContent = `${characterCount}/${maxCharacters} characters`;
        }

        function updateDateTime() {
            const now = new Date();
            const options = { year: 'numeric', month: 'long', day: 'numeric', weekday: 'long', hour: '2-digit', minute: '2-digit' };
            document.getElementById('currentDateTime').textContent = now.toLocaleString('en-US', options);
        }

        window.onload = function() {
            updateDateTime();
            setInterval(updateDateTime, 60000);
        };
    </script>
</head>
<body>

    <div class="container">
        <div class="header">
            <a href="{{ route('notes.index') }}" class="btn btn-secondary">Back to Notes</a>
        </div>
        <form action="{{ route('notes.store') }}" method="POST" style="display: flex; flex-direction: column; height: 100%;">
            @csrf
            <input type="text" name="title" maxlength="20" placeholder="Enter note title" required>
            <div>
                <small id="currentDateTime"></small>
                <small>|</small>
                <small id="characterCount">0/10000 characters</small>
            </div>
            <textarea id="noteBody" name="body" maxlength="10000" placeholder="Write your note here..." required oninput="updateCharacterCount()"></textarea>
            <button type="submit" class="btn btn-primary">✔</button>
        </form>
    </div>

</body>
</html>
