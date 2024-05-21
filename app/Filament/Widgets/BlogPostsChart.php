<?php

namespace App\Filament\Widgets;

use Filament\Widgets\LineChartWidget;

class BlogPostsChart extends LineChartWidget
{
    protected static ?string $heading = 'Sensus Penduduk';
    protected static ?int $sort = 1;

    protected function getData(): array
    {
        return [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul','Aug','Sep','Okt','Nov','Des'],
            'datasets' => [
                [
                    'label' => 'Pendatang',
                    'data' => [65, 61, 73, 70, 56, 65, 70,71,72,75,71,70],
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)', // Red
                    'borderColor' => 'rgba(255, 99, 132, 1)', // Red
           
                ],
                [
                    'label' => 'Penduduk',
                    'data' => [90, 91, 89, 90, 87, 85, 90,91,92,90,88,88],
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)', // Blue
                    'borderColor' => 'rgba(54, 162, 235, 1)', // Blue
           
                ],
            ],
        ];
    }
}
