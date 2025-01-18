<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-medium mb-4">Host a New Repository</h3>
                    
                    <form action="/submit-repo" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="repo_url" class="block text-sm font-medium text-gray-700">
                                GitHub Repository URL
                            </label>
                            <div class="mt-1">
                                <input type="url" name="repo_url" id="repo_url" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                    placeholder="https://github.com/username/repository">
                            </div>
                            <p class="mt-2 text-sm text-gray-500">
                                Enter the full URL of your public GitHub repository
                            </p>
                        </div>

                        <div>
                            <button type="submit" 
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Host Repository
                            </button>
                        </div>
                    </form>

                    @if($repositories->count() > 0)
                        <div class="mt-8">
                            <h3 class="text-lg font-medium mb-4">Your Hosted Repositories</h3>
                            <div class="space-y-4">
                                @foreach($repositories as $repo)
                                    <div class="p-4 border rounded-lg">
                                        <div class="flex justify-between items-center">
                                            <div>
                                                <p class="font-medium">{{ $repo->name }}</p>
                                                <p class="text-sm text-gray-500">
                                                    Hosted at: <a href="/repo/{{ $repo->unique_id }}/{{ $repo->name }}" 
                                                        class="text-indigo-600 hover:text-indigo-500" target="_blank">
                                                        /repo/{{ $repo->unique_id }}/{{ $repo->name }}
                                                    </a>
                                                </p>
                                            </div>
                                            <div>
                                                <form action="/delete-repo/{{ $repo->id }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                        class="text-red-600 hover:text-red-500 text-sm">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="mt-8 text-center text-gray-500">
                            <p>You haven't hosted any repositories yet.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
