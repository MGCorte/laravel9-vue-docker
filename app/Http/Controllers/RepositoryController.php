<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
 
use App\Models\Repository;

use Illuminate\Http\Request;

class RepositoryController extends Controller
{
    public function index() {
        $repositories = Repository::all()->toArray();
        return array_reverse($repositories);
    }

    public function store(Request $request) {
        $repository = new Repository([
            'repository_id' => $request->input('id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'avatar_url' => $request->input('owner.avatar_url'),
            'full_name' => $request->input('full_name'),
            'stargazers_count' => $request->input('stargazers_count'),
            'html_url' => $request->input('html_url'),
            'homepage' => $request->input('homepage'),
            'language' => $request->input('language'),
            'topics' => json_encode($request->input('topics')),
            'created_at' => $request->input('created_at'),
            'updated_at' => $request->input('updated_at'),
        ]);
        $repository->save();
 
        return response()->json('The repository successfully added');
    }

    public function show(Request $request, $id) {
        $repository = Repository::find($id);
        return response()->json($repository);
    }

    public function showgit(Request $request, $id) {
        $repository = Repository::where('repository_id', $id)->get();
        return response()->json($repository);
    }
 
    // delete post
    public function delete($id)
    {
        $repository = Repository::find($id);
        $repository->delete();
 
        return response()->json('The repository successfully deleted');
    }
}
