<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;
use App\User;
use App\Article;
class ExampleTest extends TestCase
{
   

    use RefreshDatabase;
    
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/');

        $response->assertStatus(200);
       
    }


 /** @test */

    public function only_loginn_can_add_article()
    {
 
        $response = $this->get('/creat')
        ->assertRedirect('/login');

      
       
    }
    


 /** @test */

 public function auth_user_can_reach_to_reach_form()
 {
    $this->withoutExceptionHandling();
    $user = factory(User::class)->create();
    $response = $this->actingAs($user);

    $response = $this->get('/creat')
    ->assertOk();
 }


  /** @test */

  public function auth_user_can_add_article()
  {
     $this->withoutExceptionHandling();
     $user = factory(User::class)->create();
     $response = $this->actingAs($user);
 
     $response = $this->post('/creat',$this->data())
     
     ->assertRedirect('/article');
  }

  /** @test */

  public function title_is_required()
  {
      
     $user = factory(User::class)->create();
     $response = $this->actingAs($user);
 
     $response = $this->post('/creat',array_merge($this->data(),['title'=>'']));
     $response->assertSessionHasErrors('title');
     $this->assertCount(0,Article::all());
  }


  /** @test */

  public function expert_is_required()
  {
      
     $user = factory(User::class)->create();
     $response = $this->actingAs($user);
 
     $response = $this->post('/creat',array_merge($this->data(),['expert'=>'']));
     $response->assertSessionHasErrors('expert');
     $this->assertCount(0,Article::all());
  }

    /** @test */

    public function body_is_required()
    {
        
       $user = factory(User::class)->create();
       $response = $this->actingAs($user);
   
       $response = $this->post('/creat',array_merge($this->data(),['body'=>'']));
       $response->assertSessionHasErrors('body');
       
       $this->assertCount(0,Article::all());
    }

   /** @test */
   public function a_can_delete()
   {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $response = $this->actingAs($user);
        $response = $this->post('/creat',$this->data());
        $this->assertCount(1,Article::all());
  
        $article=Article::first();
        $response=  $this->delete('/article/'.$article->id);
        $this->assertCount(0,Article::all());
        $response->assertRedirect('/article');
   }





     /** @test */
     public function a_can_update()
     {
      $this->withoutExceptionHandling();   
      $user = factory(User::class)->create();
      $response = $this->actingAs($user);
      $response = $this->post('/creat',$this->data());
      $this->assertCount(1,Article::all());

      $article=Article::first();

      $response=  $this->put('/article/'.$article->id,[
        'title'=>'new cool title',
        'expert'=>'expert',
        'body'=>'body',
         'article_id'=>1,
         'tag_id'=>1,
        
    
    ]);
          
      $this->assertEquals('new cool title',Article::first()->title);
   
      $response->assertRedirect('/article/'.$article->id);

     }




     

private function data(){
    $user = factory(User::class)->create();
  return  [
        'user_id'=>$user->user_id,
        'title'=>'title',
        'expert'=>'expert',
        'body'=>'body',
         'article_id'=>1,
         'tag_id'=>1,
  ];
}


}
