<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JobResource\Pages;
use App\Models\Job;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class JobResource extends Resource
{
    protected static ?string $model = Job::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')->required(),
            Forms\Components\Textarea::make('description')->required()->columnSpanFull(),
            Forms\Components\Select::make('job_type')->options([
                'full_time' => 'Full Time',
                'part_time' => 'Part Time',
                'remote' => 'Remote',
                'onsite' => 'Onsite',
                'contract' => 'Contract',
                'freelance' => 'Freelance',
                'internship' => 'Internship',
            ])->required(),
            Forms\Components\TextInput::make('job_category')->required(),
            Forms\Components\TextInput::make('location')->required(),
            Forms\Components\DatePicker::make('last_date_to_apply')->required(),
            Forms\Components\Toggle::make('is_active')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('job_type')->badge(),
            Tables\Columns\TextColumn::make('employer.name')->label('Posted By')->searchable(),
            Tables\Columns\TextColumn::make('applications_count')->counts('applications')->label('Applied'),
            Tables\Columns\IconColumn::make('is_active')->boolean(),
            Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
        ])->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJobs::route('/'),
            'create' => Pages\CreateJob::route('/create'),
            'edit' => Pages\EditJob::route('/{record}/edit'),
        ];
    }
}
