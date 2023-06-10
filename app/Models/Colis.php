<?php

namespace App\Models;

use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Console\Concerns\InteractsWithIO;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrairy\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia as MediaLibraryHasMedia;
use Spatie\MediaLibrairy\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia as MediaLibraryInteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Contracts\MediaLibraryRequest;

class Colis extends Model implements MediaLibraryHasMedia
{
    use HasFactory,MediaLibraryInteractsWithMedia;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'poids',
        'heure_depart',
        'heure_arrivee',
        'is_published',
    ];

    protected $casts =[
        'is_published'=> 'boolean',
       ];

    public function user(){
        return $this->belongsTo(user::class);
    }
}
