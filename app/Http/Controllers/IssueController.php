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
        
    }

    public function index(){
        // Fetch all issues from the database
        $request = Http::get('https://api.github.com/repos/sibo-dev/lara_task/issues?state=all');
        $issueData = $request->json();
        // Save the issues to an array and return it
        $issues = [];
        foreach ($issueData as $issue) {
            $issues[] = [
                'state' => $issue['state'],
                'number' => $issue['number'],
                'title' => $issue['title'],
                'body' => $issue['body'],
                'closed_at' => $issue['closed_at'] ?? null,
                'url' => $issue['html_url'],
                'created_at' => $issue['created_at'],
                'assignee' => $issue['assignee']['login'] ?? 'Unassigned',
            ];
        }
        return view('report', compact('issues'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
} 
