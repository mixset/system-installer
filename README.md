##System installer
[![GitHub release](https://img.shields.io/github/release/qubyte/rubidium.svg?maxAge=2592000&label=version&style=1.0)]()

### Description
This script allows to do simple installation. Basically, it provides picking of data like charset, default language or database connection.
Script can be easily developed by editing few files. Although, it requires some configurations from system's author. 

### Additonal notes
Programmer ought to create script, that removes all unnecessary directories and files of system installer.

### Files of the script
1. index.php
2. .htaccess
3. php/ directory
 - config.class.php 
 - installer.class.php
4. parts/ directory 
 - basic.part.php
 - database.part.php
 - start.part.php
 - finish.part.php
5. js/ directory
 - core.js
6. css/ directory
 - style.css
7. config/ directory
 - config.ini
