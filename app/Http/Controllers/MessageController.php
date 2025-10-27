<?php
namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function index() {
        $message = Message::all();

        return view('messages.index', ['messages' => $message]);
    }

    public function home() {
        return view('home');
    }


    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        $message = new Message();
        $message->name = $request->get('name');
        $message->email = $request->get('email');
        $message->message = $request->get('message');
        $message->save();

        return redirect()->route('home')->with('success', 'Message created successfully.');
    }

    public function destroy($id) {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('messages.index')->with('success', 'Message deleted successfully.');
    }


}
