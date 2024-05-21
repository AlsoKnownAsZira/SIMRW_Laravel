<?php
namespace App\Filament\Widgets;

use Filament\Widgets\PieChartWidget;

class PiePostsChart extends PieChartWidget
{
    protected static ?string $heading = 'Chart';
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        return [
            'labels' => ['Balita', 'Anak-anak', 'Remaja','Dewasa','Lansia'],
            'datasets' => [
                [
                    'data' => [15, 29, 20,45],
                    
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 0.5)',  // Red
                        'rgba(54, 162, 235, 0.5)',  // Blue
                        'rgba(255, 206, 86, 0.5)',  // Yellow
                        'rgba(75, 192, 192, 0.5)',  // Green
                        'rgba(153, 102, 255, 0.5)', // Purple
                    ],
                    'borderColor' => [
                        'rgba(255, 99, 132, 1)',    // Red
                        'rgba(54, 162, 235, 1)',    // Blue
                        'rgba(255, 206, 86, 1)',    // Yellow
                        'rgba(75, 192, 192, 1)',    // Green
                        'rgba(153, 102, 255, 1)',   // Purple
                    ],
                    
                ],
            ],
        ];
    }
}
?>