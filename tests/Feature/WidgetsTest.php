<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Database;
use Tests\TestCase;

class WidgetsTest extends TestCase
{
    /**
     * WIDGETS GET
     *
     * @return void
     */
    public function testWidgets()
    {
        Database::fake();

        // TEST UNAUTHORIZED
        $response = $this->get('/widgets');
        $response->assertStatus(403);

        $response = $this->get('/widgets/1');
        $response->assertStatus(403);

        $response = $this->post('/widgets');
        $response->assertStatus(403);

        $response = $this->patch('/widgets/1');
        $response->assertStatus(403);

        $response = $this->delete('/widgets/1');
        $response->assertStatus(403);

        $response = $this->get('/widgets', ['Authorization' => 'Bearer zzz']);
        $response->assertStatus(403);

        // TEST AUTHORIZED
        $response = $this->get('/widgets', ['Authorization' => 'Bearer CORRECT-HORSE-BATTERY-STAPLE']);
        $response->assertStatus(200);
    }
}
