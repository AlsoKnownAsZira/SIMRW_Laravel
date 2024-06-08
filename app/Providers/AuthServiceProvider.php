<?php

namespace App\Providers;

 use App\Models\data_aduan;
 use App\Models\Inventori;
 use App\Models\kegiatan;
 use App\Models\Keuangan;
 use App\Models\Surat;
 use App\Policies\DataAduanPolicy;
 use App\Policies\InventoriPolicy;
 use App\Policies\KegiatanPolicy;
 use App\Policies\KeuanganPolicy;
 use App\Policies\SuratPolicy;
 use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Policies\UserPolicy;
//use Illuminate\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
        data_aduan::class => DataAduanPolicy::class,
        Inventori::class => InventoriPolicy::class,
        kegiatan::class => KegiatanPolicy::class,
        Keuangan::class => KeuanganPolicy::class,
        Surat::class => SuratPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::before(function ($user, $ability) {
            return $user->hasRole('Admin') ? true : null;
        });
    }
}
