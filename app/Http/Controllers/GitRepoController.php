<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\Models\HostedRepository;

class GitRepoController extends Controller
{
    public function index()
    {
        $repositories = auth()->user()->repositories()->latest()->get();
        return view('dashboard', compact('repositories'));
    }

    public function submitRepo(Request $request)
    {
        $request->validate([
            'repo_url' => 'required|url|regex:/^https:\/\/github\.com\/[a-zA-Z0-9-_]+\/[a-zA-Z0-9-_]+(\.git)?$/',
        ]);

        $repoUrl = $request->input('repo_url');
        $repoName = basename($repoUrl, '.git');
        $uniqueId = uniqid();
        $repoPath = storage_path('app/repos/' . $uniqueId . '_' . $repoName);

        // Create repos directory if it doesn't exist
        if (!file_exists(storage_path('app/repos'))) {
            mkdir(storage_path('app/repos'), 0755, true);
        }

        // Clone the repository
        $process = new Process(['git', 'clone', $repoUrl, $repoPath]);
        $process->setTimeout(300); // 5 minute timeout
        $process->run();

        if (!$process->isSuccessful()) {
            return back()->withErrors(['error' => 'Failed to clone repository']);
        }

        // Sanitize the repository
        $this->sanitizeRepository($repoPath);

        // Save repository info to database
        $repository = new HostedRepository([
            'user_id' => auth()->id(),
            'name' => $repoName,
            'unique_id' => $uniqueId,
            'path' => $repoPath,
            'original_url' => $repoUrl
        ]);
        $repository->save();

        return redirect()->route('dashboard')->with('success', 'Repository hosted successfully!');
    }

    public function deleteRepo($id)
    {
        $repository = HostedRepository::findOrFail($id);
        
        // Verify ownership
        if ($repository->user_id !== auth()->id()) {
            abort(403);
        }

        // Delete repository files
        Storage::deleteDirectory('repos/' . basename($repository->path));

        // Delete database record
        $repository->delete();

        return redirect()->route('dashboard')->with('success', 'Repository deleted successfully');
    }

    public function serveRepo($uniqueId, $repoName)
    {
        $repository = HostedRepository::where('unique_id', $uniqueId)
            ->where('name', $repoName)
            ->firstOrFail();

        $indexFile = $repository->path . '/index.html';
        
        if (file_exists($indexFile)) {
            return response()->file($indexFile);
        }

        // If no index.html, try to find other HTML files
        $htmlFiles = glob($repository->path . '/*.html');
        if (!empty($htmlFiles)) {
            return response()->file($htmlFiles[0]);
        }

        // If no HTML files found, show directory listing
        $files = scandir($repository->path);
        $files = array_diff($files, ['.', '..']);
        
        return view('repo-listing', [
            'files' => $files,
            'repository' => $repository
        ]);
    }

    private function sanitizeRepository($path)
    {
        // Remove .git directory
        $gitDir = $path . '/.git';
        if (is_dir($gitDir)) {
            $process = new Process(['rm', '-rf', $gitDir]);
            $process->run();
        }

        // Remove any executable files
        $process = new Process(['find', $path, '-type', 'f', '-exec', 'chmod', '-x', '{}', '+']);
        $process->run();

        // Remove any potentially dangerous files
        $dangerousFiles = [
            '.htaccess',
            '.env',
            'composer.json',
            'package.json',
            '*.php',
            '*.sh',
            '*.py',
            '*.rb',
            '*.exe',
            '*.dll'
        ];
        
        foreach ($dangerousFiles as $pattern) {
            $process = new Process(['find', $path, '-name', $pattern, '-delete']);
            $process->run();
        }
    }
}
