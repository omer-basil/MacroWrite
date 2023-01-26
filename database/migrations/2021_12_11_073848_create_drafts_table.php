<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDraftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drafts', function (Blueprint $table) {
            $table->id();
            $table->longText('body');
            $table->string('title')->nullable();
            $table->string('abstract')->nullable();
            $table->string('uid');
            $table->string('readTime')->nullable();;
            $table->enum('visibility', ['public', 'private', 'draft'])->default('draft');

            $table->boolean('processed')->default(false);
            $table->boolean('allow-likes')->default(false);
            $table->boolean('allow-comments')->default(false);

            $table->unsignedBigInteger('magazine_id');
            $table->foreign('magazine_id')->references('id')->on('magazines')->constrained()->onDelete('cascade');

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
        Schema::dropIfExists('drafts');
    }
}
