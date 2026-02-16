const http = require('http'); // Built-in HTTP module
const fs = require('fs');     // Built-in File System module
const url = require('url');   // Built-in URL module for parsing query strings

// Initial list (will be loaded from file if it exists)
let items = [];

// Load items from file on startup
fs.readFile('data.txt', 'utf8', (err, data) => {
    if (!err && data) {
        items = data.split('\n').filter(item => item.trim() !== '');
    }
});

// Create the HTTP server
const server = http.createServer((req, res) => {
    const parsedUrl = url.parse(req.url, true);
    const pathname = parsedUrl.pathname;
    const query = parsedUrl.query;

    // Serve the HTML page
    if (pathname === '/' && req.method === 'GET') {
        res.writeHead(200, { 'Content-Type': 'text/html' });
        res.write(`
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Node.js To-Do List</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f4f4f4;
                        margin: 20px;
                        text-align: center;
                    }
                    .container {
                        max-width: 500px;
                        margin: 0 auto;
                        padding: 20px;
                        background-color: #fff;
                        border-radius: 8px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    }
                    input[type="text"] {
                        padding: 8px;
                        width: 70%;
                        border: 1px solid #ddd;
                        border-radius: 4px;
                    }
                    button {
                        padding: 8px 16px;
                        background-color: #4CAF50;
                        color: white;
                        border: none;
                        border-radius: 4px;
                        cursor: pointer;
                    }
                    button:hover {
                        background-color: #45a049;
                    }
                    ul {
                        list-style-type: none;
                        padding: 0;
                        text-align: left;
                    }
                    li {
                        padding: 10px;
                        border-bottom: 1px solid #eee;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <h1>Node.js To-Do List</h1>
                    <form action="/add" method="POST">
                        <input type="text" name="item" placeholder="Enter a new task" required>
                        <button type="submit">Add Task</button>
                    </form>
                    <ul>
                        ${items.map(item => `<li>${item}</li>`).join('')}
                    </ul>
                </div>
            </body>
            </html>
        `);
        res.end();
    }

    // Handle form submission (POST request)
    else if (pathname === '/add' && req.method === 'POST') {
        let body = '';
        req.on('data', chunk => {
            body += chunk.toString(); // Collect form data
        });
        req.on('end', () => {
            const item = new URLSearchParams(body).get('item'); // Parse form data
            if (item) {
                items.push(item); // Add to in-memory list
                fs.appendFile('data.txt', item + '\n', (err) => { // Append to file
                    if (err) console.error('Error writing to file:', err);
                });
            }
            res.writeHead(302, { 'Location': '/' }); // Redirect back to home
            res.end();
        });
    }

    // Handle 404
    else {
        res.writeHead(404, { 'Content-Type': 'text/plain' });
        res.write('404 Not Found');
        res.end();
    }
});

// Start the server
const PORT = 3000;
server.listen(PORT, () => {
    console.log(`Server running at http://localhost:${PORT}`);
});