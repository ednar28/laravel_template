<?php

namespace Tests\Feature\Controller;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    /**
     * Test UserController@index. Should ordered by name ascending.
     */
    public function testIndexOrder(): void
    {
        [$notal, $ana] = User::factory()->count(2)->sequence(
            ['name' => 'Notail'],
            ['name' => 'Ana'],
        )->create();

        $url = route('dashboard.user.index');
        $this->get($url)->assertViewHas('users', fn (LengthAwarePaginator $users) =>
             $users[0]->id === $ana->id && $users[1]->id === $notal->id
        );
    }
}
