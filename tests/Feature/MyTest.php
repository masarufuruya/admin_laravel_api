<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = new \App\AdminUser;
        $user->name = "山田";
        $user->email = "yamada@test.com";
        $user->password = \Hash::make('password');
        $user->save();

        $readUser = \App\AdminUser::where('name', '山田')->first();
        $this->assertNotNull($readUser);            // データが取得できたかテスト
        $this->assertTrue(\Hash::check('password', $readUser->password)); // パスワードが一致しているかテスト

        \App\AdminUser::where('email', 'yamada@test.com')->delete(); // テストデータの削除
    }
}
