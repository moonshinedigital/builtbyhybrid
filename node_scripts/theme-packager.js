const archiver = require('archiver');
const fs = require('fs');

// Get the command-line arguments.
const args = process.argv.slice(2); // Skip the first two arguments (node and script name).

// Define default names if no arguments are provided.
const zipFileName = args[0] || 'theme.zip';
const folderName = args[1] || 'theme';

// Create a new archive.
const archive = archiver('zip', {
	zlib: { level: 9 }, // Sets the compression level.
});

// Output file stream with the specified zip file name.
const output = fs.createWriteStream(zipFileName);

// Pipe archive data to the output file.
archive.pipe(output);

// Add the folder with contents from the 'build' directory.
archive.directory('build', folderName);

// Finalize the archive and close the output file.
archive.finalize();

console.log(`Packaging up the ${zipFileName} theme...`);

output.on('close', () => {
	console.log(`Theme package ${zipFileName} has been created.`);
});
