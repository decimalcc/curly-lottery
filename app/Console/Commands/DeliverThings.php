<?php

namespace App\Console\Commands;

use App\Models\ThingUser;
use App\Repositories\ThingUserRepository;
use Illuminate\Console\Command;

class DeliverThings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deliver:things';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deliver things prizes';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @param ThingUserRepository $thingUserRepository
     * @return int
     */
    public function handle(ThingUserRepository $thingUserRepository)
    {
        // Delivery thing stub
        $things = $thingUserRepository->getThingsByStatus(ThingUser::STATUS_UNDELIVERED, 20);

        foreach ($things as $thing) {
            $thing->status = ThingUser::STATUS_DELIVERED;
            $thing->save();
        }

        return 0;
    }
}
