<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ColisResource\Pages;
use App\Filament\Resources\ColisResource\RelationManagers;
use App\Models\Colis;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use illuminate\support\str;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ColisResource extends Resource
{
    protected static ?string $model = Colis::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::Make()->schema ([
                    BelongsToSelect::make('user_Id')
                        ->relationShip('user','name'),    
                           TextInput::make('name')->reactive()
                            ->afterStateUpdated(function(Closure $set,$state) {
                               $set('slug',str::slug($state));
                            })->required(),
                       TextInput::make('slug')->required(),
                   SpatieMediaLibraryFileUpload::make('thumbnail')->collection('colis'),
                   TextInput::make('poids'),
                   TextInput::make('heure_depart'),
                   TextInput::make('heure_arrivee'),
                   Toggle::make('is_published')
              
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                    TextColumn::make('name')->limit('50')->sortable()->searchable(),
                    TextColumn::make('slug')->limit('50'),
                    BooleanColumn::make('is_published'),
                  //  SpatieMediaLibraryImageColumn::make('thumbnail')->collection('colis'), 
            ])
            ->filters([
                Filter::make('published')
                ->query (fn (builder $query ):builder =>$query->where('is_published',true)),
            Filter::make('Unpublished')
                ->query (fn (builder $query ):builder =>$query->where('is_published',false)),
            //SelectFilter::make('colis')->relationship('colis','name')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListColis::route('/'),
            'create' => Pages\CreateColis::route('/create'),
            'edit' => Pages\EditColis::route('/{record}/edit'),
        ];
    }    
}
