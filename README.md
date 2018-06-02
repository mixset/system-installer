# System installer

## Description
This script allows to do simple installation. Basically, it provides picking of data like charset, default language or database connection.
Script can be easily developed by editing few files. Although, it requires some configurations from system's author. 

## Additional notes
Programmer ought to create script, that removes all unnecessary directories and files of system installer.

## Changelog
[02-05-2016] v1.0
* Project has been released

[17.02.2017] v1.1
* changed name of directory: `php` -> `core`
* code optimization 

[03.03.2018] v1.2
* Separate steps into class, based on factory strategy
* code separation 
* better project structure
* PSR improvements

[02.06.2018] v1.3
* Config class is managed by composer
* Download config.ini from final step
* Namespaces changed

## ToDo
* rewrite layout
* language support
* Add tests
* Better steps management
* Move StepsList class to dictionary pattern