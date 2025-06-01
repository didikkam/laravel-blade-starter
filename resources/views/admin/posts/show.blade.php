@extends('layouts.admin')

@section('title', 'View Post')

@section('breadcrumb')
    <nav class="flex justify-between items-center" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                    <i class="fas fa-home text-base align-middle"></i>
                    <span class="ml-2">Dashboard</span>
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <i class="fas fa-chevron-right text-base text-gray-400 mx-2 align-middle"></i>
                    <a href="{{ route('admin.posts.index') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600 ml-2">Posts</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <i class="fas fa-chevron-right text-base text-gray-400 mx-2 align-middle"></i>
                    <span class="text-sm font-medium text-gray-500 ml-2">View Post</span>
                </div>
            </li>
        </ol>
        <a href="{{ route('admin.posts.index') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 hover:text-blue-600">
            <i class="fas fa-arrow-left text-base align-middle mr-2"></i>
            Back
        </a>
    </nav>
@endsection

@section('content')
<div class="space-y-6">
    <!-- Post Details Card -->
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="px-6 py-5">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h3 class="text-xl font-semibold text-gray-900">Post Details</h3>
                    <div class="mt-2">
                        <span class="inline-flex px-2.5 py-1 rounded-full text-xs font-medium {{ $post->published_at ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                            {{ $post->published_at ? 'Published' : 'Draft' }}
                        </span>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.posts.edit', $post) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <i class="fas fa-edit w-4 h-4 mr-2"></i>
                        Edit Post
                    </a>
                </div>
            </div>

            <!-- Details List -->
            <div class="border-t border-gray-200 mt-6">
                <dl class="divide-y divide-gray-200">
                    <div class="py-4 grid grid-cols-3 gap-4">
                        <dt class="text-sm font-medium text-gray-500">Title</dt>
                        <dd class="text-sm text-gray-900 col-span-2">{{ $post->title }}</dd>
                    </div>
                    <div class="py-4 grid grid-cols-3 gap-4">
                        <dt class="text-sm font-medium text-gray-500">Author</dt>
                        <dd class="text-sm text-gray-900 col-span-2">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-8 w-8">
                                    <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode($post->user->name) }}&background=3b82f6&color=fff" alt="{{ $post->user->name }}">
                                </div>
                                <div class="ml-3">
                                    <div class="text-sm font-medium text-gray-900">{{ $post->user->name }}</div>
                                </div>
                            </div>
                        </dd>
                    </div>
                    <div class="py-4 grid grid-cols-3 gap-4">
                        <dt class="text-sm font-medium text-gray-500">Published Date</dt>
                        <dd class="text-sm text-gray-900 col-span-2">
                            {{ $post->published_at ? $post->published_at->format('d M Y H:i') : 'Not published' }}
                        </dd>
                    </div>
                    <div class="py-4 grid grid-cols-3 gap-4">
                        <dt class="text-sm font-medium text-gray-500">Created At</dt>
                        <dd class="text-sm text-gray-900 col-span-2">
                            {{ $post->created_at->format('d M Y H:i') }}
                        </dd>
                    </div>
                    <div class="py-4 grid grid-cols-3 gap-4">
                        <dt class="text-sm font-medium text-gray-500">Last Updated</dt>
                        <dd class="text-sm text-gray-900 col-span-2">
                            {{ $post->updated_at->format('d M Y H:i') }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>

    <!-- Post Content Card -->
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="px-6 py-5">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Content</h3>
            <div class="prose max-w-none">
                {!! nl2br(e($post->content)) !!}
            </div>
        </div>
    </div>
</div>

@endsection 