<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); //primary key. unique, autocrement
            $table->string('name', 100)->nullable();
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('payment_status', ['paid','unpaid'])->default('unpaid');
            $table->rememberToken();
            $table->timestamps();
        });

        $new = new User;
        $new->name = "rashed";
        $new->email = "rashed@email.com";
        $new->password = "password";
        $new->save();

        User::create([
            'name'=>'rashed2',
            'email'=>'rashed2@email.com',
            'password'=>'password'
        ]);




        //updated

        $new = User::find(1);
        $new->name = "rashed zaman";
        $new->save();



        //delete
        // $new = User::find(1)->delete();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
