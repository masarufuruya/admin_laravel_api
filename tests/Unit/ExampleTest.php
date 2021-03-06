<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $user = new \App\AdminUser;
        $user->name = "山田";
        $user->email = "yamada@test.com";
        $user->password = \Hash::make('password');
        $user->save();

        $readUser = \App\User::where('name', '山田')->first();
        $this->assertNotNull($readUser);            // データが取得できたかテスト
        $this->assertTrue(\Hash::check('password', $readUser->password)); // パスワードが一致しているかテスト

        \App\AdminUser::where('email', 'yamada@test.com')->delete(); // テストデータの削除
    }
}
