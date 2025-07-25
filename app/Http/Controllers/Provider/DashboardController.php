<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jobs = Job::where('user_id', auth()->id())
                   ->orderBy('created_at', 'desc')
                   ->paginate(10);

        $stats = [
            'total_jobs' => Job::where('user_id', auth()->id())->count(),
            'active_jobs' => Job::where('user_id', auth()->id())->where('status', 'active')->count(),
            'completed_jobs' => Job::where('user_id', auth()->id())->where('status', 'completed')->count(),
        ];

        return view('provider.dashboard', compact('jobs', 'stats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'category' => 'required|in:fulltime,parttime,contract,internship,freelance',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'salary' => 'nullable|numeric|min:0'
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id();

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('job-covers', 'public');
        }

        Job::create($data);

        return redirect()->route('provider.dashboard')->with('success', 'Lowongan kerja berhasil ditambahkan!');
    }

    public function destroy(Job $job)
    {
        if ($job->user_id !== auth()->id()) {
            abort(403);
        }

        if ($job->cover_image && \Storage::disk('public')->exists($job->cover_image)) {
            \Storage::disk('public')->delete($job->cover_image);
        }

        $job->delete();

        return redirect()->route('provider.dashboard')->with('success', 'Lowongan kerja berhasil dihapus!');
    }

    public function toggleStatus(Job $job)
    {
        if ($job->user_id !== auth()->id()) {
            abort(403);
        }

        $job->update([
            'status' => $job->status === 'active' ? 'inactive' : 'active'
        ]);

        return response()->json(['success' => true, 'status' => $job->status]);
    }
}