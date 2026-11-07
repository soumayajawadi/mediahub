<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use App\Http\Requests\StorePublicationRequest;
use App\Http\Requests\UpdatePublicationRequest;
use App\Http\Resources\PublicationResource;

class PublicationController extends Controller
{
    public function index()
    {
        $publications = Publication::with(['categorie', 'auteur'])->latest()->paginate(10);
        return PublicationResource::collection($publications);
    }

    public function store(StorePublicationRequest $request)
    {
        $publication = Publication::create([
            ...$request->validated(),
            'user_id' => $request->user()->id,
        ]);
        return (new PublicationResource($publication))->response()->setStatusCode(201);
    }

    public function show(Publication $publication)
    {
        return new PublicationResource($publication->load(['categorie', 'auteur']));
    }

    public function update(UpdatePublicationRequest $request, Publication $publication)
    {
        $this->authorize('update', $publication);
        $publication->update($request->validated());
        return new PublicationResource($publication);
    }

    public function destroy(Publication $publication)
    {
        $this->authorize('delete', $publication);
        $publication->delete();
        return response()->json(null, 204);
    }
}