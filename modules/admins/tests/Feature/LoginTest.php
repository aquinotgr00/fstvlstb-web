<?php

namespace Modules\Admins\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Admins\Admin;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function get_login_page_should_return_ok_response()
    {
        $response = $this->get(route('admins.login'));

        $response->assertSuccessful();
    }

    /**
     * @test
     */
    public function get_login_route_should_render_login_view(): void
    {
        $response = $this->get(route('admins.login'));

        $response->assertViewIs('admins::login');
    }

    /**
     * @test
     */
    public function post_login_route_with_empty_data_should_return_redirect_back_response(): void
    {
        $this->get(route('admins.login'));
        $response = $this->post(route('admins.login'), []);

        $response->assertRedirect(route('admins.login'));
    }

    /**
     * @test
     */
    public function post_login_route_with_empty_data_should_return_response_with_validation_error(): void
    {
        $response = $this->post(route('admins.login'), []);

        $response->assertSessionHasErrors(['email', 'password']);
    }

    /**
     * test
     */
    public function post_login_route_with_unregistered_email_should_return_response_with_validation_error(): void
    {
        $response = $this->post(route('admins.login'), [
            'email' => 'guest@example.com',
            'password' => 'secret'
        ]);

        $response->assertSessionHasErrors(['email']);
    }

    /**
     * @test
     */
    public function post_login_route_with_invalid_password_should_return_redirect_response(): void
    {
        $admin = factory(Admin::class)->create(['password' => bcrypt('secret')]);

        $response = $this->post(route('admins.login'), [
            'email' => $admin->email,
            'password' => 'invalid'
        ]);

        $response->assertSessionHasErrors(['email']);
    }

    /**
     * @test
     */
    public function post_login_route_with_valid_data_should_authenticate_admin(): void
    {
        $password = 'secret';
        $admin = factory(Admin::class)->create(['password' => bcrypt($password)]);

        $this->post(route('admins.login'), [
            'email' => $admin->email,
            'password' => $password
        ]);

        $this->assertAuthenticatedAs($admin, 'admin');
    }


    /**
     * @test
     */
    public function post_login_route_with_valid_data_should_return_redirect_response(): void
    {
        $password = 'secret';
        $admin = factory(Admin::class)->create(['password' => bcrypt($password)]);

        $response = $this->post(route('admins.login'), [
            'email' => $admin->email,
            'password' => $password
        ]);

        $response->assertRedirect(route('admins.dashboard'));
    }

    /**
     * @test
     */
    public function post_logout_route_should_log_admin_out(): void
    {
        $this->actingAs(factory(Admin::class)->create(), 'admin')
             ->post(route('admins.logout'));

        $this->assertGuest();
    }

    /**
     * @test
     */
    public function should_bypass_login_page_if_already_authenticated(): void
    {
        $admin = factory(Admin::class)->create();

        $response = $this->actingAs($admin, 'admin')
            ->get(route('admins.login'));

        $response->assertRedirect(route('admins.dashboard'));
    }
}
