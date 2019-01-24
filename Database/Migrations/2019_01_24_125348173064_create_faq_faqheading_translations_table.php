<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaqFaqHeadingTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faq__faqheading_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('faqheading_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['faqheading_id', 'locale']);
            $table->foreign('faqheading_id')->references('id')->on('faq__faqheadings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('faq__faqheading_translations', function (Blueprint $table) {
            $table->dropForeign(['faqheading_id']);
        });
        Schema::dropIfExists('faq__faqheading_translations');
    }
}
