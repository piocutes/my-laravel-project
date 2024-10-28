<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        @media (min-width: 769px) {
            body {
                background-color: white;
                font-family: open, sans-serif;
                margin: 0;
                padding-top: 100px;
            }
            .header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                z-index: 1000;
                background: rgb(2,0,36);
                background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 11%, rgba(0,212,255,1) 100%);
                padding: 0px 20px 0 20px; 
            }
            .header h1 {
                font-weight: bold;
                margin: 20px;
                font-size: 60px;
                color: white;
            }
            .header a {
                text-decoration: none;
                color: rgb(8, 7, 82); 
                transition: color 0.3s;
                font-size: 25px;
                margin: 20px;
            }
            .header a:hover {
                color: #071279; 
            }
            .container {
                margin: 25px auto;
                padding: 0 20px;
                max-width: 750px;
                width: 90%;
            }
            .note-card { 
                border-radius: 5px; 
                padding: 15px; 
                margin-bottom: 10px; 
                cursor: pointer; 
                transition: background-color 0.3s; 
                position: relative; 
            }
            .note-card:hover {
                background-color: #f9f9f9; 
            }
            .note-title {
                font-weight: bold;
                font-size: 22px;
            }
            .note-date {
                font-size: 0.9em; 
                color: rgb(26, 25, 25); 
            }
            .empty-state {
                text-align: center;
                color: gray;
                margin: 20px;
            }
            .menu {
                position: absolute;
                bottom: 10px; 
                right: 10px; 
            }
            .menu-dots {
                cursor: pointer;
                font-size: 25px;
                font-weight: bold;
                color: black;
                transform: rotate(90deg); 
            }
            .menu-options {
                position: absolute;
                bottom: 30px; 
                right: 0;
                background-color: white;
                border: 1px solid #ddd;
                border-radius: 4px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
                z-index: 100;
                padding: 5px;
                display: none; 
            }
            .menu-options a {
                display: block;
                padding: 8px 10px;
                text-decoration: none;
                color: rgb(59, 59, 59);
            }
            .menu-options a:hover {
                background-color: #f0f0f0;
            }
            .create-note-btn {
                position: fixed;
                bottom: 20px; 
                left: 50%; 
                transform: translateX(-50%); 
                width: 60px; 
                height: 60px; 
                border: none;
                border-radius: 50%; 
                background-color: black; 
                color: white; 
                font-size: 35px; 
                font-weight: bold; 
                cursor: pointer; 
                transition: background-color 0.3s, transform 0.3s; 
            }
            .create-note-btn:hover {
                background-color: gray; 
                transform: translateX(-50%) scale(1.1); 
            }
        }
        @media (max-width: 768px) {
            body {
                background-color: white;
                font-family: open, sans-serif;
                margin: 0; 
                padding-top: 100px; 
            }
            .header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                position: fixed; 
                top: 0;
                left: 0;
                right: 0;
                z-index: 1000;
                background-color: white;
                padding: 50px 20px 0 20px; 
            }
            .header h1 {
                font-weight: bold;
                margin: 0; 
                font-size: 50px;
            }
            .header a {
                text-decoration: none;
                color: rgb(59, 59, 59); 
                transition: color 0.3s;
                font-size: 25px;
            }
            .header a:hover {
                color: black; 
            }
            .container {
                margin: 15px auto; 
                padding: 0 20px; 
                max-width: 750px; 
                width: 90%; 
            }
            .note-card {
                border-radius: 5px;
                padding: 15px;
                margin-bottom: 10px;
                cursor: pointer;
                transition: background-color 0.3s;
                position: relative; 
                overflow: hidden; 
                max-height: 200px; 
            }
            .note-title {
                font-weight: bold;
                font-size: 22px;
                margin-bottom: 5px; 
            }
            .note-date {
                font-size: 0.9em;
                color: rgb(26, 25, 25);
                margin-bottom: 10px; 
            }
            .note-body {
                margin: 20px;
                overflow: hidden; 
                text-overflow: ellipsis; 
                display: -webkit-box;
                -webkit-line-clamp: 3; 
                -webkit-box-orient: vertical; 
            }
            .empty-state {
                text-align: center;
                color: gray;
                margin: 20px;
            }
            .menu {
                position: absolute;
                bottom: 10px; 
                right: 10px; 
            }
            .menu-dots {
                cursor: pointer;
                font-size: 25px;
                font-weight: bold;
                color: black;
                transform: rotate(90deg); 
            }
            .menu-options {
                position: absolute;
                bottom: 30px; 
                right: 0;
                background-color: white;
                border: 1px solid #ddd;
                border-radius: 4px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
                z-index: 100;
                padding: 5px;
                display: none; 
            }
            .menu-options a {
                display: block;
                padding: 8px 10px;
                text-decoration: none;
                color: rgb(59, 59, 59);
            }
            .menu-options a:hover {
                background-color: #f0f0f0;
            }
            .create-note-btn {
                position: fixed;
                bottom: 20px; 
                left: 50%; 
                transform: translateX(-50%); 
                width: 60px; 
                height: 60px; 
                border: none;
                border-radius: 50%; 
                background-color: black; 
                color: white; 
                font-size: 35px; 
                font-weight: bold; 
                cursor: pointer; 
                transition: background-color 0.3s, transform 0.3s; 
            }
            .create-note-btn:hover {
                background-color: gray; 
                transform: translateX(-50%) scale(1.1); 
            }
        }
    </style>
</head>
<body>

    <header class="header">
        <h1>Notes</h1>
        <a href="/">Home</a>
    </header>

    <div class="container">
        @if ($notes->isEmpty())
            <div class="empty-state">
                <p>No notes available. Create your first note!</p>
            </div>
        @else
            @foreach ($notes as $note)
                <div class="note-card" onclick="window.location='{{ route('notes.show', $note->id) }}'">
                    <div class="note-title">{{ $note->title }}</div>
                    <small class="note-date">{{ \Carbon\Carbon::parse($note->created_at)->format('F j, Y D') }}</small>
                    <p>{{ Str::limit($note->body, 100) }}</p>
                    <div class="menu">
                        <div class="menu-dots" onclick="toggleMenu(event)">&#8230;</div>
                        <div class="menu-options">
                            <a href="{{ route('notes.edit', $note->id) }}">Edit</a>
                            <a href="{{ route('notes.delete', $note->id) }}">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

        <button class="create-note-btn" onclick="window.location='{{ route('notes.create') }}'">+</button>

    </div>

    <script>
        const pastelColors = [
            '#ffc76e', 
            '#ff966c',
            '#e2ef91', 
            '#B590CA',
            '#00d8ff',
        ];
    
        function getRandomPastelColor(excludeColor) {
            let color;
            do {
                color = pastelColors[Math.floor(Math.random() * pastelColors.length)];
            } while (color === excludeColor);
            return color;
        }
    
        let lastColor = null;
    
        document.querySelectorAll('.note-card').forEach(card => {
            const newColor = getRandomPastelColor(lastColor);
            card.style.backgroundColor = newColor;
            lastColor = newColor;
        });

        let currentlyOpenMenu = null;

        function toggleMenu(event) {
            event.stopPropagation();
            const menuOptions = event.target.nextElementSibling;

            if (currentlyOpenMenu && currentlyOpenMenu !== menuOptions) {
                currentlyOpenMenu.style.display = 'none';
            }

            const isVisible = menuOptions.style.display === 'block';
            menuOptions.style.display = isVisible ? 'none' : 'block';
            currentlyOpenMenu = isVisible ? null : menuOptions;
        }

        document.addEventListener('click', function() {
            if (currentlyOpenMenu) {
                currentlyOpenMenu.style.display = 'none';
                currentlyOpenMenu = null;
            }
        });
    </script>
    
</body>
</html>
