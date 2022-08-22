<?php

use App\Models\Post;
use App\Models\PostUserLike;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_user_likes', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('post_id');
            //$table->unsignedBigInteger('user_id');

            //idx
            //pul = post_user_likes
            $table->index('post_id','pul_post_idx');
            $table->index('user_id','pul_user_idx');
            //fk
            $table->foreignIdFor(Post::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();//pul = post_user_likes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_user_likes');
    }
};
