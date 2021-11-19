<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\LoaiDiSan\LoaiDiSanRepositoryInterface::class,
            \App\Repositories\LoaiDiSan\LoaiDiSanRepository::class 
        );
        $this->app->singleton(
            \App\Repositories\DiSan\DiSanRepositoryInterface::class,
            \App\Repositories\DiSan\DiSanRepository::class 
        );
        $this->app->singleton(
            \App\Repositories\HoatDong\HoatDongRepositoryInterface::class,
            \App\Repositories\HoatDong\HoatDongRepository::class 
        );
        $this->app->singleton(
            \App\Repositories\CapDiSan\CapDiSanRepositoryInterface::class,
            \App\Repositories\CapDiSan\CapDiSanRepository::class 
        );
        $this->app->singleton(
            \App\Repositories\DanhGia\DanhGiaRepositoryInterface::class,
            \App\Repositories\DanhGia\DanhGiaRepository::class 
        );
        $this->app->singleton(
            \App\Repositories\DiaChi\DiaChiRepositoryInterface::class,
            \App\Repositories\DiaChi\DiaChiRepository::class 
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
