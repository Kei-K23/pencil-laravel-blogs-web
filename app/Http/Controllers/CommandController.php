<?php

namespace App\Http\Controllers;

use App\Models\Command;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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

        if (Gate::allows('edit-command', $command)) {
            $command->update($formFields);
            return back()->with('message', 'Successfully update the command.');
        } else {
            return back()->with('message', 'Unauthorized!');
        }
    }

    public function destroy(Command $command): RedirectResponse
    {
        if (Gate::allows('destroy-command', $command)) {
            $command->delete();
            return back()->with('message', 'Successfully delete the command.');
        } else {
            return back()->with('message', 'Unauthorized!');
        }
    }
}
