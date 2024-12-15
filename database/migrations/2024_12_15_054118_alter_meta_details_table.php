<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('meta_details', function (Blueprint $table) {
            $table->dropForeign(['blog_id']);
            $table->dropColumn('blog_id');

            // $table->text('commentable_type'); // blog, article
            // $table->integer('commentable_id'); // blog_id, article_id

            $table->morphs('meta');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
            Schema::table('meta_details', function (Blueprint $table) {
                $table->foreignId('blog_id')->nullable()->constrained('blogs')->after('id');

                // $table->dropColumn(['commentable_type','commentable_id']);

                $table->dropMorphs('meta');
            });
    }
};
