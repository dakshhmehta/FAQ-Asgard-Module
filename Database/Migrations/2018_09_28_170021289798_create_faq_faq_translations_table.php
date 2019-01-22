<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaqFaqTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faq__faq_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('faq_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['faq_id', 'locale']);
            $table->foreign('faq_id')->references('id')->on('faq__faqs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('faq__faq_translations', function (Blueprint $table) {
            $table->dropForeign(['faq_id']);
        });
        Schema::dropIfExists('faq__faq_translations');
    }
}
