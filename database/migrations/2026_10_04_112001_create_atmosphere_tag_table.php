<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('atmosphere_tag', function (Blueprint $table) {
            $table->id();

            $table->foreignId('atmosphere_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('tag_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->unique([
                'atmosphere_id',
                'tag_id'
            ]);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('atmosphere_tag');
    }
};