<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class GenerateQr extends Component
{
    public $StudentId;


    public function render()
    {

        $data['studentInfo'] = DB::table('users')->where('id', $this->StudentId)->first();

        $affected = DB::table('users')
                    ->where('id', $this->StudentId)
                    ->update(['status' => "verified"]);

        return view('livewire.admin.generate-qr', $data);
    }
}
