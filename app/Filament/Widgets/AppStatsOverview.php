<?php

namespace App\Filament\Widgets;

use App\Models\Application;
use App\Models\Job;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AppStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', (string) User::query()->count()),
            Stat::make('Active Users', (string) User::query()->where('is_active', true)->count()),
            Stat::make('Inactive Users', (string) User::query()->where('is_active', false)->count()),
            Stat::make('Total Jobs', (string) Job::query()->count()),
            Stat::make('Top Posted Jobs/User', (string) Job::query()->selectRaw('COUNT(*) as c')->groupBy('posted_by')->orderByDesc('c')->value('c') ?? '0'),
            Stat::make('Max Applications on Job', (string) Application::query()->selectRaw('COUNT(*) as c')->groupBy('job_id')->orderByDesc('c')->value('c') ?? '0'),
        ];
    }
}
