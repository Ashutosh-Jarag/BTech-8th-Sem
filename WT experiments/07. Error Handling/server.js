const fs = require('fs').promises;

async function processFile(filePath) {
  try {
    // Multiple potential error sources
    if (!filePath) {
      throw new Error('File path is required');
    }

    // Attempt to read file
    const data = await fs.readFile(filePath, 'utf8');
    
    // Attempt to parse JSON
    const jsonData = JSON.parse(data);
    
    // Validate data
    if (!jsonData.name) {
      throw new Error('Invalid data: name is required');
    }

    console.log('File processed successfully:', jsonData);
    return jsonData;

  } catch (error) {
    // Handle specific error types
    if (error.code === 'ENOENT') {
      console.error('Error: File not found at', filePath);
    } else if (error instanceof SyntaxError) {
      console.error('Error: Invalid JSON format in file');
    } else if (error.message.includes('Invalid data')) {
      console.error('Error: Data validation failed -', error.message);
    } else {
      // Handle unexpected errors
      console.error('Unexpected error:', error.message);
    }
    
    // Optionally rethrow or return default value
    throw error;
  }
}

// Example usage with async/await
async function main() {
  try {
    // Test with different scenarios
    await processFile('nonexistent.json'); // File not found
    // await processFile('invalid.json'); // Invalid JSON
    // await processFile('valid.json'); // Valid case
  } catch (error) {
    console.error('Main process failed:', error.message);
  }
}

// Run the program
main();