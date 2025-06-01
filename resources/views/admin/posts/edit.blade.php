@extends('layouts.admin')

@section('title', 'Edit Post')

@section('breadcrumb')
    <nav class="flex justify-between items-center" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('admin.dashboard') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                    <i class="fas fa-home text-base align-middle"></i>
                    <span class="ml-2">Dashboard</span>
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <i class="fas fa-chevron-right text-base text-gray-400 mx-2 align-middle"></i>
                    <a href="{{ route('admin.posts.index') }}"
                        class="text-sm font-medium text-gray-700 hover:text-blue-600 ml-2">Posts</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <i class="fas fa-chevron-right text-base text-gray-400 mx-2 align-middle"></i>
                    <span class="text-sm font-medium text-gray-500 ml-2">Edit Post</span>
                </div>
            </li>
        </ol>
        <a href="{{ route('admin.posts.index') }}"
            class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 hover:text-blue-600">
            <i class="fas fa-arrow-left text-base align-middle mr-2"></i>
            Back
        </a>
    </nav>
@endsection

@section('content')
    <div class="p-6 bg-white rounded-lg shadow">
        <h2 class="text-2xl font-bold mb-4">Edit Post</h2>
        <p class="text-gray-600 mb-6">Update the post details below</p>

        <!-- Post Edit Form -->
        <form id="editPostForm" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                    Title
                </label>
                <input type="text" id="title" name="title" value="{{ $post->title }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                    placeholder="Enter post title">
                <p class="mt-1 text-sm text-red-600 title-error invalid-feedback pl-1"></p>
            </div>

            <div>
                <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                    Content
                </label>
                <textarea id="content" name="content" rows="6"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                    placeholder="Enter post content">{{ $post->content }}</textarea>
                <p class="mt-1 text-sm text-red-600 content-error invalid-feedback pl-1"></p>
            </div>

            <div>
                <label for="published_at" class="block text-sm font-medium text-gray-700 mb-2">
                    Publication Date (Optional)
                </label>
                <input type="datetime-local" id="published_at" name="published_at"
                    value="{{ $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '' }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                <p class="mt-1 text-sm text-red-600 published_at-error invalid-feedback pl-1"></p>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 transform hover:scale-[1.01] disabled:opacity-50 disabled:cursor-not-allowed">
                <span class="flex items-center justify-center">
                    <img src="{{ asset('assets/icons/spinner.svg') }}" class="animate-spin -ml-1 mr-3 h-5 w-5 hidden"
                        id="loading-spinner" alt="Loading">
                    <span id="button-text">Update Post</span>
                </span>
            </button>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#editPostForm').on('submit', function(e) {
                e.preventDefault();

                const button = $(this).find('button[type="submit"]');
                const spinner = $('#loading-spinner');
                const buttonText = $('#button-text');

                $.ajax({
                    url: '{{ route('admin.posts.update', $post) }}',
                    type: 'POST',
                    data: $(this).serialize(),
                    beforeSend: function() {
                        // Show loading state
                        button.prop('disabled', true);
                        spinner.removeClass('hidden');
                        buttonText.text('Updating...');
                    },
                    success: function(response) {
                        showResponse.show(response);
                    },
                    error: function(xhr) {
                        // default ajax-core.js
                    }
                }).always(function() {
                    // Reset button state
                    button.prop('disabled', false);
                    spinner.addClass('hidden');
                    buttonText.text('Update Post');
                });
            });
        });
    </script>
@endpush
