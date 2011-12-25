<?php

namespace SymfonyCMF\FrontendBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MainControllerTest extends WebTestCase
{
    public function testIndexShowsLogoAndNavigation()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', $client->getContainer()->get('router')->generate('homepage'));
        $this->assertTrue($client->getResponse()->isSuccessful());
        $this->assertEquals(1, $crawler->filter('#logo-text:contains("Symfony2 CMF")')->count());
    }

    public function testAboutShowsTableOfSponsors()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', $client->getContainer()->get('router')->generate('about'));
        $this->assertTrue($client->getResponse()->isSuccessful());
        $this->assertEquals(1, $crawler->filter('table thead th:contains("Company")')->count());
    }

    public function testGetInvolvedShowsALinkToGithubWiki()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', $client->getContainer()->get('router')->generate('get_involved'));
        $this->assertTrue($client->getResponse()->isSuccessful());
        $this->assertEquals(1, $crawler->filter('a:contains("Github Wiki")')->count());
    }

    public function testClickSiteTitleGoToHomepage()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', $client->getContainer()->get('router')->generate('get_involved'));
        $client->click($crawler->selectLink('Symfony2 CMF')->link());
        $this->assertEquals('SymfonyCMF\FrontendBundle\Controller\MainController::indexAction', $client->getRequest()->attributes->get('_controller'));
    }

    public function testOnlyCurrentNavItemIsCurrent()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', $client->getContainer()->get('router')->generate('get_involved'));
        $this->assertEquals(1, $crawler->filter('#nav li.current a:contains("Get Involved")')->count());
        $this->assertEquals(0, $crawler->filter('#nav li.current a:contains("Home")')->count());
        $this->assertEquals(0, $crawler->filter('#nav li.current a:contains("About")')->count());
    }

}
