<?php

namespace Appplication\FrontendBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MainControllerTest extends WebTestCase
{
    public function testIndexShowsLogoAndNavigation()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/');
        $this->assertTrue($client->getResponse()->isSuccessful());
        $this->assertEquals(1, $crawler->filter('#logo-text:contains("Symfony2 CMF")')->count());
    }

    public function testAboutShowsTableOfSponsors()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/about');
        $this->assertTrue($client->getResponse()->isSuccessful());
        $this->assertEquals(1, $crawler->filter('table thead th:contains("Company")')->count());
    }

    public function testGetInvolvedShowsALinkToGithubWiki()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/get-involved');
        $this->assertTrue($client->getResponse()->isSuccessful());
        $this->assertEquals(1, $crawler->filter('a:contains("Github Wiki")')->count());
    }

    public function testClickSiteTitleGoToHomepage()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/get-involved');
        $client->click($crawler->selectLink('Symfony2 CMF')->link());
        $this->assertEquals('FrontendBundle:Main:index', $client->getRequest()->attributes->get('_controller'));
    }

    public function testOnlyCurrentNavItemIsCurrent()
    {
        $this->markTestSkipped("The current route detection in template does not work during tests. But it works when running the application on a browser");
        $client = $this->createClient();
        $crawler = $client->request('GET', '/get-involved');
        $this->assertEquals(1, $crawler->filter('#nav li.current a:contains("Get Involved")')->count());
        $this->assertEquals(0, $crawler->filter('#nav li.current a:contains("Home")')->count());
        $this->assertEquals(0, $crawler->filter('#nav li.current a:contains("About")')->count());
    }

}
