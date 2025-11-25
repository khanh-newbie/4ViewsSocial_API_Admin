<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseApi;
use App\Models\Post;
use App\Models\User;
use App\Models\ViolenceWarning;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $response;

    public function __construct()
    {
        $this->response = new ResponseApi();
    }

    /**
     * Lấy thống kê cho dashboard
     */
    public function stats(Request $request) 
    {
        $totalUsers = User::count();
        $onlineUsers = User::where('online_status', 1)->count();
        $totalPosts = Post::count();
        $totalViolenceWarnings = ViolenceWarning::count();
        
        $data = [
            'total_users' => $totalUsers,
            'online_users' => $onlineUsers,
            'total_posts' => $totalPosts,
            'totalViolenceWarnings' => $totalViolenceWarnings,
        ];
        return $this->response->success($data);
    }
}
