<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactUsTable extends Migration {
    
    public function up () {
        Schema::create( 'contact_us', function ( Blueprint $table ) {
            $table->bigIncrements( 'id' );
            $table->string( 'name' );
            $table->string( 'email' );
            $table->string( 'company' )
                  ->nullable()
                  ->default( null );
            $table->string( 'phone_no' );
            $table->string( 'subject' );
            $table->text( 'message' );
            $table->timestamps();
        } );
    }
    
    public function down () {
        Schema::dropIfExists( 'contact_us' );
    }
}
