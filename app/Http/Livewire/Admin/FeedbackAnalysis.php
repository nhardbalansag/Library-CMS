<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class FeedbackAnalysis extends Component
{
    public function render()
    {
        //books
        $data['books_total'] = DB::table('books')->count();
        $data['books_pending'] = DB::table('books')->where('status', 'pending')->count();
        $data['books_pending_percent'] = $data['books_pending'] ? ($data['books_pending'] / $data['books_total']) * 100 : 0;

        $data['books_publish'] = DB::table('books')->where('status', 'publish')->count();
        $data['books_publish_percent'] = $data['books_publish'] ? ($data['books_publish'] / $data['books_total']) * 100 : 0;

        $data['books_available'] = DB::table('books')->where('book_inventory_count','>', '0')->count();
        $data['books_available_percent'] = $data['books_available'] ? ($data['books_available'] / $data['books_total']) * 100 : 0;

        // user
        $data['user_total'] = DB::table('users')->count();
        $data['user_notVerified'] = DB::table('users')->where('status', 'not_verified')->count();
        $data['user_notVerified_pecent'] = $data['user_notVerified'] ? ($data['user_notVerified'] / $data['user_total']) * 100 : 0;

        $data['user_verified'] = DB::table('users')->where('status', 'verified')->count();
        $data['user_verified_percent'] = $data['user_verified'] ? ($data['user_verified'] / $data['user_total']) * 100 : 0;

        $data['user_decline'] = DB::table('users')->where('status', 'decline')->count();
        $data['user_decline_percent'] = $data['user_decline'] ? ($data['user_decline'] / $data['user_total']) * 100 : 0;


         // borrowing
         $data['borrowing_total'] = DB::table('borrow_books')->count();

         $data['borrowing_approved'] = DB::table('borrow_books')->where('status', 'approve')->count();
         $data['borrowing_approved_pecent'] = $data['user_notVerified'] ? ($data['user_notVerified'] / $data['user_total']) * 100 : 0;

         $data['borrowing_decline'] = DB::table('borrow_books')->where('status', 'decline')->count();
         $data['user_verified_percent'] = $data['user_verified'] ? ($data['user_verified'] / $data['user_total']) * 100 : 0;

         $data['borrowing_pending'] = DB::table('borrow_books')->where('status', 'pending')->count();
         $data['borrowing_pending_percent'] = $data['borrowing_pending'] ? ($data['borrowing_pending'] / $data['user_total']) * 100 : 0;

         $data['borrowing_return'] = DB::table('borrow_books')->where('status', 'return')->count();
         $data['borrowing_return_percent'] = $data['borrowing_return'] ? ($data['borrowing_return'] / $data['user_total']) * 100 : 0;

        return view('livewire.admin.feedback-analysis', $data);
    }
}
