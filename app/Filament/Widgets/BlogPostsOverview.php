<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\Widget;

class BlogPostsOverview extends Widget
{
    protected static string $view = 'filament.widgets.blog-posts-overview';

    public $userCount;

    public function mount(): void
    {
        $this->userCount = User::count();
    }

    protected function getViewData(): array
    {
        return [
            'postCount' => $this->userCount,
        ];
    }
}
