<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Surat;
use App\Models\Inventori;
use App\Models\Keuangan;
use Filament\Widgets\Widget;
use App\Filament\Resources\KeuanganResource;

class BlogPostsOverview extends Widget
{
    protected static string $view = 'filament.widgets.blog-posts-overview';

    public $userCount;
    public $suratCount;
    public $inventoriCount;
    public $anggaranCount;
    public $mapData;

    public function mount(): void
    {
        $this->userCount = User::count();
        $this->suratCount = Surat::count();
        $this->inventoriCount = Inventori::count();
        $this->anggaranCount =  KeuanganResource::getTotalMoney();
        

    //     $this->mapData = [
    //         'lat' =>             -7.936885711016384, 
    //         'lng' => 112.61254034198969,
    //     ];
    }

    protected function getViewData(): array
    {
        return [
            // 'postCount' => $this->userCount,
            // 'mapData' => $this->mapData,
        ];
    }


}