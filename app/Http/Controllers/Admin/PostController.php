<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Yajra\DataTables\Facades\DataTables;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $posts = Post::with('user')->select('posts.*');
            
            return DataTables::of($posts)
                ->addColumn('author', function ($post) {
                    return $post->user->name;
                })
                ->addColumn('action', function ($post) {
                    return view('admin.posts.partials.action-buttons', compact('post'));
                })
                ->editColumn('published_at', function ($post) {
                    return $post->published_at ? $post->published_at->format('d M Y H:i') : '-';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.posts.index');
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|max:255',
                'content' => 'required',
                'published_at' => 'nullable|date'
            ]);

            $validated['user_id'] = auth()->id();
            
            Post::create($validated);

            return $this->getSuccessResponse(
                'Post created successfully',
                null,
                route('admin.posts.index')
            );
        } catch (\Exception $e) {
            return $this->getExceptionResponse($e, 'Post Creation Error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|max:255',
                'content' => 'required',
                'published_at' => 'nullable|date'
            ]);
            
            $post->update($validated);

            return $this->getSuccessResponse(
                'Post updated successfully',
                null,
                route('admin.posts.index')
            );
        } catch (\Exception $e) {
            return $this->getExceptionResponse($e, 'Post Update Error');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post deleted successfully.');
    }
} 