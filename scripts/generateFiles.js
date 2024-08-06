const shelljs = require('shelljs');
const kataName = process.argv[2];

if (!kataName) {
    console.error('Please provide a kata name');
    return;
}

shelljs.exec(`mkdir -p src/${kataName}Kata`);
shelljs.exec(`touch src/${kataName}Kata/${kataName}Kata.php`);

shelljs.exec(`mkdir -p tests/${kataName}Tests`);
shelljs.exec(`touch tests/${kataName}Tests/${kataName}Tests.php`);

console.info('Files generated successfully');
