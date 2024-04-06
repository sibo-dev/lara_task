<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IssueController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        // $request = Http::get('https://api.github.com/repos/sibo-dev/lara_task/issues');
        // $issues = $request->json();
        // // Save the issues to an array and return it
        // $issueData = [];
        // foreach ($issues as $issue) {
        //     $issueData[] = [
        //         'number' => $issue['number'],
        //         'title' => $issue['title'],
        //         'body' => $issue['body'],
        //         'closed_at' => $issue['closed_at'],
        //     ];
        // }
        // return($issueData);
    }

    public function issues(){
        // Fetch all issues from the database
        $request = Http::get('https://api.github.com/repos/sibo-dev/lara_task/issues');
        $issueData = $request->json();
        // Save the issues to an array and return it
        $issues = [];
        foreach ($issueData as $issue) {
            $issues[] = [
                'number' => $issue['number'],
                'title' => $issue['title'],
                'body' => $issue['body'],
                'closed_at' => $issue['closed_at'],
            ];
        }
        return view('report', compact('issues'));
    }
}
