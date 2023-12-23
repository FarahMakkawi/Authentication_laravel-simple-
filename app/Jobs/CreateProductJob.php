<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateProductJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        User::create([
            'name'=>'new user',
            'email'=>'ner@gmail.com',
            'password'=>'123123123',
            'phone'=>'098765433',
        ]);
    }
}


// من اجل اللغات اول شيب  بكون معي كلمات ثابتة وتاني شي كلملت ديناميكية
// ديناميكي = قاعدة بيانات 
// ثابت هنن ملفات اللغة 