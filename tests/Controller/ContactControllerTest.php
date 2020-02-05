<?php


namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactControllerTest extends WebTestCase
{
    public function testSendValidContactForm(): void
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/contact');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1','Contact Us');

        $form = $crawler->selectButton('Send')->form();

        $client->submit($form, [
            'contact_message[sender]' => 'max.mustermann@test.com',
            'contact_message[subject]' => 'Some Subject',
            'contact_message[content]' => 'Just testing...'
        ]);

        $this->assertEmailCount(1);
        $this->assertResponseRedirects('/shows');
        $client->followRedirect();
        $this->assertSelectorTextContains('div.alert-success','Thanks');
    }

    public function testSendNonValidContactForm()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/contact');

        $form = $crawler->selectButton('Send')->form();

        $client->submit($form, [
            'contact_message[sender]' => 'test',
            'contact_message[subject]' => 'Some Subject',
            'contact_message[content]' => 'Just testing...'
        ]);

        $this->assertEmailCount(0);
        $this->assertResponseStatusCodeSame(200);

        $this->assertSelectorTextContains('div#contact_message div:nth-child(1) li', 'This value is not a valid email address.');
    }
}
