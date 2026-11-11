@echo off
if exist "C:\laragon\bin\php\php-7.3.0-Win32-VC15-x64\php.exe" (
    "C:\laragon\bin\php\php-7.3.0-Win32-VC15-x64\php.exe" artisan %*
) else (
    php artisan %*
)
