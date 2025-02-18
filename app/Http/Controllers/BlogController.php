<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Blog::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn  = '<a href="' . route('blogs.show', $row->id) . '" class="btn btn-info btn-sm">View</a>';
                    $btn .= ' <a href="' . route('blogs.edit', $row->id) . '" class="btn btn-primary btn-sm">Edit</a>';
                    $btn .= ' <form action="' . route('blogs.destroy', $row->id) . '" method="POST" style="display:inline-block;">';
                    $btn .= csrf_field();
                    $btn .= method_field('DELETE');
                    $btn .= ' <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure you want to delete this blog?\')">Delete</button>';
                    $btn .= '</form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('blogs.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */

        public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title'   => 'required|string|max:255',
            'author'  => 'nullable|string|max:255',
            'summary' => 'nullable|string',
            'category'=> 'nullable|string',
            'content' => 'required|string',
            'tags'    => 'nullable|string',
        ]);

        // Create the blog post using mass assignment
        Blog::create($validatedData);

        // Redirect to a desired route with a success message
        return redirect()->route('blogs.index')
            ->with('success', 'Blog post created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('blogs.view', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'title'    => 'required|string|max:255',
            'author'   => 'nullable|string|max:255',
            'summary'  => 'nullable|string',
            'category' => 'nullable|string',
            'content'  => 'required|string',
            'tags'     => 'nullable|string',
        ]);

        // Update the blog post using mass assignment
        $blog->update($validatedData);

        // Redirect back to the blog list (or show page) with a success message
        return redirect()->route('blogs.index')
            ->with('success', 'Blog post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blogs.index')
            ->with('success', 'Blog post deleted successfully!');
    }
}
