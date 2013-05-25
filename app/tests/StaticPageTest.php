<?php

namespace Cmf;

class StaticPageTest extends WebTestCase
{

    /**
     * @dataProvider contentDataProvider
     */
    public function testContent($url, $title)
    {
        $client = $this->createClient();

        $crawler = $client->request('GET', $url);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertCount(1, $crawler->filter(sprintf('h2:contains("%s")', $title)), 'Page does not contain an h2 tag with: '.$title);
    }

    public function contentDataProvider()
    {
        return array(
            array('/', 'The Symfony CMF Project'),
            array('/news', 'News'),
            array('/news/cmf-featured-on-symfony-com', 'Symfony CMF featured on symfony.com'),
            array('/get-started', 'Get started'),
            array('/get-involved', 'Get involved'),
            array('/about', 'About'),
        );
    }

    public function testAboutShowsTableOfSponsors()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/about');
        $this->assertTrue($client->getResponse()->isSuccessful());
        $this->assertEquals(1, $crawler->filter('table thead th:contains("Company")')->count());
        $this->assertEquals(1, $crawler->filter('table tbody tr:contains("Liip AG")')->count());
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
        $crawler = $client->request('GET', '/get-started');
        $this->assertTrue($client->getResponse()->isSuccessful());
        $crawler = $client->click($crawler->selectLink('Symfony2 CMF')->link());
        $this->assertCount(1, $crawler->filter(sprintf('h2:contains("%s")', 'The Symfony CMF Project')));
    }

    public function testOnlyCurrentNavItemIsCurrent()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/get-involved');
        $this->assertTrue($client->getResponse()->isSuccessful());
        $this->assertEquals(1, $crawler->filter('#nav li.current a:contains("Get Involved")')->count());
        $this->assertEquals(0, $crawler->filter('#nav li.current a:contains("Home")')->count());
        $this->assertEquals(0, $crawler->filter('#nav li.current a:contains("About")')->count());
    }

    public function testRssFeed()
    {
        $client = $this->createClient();
        $client->request('GET', '/news.rss');
        $this->assertTrue($client->getResponse()->isSuccessful());
    }
}
