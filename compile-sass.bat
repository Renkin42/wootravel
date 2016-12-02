@echo off
rem This is a simple batch script to compile sass files to css and min.css files.

call sass scss\wootravel.scss css\wootravel.css --style expanded
echo Full CSS Updated!
call sass scss\wootravel.scss css\wootravel.min.css --style compressed
echo Minified CSS Updated!