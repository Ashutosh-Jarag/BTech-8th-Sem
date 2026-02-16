const fs = require('fs');
const path = require('path');

// Path to the JSON file
const filePath = path.join(__dirname, 'data.json');

try {
    // Check if file exists
    if (!fs.existsSync(filePath)) {
        throw new Error('File does not exist.');
    }

    // Read the file
    const rawData = fs.readFileSync(filePath, 'utf-8');

    // Check if file is empty
    if (rawData.trim() === '') {
        throw new Error('File is empty.');
    }

    // Parse the JSON
    let jsonData;
    try {
        jsonData = JSON.parse(rawData);
    } catch (parseError) {
        throw new Error('Invalid JSON format.');
    }

    // Check if it's an array or object (basic structure check)
    if (typeof jsonData !== 'object') {
        throw new Error('Unexpected JSON structure.');
    }

    // If everything is fine
    console.log('JSON data successfully read:', jsonData);

} catch (err) {
    console.error('Error reading JSON file:', err.message);
}
