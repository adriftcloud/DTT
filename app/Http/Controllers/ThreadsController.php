<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only('store');
    }


    public function index()
    {
        $threads = Thread::query()->latest()->get();

        return view('threads.index', compact('threads'));
    }


    public function create()
    {
        //
    }


    /**
     * @param Request $request
     * @return string
     */
    public function store(Request $request)
    {
        $thread = Thread::create([
            "user_id" => auth()->id(),
            "title" => request('title'),
            "body" => request('body'),
        ]);

        return $thread->path();
    }


    public function show(Thread $thread)
    {
        return view('threads.show', compact('thread'));
    }


    public function edit(Thread $thread)
    {
        //
    }


    public function update(Request $request, Thread $thread)
    {
        //
    }


    public function destroy(Thread $thread)
    {
        //
    }


}
