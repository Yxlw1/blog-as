<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('extract')->nullable();
            $table->longText('body')->nullable();
            $table->enum('status', [1, 2])->default(1);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });

        // Crear un trigger para borrar en la tabla "post_tag"
        DB::unprepared('
            CREATE TRIGGER posts_before_delete
            BEFORE DELETE ON posts
            FOR EACH ROW
            BEGIN
                DELETE FROM post_tag WHERE post_id = OLD.id;
                DELETE FROM images WHERE imageable_id = OLD.id;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
