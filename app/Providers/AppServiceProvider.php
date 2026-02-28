<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use App\Models\SMTPModel;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Paginator::useBootstrap();

        // ❗ НЕ виконуємо DB код під час composer / artisan
        if (app()->runningInConsole()) {
            return;
        }

        // ❗ Перевірка існування таблиці
        if (!Schema::hasTable('smtp')) {
            return;
        }

        $mailsetting = SMTPModel::getSingle();

        if (!$mailsetting) {
            return;
        }

        Config::set('mail.mailers.smtp', [
            'transport'  => 'smtp',
            'host'       => $mailsetting->mail_host,
            'port'       => $mailsetting->mail_port,
            'encryption' => $mailsetting->mail_encryption,
            'username'   => $mailsetting->mail_username,
            'password'   => $mailsetting->mail_password,
        ]);

        Config::set('mail.from', [
            'address' => $mailsetting->mail_from_adress,
            'name'    => $mailsetting->name,
        ]);
    }
}