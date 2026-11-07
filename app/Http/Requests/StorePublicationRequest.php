<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Zid hédhom bch t'zid el limite mte3 PHP direct
ini_set('upload_max_filesize', '40M');
ini_set('post_max_size', '40M');
ini_set('memory_limit', '512M');
ini_set('max_execution_time', '600');

class StorePublicationRequest extends FormRequest
{public function rules(): array
{
    return [
        'titre' => 'required|string|max:255',
        'contenu' => 'required|string|min:20',
        'categorie_id' => 'required|exists:categories,id',
        'image' => 'nullable|file|image|max:2048',
        'fichier_media' => 'nullable|file|mimes:mp3,mp4,wav|max:20480',
    ];
}
}