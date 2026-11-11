@echo off
if exist "C:\laragon\bin\php\php-7.3.0-Win32-VC15-x64\php.exe" (
    echo [WebSMK] Menjalankan server menggunakan PHP 7.3...
    "C:\laragon\bin\php\php-7.3.0-Win32-VC15-x64\php.exe" artisan serve %*
) else (
    php artisan serve %*
)
