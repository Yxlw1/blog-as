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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });

        // Crear un trigger para borrar en la tabla "post_tag"
        DB::unprepared('
            CREATE TRIGGER tags_before_delete
            BEFORE DELETE ON posts
            FOR EACH ROW
            BEGIN
                DELETE FROM post_tag WHERE tag_id = OLD.id;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
