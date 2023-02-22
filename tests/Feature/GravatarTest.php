<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class GravatarTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_generate_gravatar_default_image_when_no_email_found_first_character_a()
    {
        $user = User::factory()->create([
            'name' => 'Andre',
            'email' => 'afakeemail@fakeemail.com',
        ]);

        $gravatarUrl = $user->getAvatar();
        $emailHash   = md5($user->email);

        $this->assertEquals(
            "https://www.gravatar.com/avatar/{$emailHash}?s=200&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-1.png",
            $gravatarUrl
        );

        // check if the image exist on the actual server
        $response = Http::get($user->getAvatar());

        // response success
        $this->assertTrue($response->successful());
    }
    /** @test */
    public function user_can_generate_gravatar_default_image_when_no_email_found_first_character_z()
    {
        $user = User::factory()->create([
            'name' => 'Andre',
            'email' => 'zfakeemail@fakeemail.com',
        ]);

        $gravatarUrl = $user->getAvatar();
        $emailHash   = md5($user->email);

        $this->assertEquals(
            "https://www.gravatar.com/avatar/{$emailHash}?s=200&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-26.png",
            $gravatarUrl
        );

        // check if the image exist on the actual server
        $response = Http::get($user->getAvatar());

        // response success
        $this->assertTrue($response->successful());
    }
    /** @test */
    public function user_can_generate_gravatar_default_image_when_no_email_found_first_character_0()
    {
        $user = User::factory()->create([
            'name' => 'Andre',
            'email' => '0fakeemail@fakeemail.com',
        ]);

        $gravatarUrl = $user->getAvatar();
        $emailHash   = md5($user->email);

        $this->assertEquals(
            "https://www.gravatar.com/avatar/{$emailHash}?s=200&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-27.png",
            $gravatarUrl
        );

        // check if the image exist on the actual server
        $response = Http::get($user->getAvatar());

        // response success
        $this->assertTrue($response->successful());
    }
    /** @test */
    public function user_can_generate_gravatar_default_image_when_no_email_found_first_character_9()
    {
        $user = User::factory()->create([
            'name' => 'Andre',
            'email' => '9fakeemail@fakeemail.com',
        ]);

        $gravatarUrl = $user->getAvatar();
        $emailHash   = md5($user->email);

        $this->assertEquals(
            "https://www.gravatar.com/avatar/{$emailHash}?s=200&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-36.png",
            $gravatarUrl
        );

        // check if the image exist on the actual server
        $response = Http::get($user->getAvatar());

        // response success
        $this->assertTrue($response->successful());
    }
}
