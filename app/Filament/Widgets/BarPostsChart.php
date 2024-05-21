<?php

namespace App\Filament\Widgets;

use Filament\Widgets\BarChartWidget;

class BarPostsChart extends BarChartWidget
{
    protected static ?string $heading = 'Jenis Kelamin';
    protected static ?int $sort = 2;
    protected function getData(): array
    {
        return [
            'labels' => ['Jenis Kelamin'],
            'datasets' => [
                [
                    'label' => 'Laki-laki',
                    'data' => [150 ],
                    'backgroundColor' => 'rgba(54, 162, 235, 0.6)', // Blue
                    'borderColor' => 'rgba(54, 162, 235, 1)', // Blue
          
                ],
                [
                    'label' => 'Perempuan',
                    'data' => [120],
                    'backgroundColor' => 'rgba(255, 99, 132, 0.6 )', // Red
                    'borderColor' => 'rgba(255, 99, 132, 1)', // Red
                ],
            ],
        ];
    }
}
