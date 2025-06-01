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
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Post::with('user')
                ->select('posts.*', 'users.name as author_name')
                ->join('users', 'posts.user_id', '=', 'users.id');

            // Apply custom search
            if ($request->has('search') && $request->search['value']) {
                $search = $request->search['value'];
                $query = $query->where(function ($query) use ($search) {
                    $query->where('posts.title', 'LIKE', "%{$search}%")
                        ->orWhere('posts.content', 'LIKE', "%{$search}%")
                        ->orWhere('users.name', 'LIKE', "%{$search}%");
                });
                $request->merge(['search' => ['value' => '']]);
            }

            if (empty($request->order)) {
                $query = $query->orderBy('posts.created_at', 'desc');
            }

            return DataTables::of($query)
                ->editColumn('published_at', function ($post) {
                    return $post->published_at ? $post->published_at->format('d M Y H:i') : '-';
                })
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

    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

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

    public function destroy(Post $post)
    {
        try {
            $post->delete();

            return $this->getSuccessResponse(
                'Post deleted successfully',
            );
        } catch (\Exception $e) {
            return $this->getExceptionResponse($e, 'Post Deletion Error');
        }
    }
}
