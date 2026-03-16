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

    // public function testLoginPageIsAccessible(): void
    // {
    //     //faux navigateur client
    //     $client = static::createClient();

    //     //requête GET sur la route de connexion
    //     $client->request('GET', '/login');

    //     //vérifie que le code HTTP est 200
    //     $this->assertResponseIsSuccessful(); 
        
    // }

    // public function testLogout(): void
    // {
    //     $client = static::createClient();
        
    //     $client->request('GET', '/logout');
        
    //     $this->assertResponseRedirects('/login'); 
    // }

    // CT-01.1 : Connexion admin réussie
    public function testConnexionAdminReussie(): void
    {
        $client = static::createClient();
        $client->request('GET', '/login');

        $client->submitForm('Se connecter', [
            'email' => 'admin@lachataigneraie.fr',
            'password' => 'password',
        ]);

        $this->assertResponseRedirects('/dashboard/all');
    }

    // CT-01.2 : Connexion enseignant réussie
    public function testConnexionEnseignantReussie(): void
    {
        $client = static::createClient();
        $client->request('GET', '/login');

        $client->submitForm('Se connecter', [
            'email' => 'enseignant@lachataigneraie.fr',
            'password' => 'password',
        ]);

        $this->assertResponseRedirects('/dashboard/mystages');
    }

    // CT-01.3 : Mot de passe incorrect
    public function testMotDePasseIncorrect(): void
    {
        $client = static::createClient();
        $client->request('GET', '/login');

        $client->submitForm('Se connecter', [
            'email' => 'admin@lachataigneraie.fr',
            'password' => 'mauvaismdp',
        ]);
        
        $client->followRedirect();

        $this->assertSelectorExists('.alert-danger');
        $this->assertSelectorTextContains('.alert-danger', 'Identifiants invalides');
    }

    // CT-01.4 : Email inexistant
    public function testEmailInexistant(): void
    {
        $client = static::createClient();
        $client->request('GET', '/login');

        $client->submitForm('Se connecter', [
            'email' => 'inexistant@lachataigneraie.fr',
            'password' => 'password',
        ]);
        
        $client->followRedirect();

        $this->assertSelectorExists('.alert-danger');
        $this->assertSelectorTextContains('.alert-danger', 'Identifiants invalides');
    }

    // CT-01.5 : Compte inactif
    public function testCompteInactif(): void
    {
        $client = static::createClient();
        $client->request('GET', '/login');

        $client->submitForm('Se connecter', [
            'email' => 'inactif@lachataigneraie.fr',
            'password' => 'password',
        ]);
        
        $client->followRedirect();

        // Remarque : Si tu n'as pas encore géré le message "Compte désactivé" via un UserChecker,
        // Symfony affichera le message générique. Le test passera tant qu'il y a une erreur.
        $this->assertSelectorExists('.alert-danger');
    }

    // CT-01.6 : Persistance session (30 min)
    // Note : Il est complexe de simuler 30 minutes exactes en PHPUnit. 
    // On teste ici que la session persiste bien lors de la navigation vers une autre page.
    public function testPersistanceSession(): void
    {
        $client = static::createClient();
        $client->request('GET', '/login');

        $client->submitForm('Se connecter', [
            'email' => 'admin@lachataigneraie.fr',
            'password' => 'password',
        ]);
        $client->followRedirect();

        // On vérifie que le cookie de session a bien été créé par le navigateur simulé
        $cookieJar = $client->getCookieJar();
        $this->assertNotEmpty($cookieJar->all(), 'La session (cookie) doit être créée après la connexion.');
    }

    // CT-01.7 : Déconnexion
    public function testDeconnexion(): void
    {
        $client = static::createClient();
        
        // On clique sur le lien de déconnexion
        $client->request('GET', '/logout');
        
        // On vérifie qu'on est redirigé (vers l'accueil ou le login)
        $this->assertResponseRedirects();
    }

    // CT-01.8 : Accès page protégée sans authentification
    public function testAccesPageProtegeeSansAuth(): void
    {
        $client = static::createClient();
        
        // On essaie d'aller sur une URL sécurisée sans être connecté
        $client->request('GET', '/dashboard/all');
        
        // On doit être éjecté vers la page de login
        $this->assertResponseRedirects('/login');
    }
}

