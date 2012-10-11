<?php

namespace Cmf;

use Midgard\CreatePHP\RestService;

class CreateJsTest extends WebTestCase
{
    public function testAddNews()
    {
        $client = $this->createClient();

        //prepare the POST request
        $partOfKey = '<http://purl.org/dc/terms/partOf>';
        $partOf = '</cms/simple/news>';

        $titleKey = '<http://purl.org/dc/terms/title>';
        $title = 'news title from testAddNews';

        $contentKey = '<http://rdfs.org/sioc/ns#content>';
        $content = 'some new content';

        $subjectKey = '@subject';
        $subject = '_:bnode47';

        $typeKey = '@type';
        $type = '<http://www.w3.org/2002/07/owl#Thing>';

        $client->request('POST', '/en/symfony-cmf/create/document/_:bnode47',
            array(
                $partOfKey => array($partOf),
                $titleKey => $title,
                $contentKey => $content,
                $subjectKey => $subject,
                $typeKey => $type
            ));

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        //get the created page and check if everything is contained in the page
        $crawler = $client->request('GET', '/news/news-title-from-testAddNews');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertCount(1, $crawler->filter(sprintf('h2:contains("%s")', $title)));
        $this->assertCount(1, $crawler->filter(sprintf('p:contains("%s")', $content)));
        $this->assertCount(1, $crawler->filter(sprintf('div.subtitle:contains("%s")', 'Date: ' . date('Y-m-d'))));
    }

    public function testUpdateNews()
    {
        $client = $this->createClient();

        //prepare the PUT request
        $titleKey = '<http://purl.org/dc/terms/title>';
        $title = 'updated title from testUpdateNews';

        $contentKey = '<http://rdfs.org/sioc/ns#content>';
        $content = 'some updated content';

        $subjectKey = '@subject';
        $subject = '</cms/simple/news/symfony-cmf-website-update>';

        $typeKey = '@type';
        $type = '<http://rdfs.org/sioc/ns#Post';

        $crawler = $client->request('PUT', '/en/symfony-cmf/create/document/cms/simple/news/symfony-cmf-website-update',
            array(
                $titleKey => $title,
                $contentKey => $content,
                $subjectKey => $subject,
                $typeKey => $type
                )
            );

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        //get the updated page and check if data has been updated
        $crawler = $client->request('GET', '/news/symfony-cmf-website-update');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertCount(1, $crawler->filter(sprintf('h2:contains("%s")', $title)));
        $this->assertCount(1, $crawler->filter(sprintf('p:contains("%s")', $content)));
    }


    public function testRestServiceWithPost()
    {
        //prepare the post request
        $partOfKey = '<http://purl.org/dc/terms/partOf>';
        $partOf = '</cms/simple/news>';

        $titleKey = '<http://purl.org/dc/terms/title>';
        $title = 'updated title from testRestService';

        $contentKey = '<http://rdfs.org/sioc/ns#content>';
        $content = 'updated content<br>';

        $subjectKey = '@subject';
        $subject = '</cms/simple/news/symfony-cmf-website-update>';

        $typeKey = '@type';
        $type = '<http://www.w3.org/2002/07/owl#Thing>';

        $request = array(
                $partOfKey => array($partOf),
                $titleKey => $title,
                $contentKey => $content,
                $subjectKey => $subject,
                $typeKey => array($type)
        );

        $restService = $this->getContainer()->get('symfony_cmf_create.rest.handler');

        $typeFactory = $this->getContainer()->get('symfony_cmf_create.rdf_type_factory');

        $classType = $typeFactory->getType('Cmf\\MainBundle\\Document\\NewsCollection');

        $result = $restService->run($request, $classType, null, RestService::HTTP_POST);

        $this->assertEquals($title, $result['<http://purl.org/dc/terms/title>']);
        $this->assertEquals($content, $result['<http://rdfs.org/sioc/ns#content>']);
    }
}
