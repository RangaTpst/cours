<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

/**
* @Given I visit the path :path
*/
public function iVisitThePath($path)
{
$response = $this->get('/');
$this->assertEquals(200, $response->getStatusCode());
$this->content = $response->getContent();
}

/**
* @Then I should see the text :text
*/
public function iShouldSeeTheText($text)
{
$this->assertContains($text, $this->content);
}

/**
* @Given an article called :article exists
*/
public function anArticleCalledExists($article)
{
    $my_article = \App\Models\Article::create([
        'statusRéservation' => 'false',
        'numéroRef' => '654321',
        'nom' => $article,
        'condition' => 'neuf',
        'lieuPièce' => 'Entrepôt Fournisseur',
        'lieuService' => 'Entrepôt Fournisseur'
    ]); 
       //When user visit the article's URI
       $response = $this->get('/show/' . $my_article->id);
       //He can see the article's numéroRef
     $response->assertSee('654321');
} 
}

