<?php

namespace App\Http\Controllers;

use App\Models\Command;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommandController extends Controller
{
    // create command
    public function store(Request $req): RedirectResponse
    {
        $formFields = $req->validate([
            'content' => ['string', 'min:3'],
            'blog_id' => ['integer']
        ]);

        $formFields['user_id'] = auth()->id();

        Command::create($formFields);

        return back()->with('message', 'Successfully created new command.');
    }

    public function update(Request $req, Command $command): RedirectResponse
    {
        $formFields = $req->validate([
            'content' => ['string', 'min:3'],
        ]);

        $command->update($formFields);

        return back()->with('message', 'Successfully update the command.');
    }

    public function destroy(Command $command): RedirectResponse
    {
        $command->delete();

        return back()->with('message', 'Successfully delete the command.');
    }
}
