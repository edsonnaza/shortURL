<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Click;
use App\Url;


# app/tests/controllers/UrlControllerTest.php
class UrlControllerTest extends TestCase
{
    public function testIndex()
    {
        /* $this->client->request('GET', 'urls'); */
    /* Add tests */
        $this->withoutExceptionHandling();
        
        $urls=Url::all();
        $response=$this->get('/')
        ->assertStatus(200)
        ->assertViewIs('user.index')
        ->assertViewHas('urls',$urls);
        
    }

    public function testShow()
    {
        /* $this->client->request('GET', 'urls/2h312'); */
    /* Add tests */

        $url=Url::where('short_url','C2TDH')->first();
        $this->get('/urls/'.$url->short_url)
        ->assertStatus(200)
        ->assertSee($url->short_url)
        ->assertViewIs('user.show')
        ->assertViewHas('url',$url);
    }

    public function testVisit()
    {
        /* $this->client->request('GET', 'urls/2h312'); */
    /* Add tests */
        $this->withoutExceptionHandling();
        
        
        $this->followingRedirects()
        ->get('/urls/',['url' =>"http://abc.com.py"])
        ->assertStatus(200);
    }

    public function testCreate()
    {
        /* $this->client->request('POST', 'urls/'); */
    /* Add tests */
        $this->post('/urls/create',[
                'original_url'=>'https://hotmail.com',
            ])->assertStatus(302);

        $url=Url::where('original_url','https://hotmail.com')->first();
        $this->assertEquals('https://hotmail.com',$url->original_url);
    }
}
