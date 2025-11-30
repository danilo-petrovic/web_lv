<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $u = Auth::user();
        $led = $u->ledProjects()->get();
        $member = $u->projects()->where('projects.user_id', '<>', $u->id)->get();
        return view('projects.index', compact('led', 'member'));
    }

    public function create()
    {
        $users = User::where('id', '<>', Auth::id())->get();
        return view('projects.create', compact('users'));
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'nullable',
            'start_date' => 'nullable',
            'end_date' => 'nullable',
            'members' => 'nullable|array'
        ]);

        $project = Project::create(array_merge($data, [
            'user_id' => Auth::id()
        ]));

        $project->users()->sync($data['members'] ?? []);
        return redirect()->route('projects.index');
    }

    public function show(Project $project)
    {
        $this->authView($project);
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $this->authView($project);
        $users = User::where('id', '<>', Auth::id())->get();
        return view('projects.edit', compact('project', 'users'));
    }

    public function update(Request $r, Project $project)
    {
        $u = Auth::user();

        if ($project->isOwner($u)) {
            $data = $r->validate([
                'name' => 'required',
                'description' => 'nullable',
                'price' => 'nullable',
                'start_date' => 'nullable',
                'end_date' => 'nullable',
                'obavljeni_poslovi' => 'nullable',
                'members' => 'nullable|array'
            ]);

            $project->update($data);
            $project->users()->sync($data['members'] ?? []);
        } else {
            $data = $r->validate([
                'obavljeni_poslovi' => 'nullable'
            ]);

            $project->update([
                'obavljeni_poslovi' => $data['obavljeni_poslovi']
            ]);
        }

        return redirect()->route('projects.show', $project);
    }

    public function destroy(Project $project)
    {
        if (!$project->isOwner(Auth::user())) {
            abort(403);
        }

        $project->delete();
        return redirect()->route('projects.index');
    }

    private function authView(Project $project)
    {
        $u = Auth::user();

        if (!$project->isOwner($u) && !$project->users->contains($u)) {
            abort(403);
        }
    }
}
