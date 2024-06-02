<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\Widget;

class BlogPostsOverview extends Widget
{
    protected static string $view = 'filament.widgets.blog-posts-overview';

    public $userCount;
    public $mapData;

    public function mount(): void
    {
        $this->userCount = User::count();

        $this->mapData = [
            'lat' => -7.936885711016384,
            'lng' => 112.61254034198969,
        ];
    }

    protected function getViewData(): array
    {
        return [
            'postCount' => $this->userCount,
            'mapData' => $this->mapData,
        ];
    }
}
