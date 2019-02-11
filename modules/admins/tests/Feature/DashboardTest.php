<?php

namespace Modules\Admins\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Admins\Admin;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function admin_should_have_access()
    {
        $response = $this->actingAs(factory(Admin::class)->create(), 'admin')
            ->get(route('admins.dashboard'));

        $response->assertSuccessful();
    }

    /**
     * @test
     */
    public function non_admin_should_be_redirected_to_admin_login_page()
    {
        $response = $this->get(route('admins.dashboard'));

        $response->assertRedirect(route('admins.login'));
    }
}
