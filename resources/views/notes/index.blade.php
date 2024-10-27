    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Notes</title>
        <style>
            
            header {
                position: sticky;
                top: 0;
                width: 100%;
                height: 100px;
                background: linear-gradient(90deg, rgba(2,6,51,1) 2%, rgba(39,52,97,1) 64%, rgba(74,105,179,1) 82%, rgba(148,187,233,1) 100%);
                display: flex;
                justify-content: space-between; 
                align-items: center;
                z-index: 100;
                padding: 0 20px; 
            }

            .home-link {
                color: #070649;
                font-size: 20px;
                text-decoration: none;
                padding: 10px; 
                border: 2px solid transparent;
                border-radius: 5px; 
                transition: background-color 0.3s ease, border-color 0.3s ease; 
            }

            .home-link:hover {
                background-color: rgba(255, 255, 255, 0.2); 
                border-color: none; 
            }

            .home-link:focus {
                outline: none; 
                border-color: #0056b3;
            }

            .layout-options {
                display: flex;
                align-items: center; 
                margin-right: 40px;
                gap: 15px;
            }

            .layout-options select {
                padding: 10px;
                border: 2px solid #007bff; 
                border-radius: 5px; 
                background-color: #fff;
                color: #333; 
                font-size: 16px; 
                cursor: pointer;
                transition: border-color 0.3s ease; 
            }

            .layout-options select:hover {
                border-color: #0056b3; 
            }

            .layout-options select:focus {
                outline: none; 
                border-color: #0056b3; 
            }

            h1 {
                margin: 0; 
                color: #f5f5f5;
                font-size: 75px;
                text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7); 
            }


            body {
                font-family: 'Arial', sans-serif;
                color: #333;
                margin: 0;
                padding: 0;
                overflow-x: hidden;
                background-color: #bed1e6;
            }

            .container {
                max-width: 901px;
                margin: 25px auto;
                padding: 0 15px;
                display: flex;
                flex-wrap: wrap;
                gap: 20px;
                position: relative; 
            }

            .note {
                border-radius: 8px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
                padding: 15px;
                cursor: pointer;
                transition: transform 0.3s ease;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }

            .grid-view .note {
                width: calc((100% / 4) + 30px);
                height: 200px;
            }

            .column-view .note {
                width: 100%;
                height: 100px;
                flex-direction: row;
            }

            .square-view {
                overflow: hidden; 
            }

            .square-view .square-note {
                width: 375px;  
                height: 375px; 
                position: static;
                margin: 0 auto 20px  auto;
                background-color: #f0f0f0;
                border: none;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                display: flex;
                flex-direction: column;
                padding: 20px 30px 20px 20px;
                box-sizing: border-box;
                overflow: hidden; 
            }


            .square-note .note-title {
                margin: 0;
                font-weight: bold; 
                font-size: 1.2em; 
            }

            .square-note .note-meta {
                margin: 2px 0 10px 0;
                font-size: 0.8em; 
                color: #666; 
            }


            .square-note .note-body {
                flex-grow: 1;
                overflow-y: auto; 
                display: -webkit-box;
                -webkit-box-orient: vertical;
                -webkit-line-clamp: unset;
                margin: 0;
            }

            .square-note .note-body::-webkit-scrollbar {
                display: none; 
            }

            .square-nav {
                display: flex;
                justify-content: space-between;
                width: 100%; 
                position: absolute;
                top: 50%;
                left: 0; 
                transform: translateY(-50%);
            }

            .square-nav .nav-button {
                background-color: #007bff; 
                color: white; 
                border: none;
                border-radius: 50%; 
                padding: 15px; 
                cursor: pointer;
                transition: background-color 0.3s ease;
                width: 50px; 
                height: 50px; 
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3); 
            }

            .square-nav .nav-button:hover {
                background-color: #0056b3; 
            }

            .square-nav .left {
                
                left: -70px;
                
            }

            .square-nav .right {
                right: -70px; 
            }

            .note:hover {
                transform: scale(1.02);
            }

            .note-title {
                font-weight: bold;
                font-size: 1.2em;
                color: #333;
                margin-bottom: 10px;
            }

            .note-meta {
                font-size: 0.8em;
                color: #666;
                margin: 10px 0;
            }

            .note-body {
                font-size: 1em;
                color: #333;
                overflow: hidden; 
                text-overflow: ellipsis;
                display: -webkit-box; 
                -webkit-line-clamp: 10;
                -webkit-box-orient: vertical; 
                margin: 0; 
                flex-grow: 1;
            }

            .more-options {
                position: relative;
                font-size: 24px;
                color: #333;
                cursor: pointer;
            }

            .dropdown {
                position: absolute; 
                left: 15px;
                transform: translateY(-50%);
                display: none;
                gap: 10px;
                background-color: #28449e;
                border: 1px solid #231d7c;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
                border-radius: 4px;
                z-index: 1000;
            }

            .dropdown a {
                display: flex;
                padding: 10px;
                text-decoration: none;
                color: #f5f5f5;
                transition: background-color 0.3s ease;
            }

            .dropdown a:hover {
                background-color: #0c0a68;
            }

            .plus-button {
                position: fixed;
                bottom: 30px;
                left: 50%;
                transform: translateX(-50%);
                background-color: #d6c209;
                border: none;
                border-radius: 50%;
                width: 80px;
                height: 80px;
                color: rgb(0, 0, 0);
                font-size: 36px;
                text-align: center;
                line-height: 60px;
                cursor: pointer;
                transition: background-color 0.3s ease;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
                text-decoration: none;
            }

            .plus-button:hover {
                background-color: #0056b3;
            }

            @media (max-width: 600px) {
                header {
                    height: 13vh;
                }

                h1 {
                    font-size: 10vw;
                }

                .note-title {
                    font-size: 1em;
                }

                .note-body {
                    font-size: 0.9em;
                }

                .note {
                    flex: 1 1 calc(100% - 20px);
                    height: 150px;
                }
            }

            .no-scroll {
                overflow: hidden; 
            }
        </style>
    </head>

    <header>
        <h1>Notes</h1>
        <div class="layout-options">
            <select id="layout-toggle" onchange="changeLayout()">
                <option value="grid-view">Grid</option>
                <option value="column-view">List</option>
                <option value="square-view">Read </option>
            </select>
            <a href="/" class="home-link">Home</a>
        </div>
    </header>

    <body>
        <div id="notes-container" class="container grid-view">
            @foreach($notes->sortByDesc('updated_at') as $note)
            <div class="note">
                <div class="note-content" onclick="window.location.href='{{ route('notes.show', ['note' => $note]) }}'">
                    <div class="note-title">{{ $note->title }}</div>
                    <div class="note-meta">
                        <small>Created: {{ \Carbon\Carbon::parse($note->created_at)->diffForHumans() }}</small>
                        @if($note->updated_at != $note->created_at)
                            | <small>Updated: {{ \Carbon\Carbon::parse($note->updated_at)->diffForHumans() }}</small>
                        @endif
                    </div>
                    <div class="note-body">{{ Str::limit($note->body, 175) }}</div>
                </div>
                <div class="more-options" onclick="toggleDropdown(event)">
                    &#8942;
                    <div class="dropdown">
                        <a href="{{ route('notes.edit', ['note' => $note]) }}">Edit</a>
                        <a href="{{ route('notes.delete', ['note' => $note]) }}">Delete</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Square View -->
        <div id="square-view" class="container square-view" style="display: none;">
            <div class="square-note">
                <div class="note-title">{{ $notes[0]->title }}</div>
            
                <div class="note-meta">
                    <small>Created: {{ \Carbon\Carbon::parse($notes[0]->created_at)->diffForHumans() }}</small>
                    @if($notes[0]->updated_at != $notes[0]->created_at)
                        | <small>Updated: {{ \Carbon\Carbon::parse($notes[0]->updated_at)->diffForHumans() }}</small>
                    @endif
                </div>
                <div class="note-body">{{ $notes[0]->body }}</div>
            </div>
            <div class="square-nav">
                <button class="nav-button left" onclick="navigate('left')"><</button>
                <button class="nav-button right" onclick="navigate('right')">></button>
            </div>
        </div>

        <button class="plus-button" onclick="window.location.href='{{ route('notes.create') }}'">+</button>

        <script>
            const pastelColors = ['#ffdbac', '#ffccf9', '#c9eaff', '#e4ffcc', '#ffd3b4', '#ffe7d9', '#e5d1ff'];
        
            function changeLayout() {
                const selectedLayout = document.getElementById('layout-toggle').value;
                localStorage.setItem('selectedLayout', selectedLayout); // Save layout to localStorage
                const notesContainer = document.getElementById('notes-container');
                const squareView = document.getElementById('square-view');
        
                if (selectedLayout === 'grid-view' || selectedLayout === 'column-view') {
                    notesContainer.className = 'container ' + selectedLayout;
                    notesContainer.style.display = 'flex';
                    squareView.style.display = 'none';
                    applyRandomColorsToNotes();
                } else if (selectedLayout === 'square-view') {
                    notesContainer.style.display = 'none';
                    squareView.style.display = 'block';
                    squareView.querySelector('.square-note').style.backgroundColor = getRandomPastelColor();
                }
            }
        
            // Retrieve saved layout on page load
            document.addEventListener('DOMContentLoaded', () => {
                const savedLayout = localStorage.getItem('selectedLayout') || 'grid-view'; // Default to 'grid-view'
                document.getElementById('layout-toggle').value = savedLayout;
                changeLayout();
                applyRandomColorsToNotes();
            });
        
            function toggleDropdown(event) {
                event.stopPropagation();
                const dropdowns = document.querySelectorAll('.dropdown');
                const dropdown = event.currentTarget.querySelector('.dropdown');
        
                dropdowns.forEach(drop => {
                    if (drop !== dropdown) {
                        drop.style.display = 'none';
                    }
                });
                dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
            }
        
            function navigate(direction) {
                const notes = @json($notes);
                const squareNoteTitle = document.querySelector('.square-note .note-title');
                const squareNoteBody = document.querySelector('.square-note .note-body');
                let currentIndex = notes.findIndex(note => note.title === squareNoteTitle.textContent);
        
                if (direction === 'left') {
                    currentIndex = (currentIndex > 0) ? currentIndex - 1 : notes.length - 1;
                } else {
                    currentIndex = (currentIndex < notes.length - 1) ? currentIndex + 1 : 0;
                }
        
                squareNoteTitle.textContent = notes[currentIndex].title;
                squareNoteBody.textContent = notes[currentIndex].body;
                document.querySelector('.square-note').style.backgroundColor = getRandomPastelColor();
            }
        
            function getRandomPastelColor() {
                return pastelColors[Math.floor(Math.random() * pastelColors.length)];
            }
        
            function applyRandomColorsToNotes() {
                const notes = document.querySelectorAll('.note');
                notes.forEach(note => {
                    note.style.backgroundColor = getRandomPastelColor();
                });
            }
        
            document.addEventListener('click', function() {
                const dropdowns = document.querySelectorAll('.dropdown');
                dropdowns.forEach(dropdown => {
                    dropdown.style.display = 'none';
                });
            });
        </script>
    </body>
    </html>
