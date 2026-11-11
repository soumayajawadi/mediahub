<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicationTest extends TestCase
{
    use RefreshDatabase;

    public function test_liste_des_publications_est_accessible(): void
    {
        $reponse = $this->get('/contenus');
        $reponse->assertStatus(200);
    }
}