<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::table('product', function (Blueprint $table) {
            // First backup existing data
            $table->json('product_image_new')->nullable()->after('product_image');
            
            // Copy data from old column to new column
            DB::statement('UPDATE product SET product_image_new = JSON_ARRAY(product_image) WHERE product_image IS NOT NULL');
            
            // Drop old column
            $table->dropColumn('product_image');
            
            // Rename new column to original name
            $table->renameColumn('product_image_new', 'product_image');
        });
    }

    public function down()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->string('product_image_old')->nullable()->after('product_image');
            DB::statement('UPDATE product SET product_image_old = JSON_UNQUOTE(JSON_EXTRACT(product_image, \'$[0]\')) WHERE product_image IS NOT NULL');
            $table->dropColumn('product_image');
            $table->renameColumn('product_image_old', 'product_image');
        });
    }
};
