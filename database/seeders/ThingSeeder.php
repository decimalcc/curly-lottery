<?php

namespace Database\Seeders;

use App\Models\Thing;
use Illuminate\Database\Seeder;

class ThingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->iphone();
        $this->macBook();
    }

    /**
     * iPhone prise
     */
    public function iphone()
    {
        $iphoneThing = new Thing();
        $iphoneThing->name = 'iPhone 12';
        $iphoneThing->amount = 10;
        $iphoneThing->price = 30000;
        $iphoneThing->save();
    }

    public function macBook() {
        $macBookThing = new Thing();
        $macBookThing->name = 'MacBook Pro';
        $macBookThing->amount = 4;
        $macBookThing->price = 100000;
        $macBookThing->save();
    }
}
