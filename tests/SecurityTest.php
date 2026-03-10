<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityTest extends WebTestCase
{
    // public function testSomething(): void
    // {
    //     $client = static::createClient();
    //     $crawler = $client->request('GET', '/');

    //     $this->assertResponseIsSuccessful();
    //     $this->assertSelectorTextContains('h1', 'Hello World');
    // }

    public function testLoginPageIsAccessible(): void
    {
        //faux navigateur client
        $client = static::createClient();

        //requête GET sur la route de connexion
        $client->request('GET', '/login');

        //vérifie que le code HTTP est 200
        $this->assertResponseIsSuccessful(); 
        
    }

    public function testLogout(): void
    {
        $client = static::createClient();
        
        // On fait une requête GET sur la route de déconnexion configurée dans security.yaml
        $client->request('GET', '/logout');
        
        // Généralement, Symfony redirige vers la page d'accueil ou de login après déconnexion
        $this->assertResponseRedirects('/login'); // ou '/login' selon ta configuration
    }
}
